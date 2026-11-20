<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $query = Post::with('category')->withCount('images')->latest('date');

        if (! $this->esAdmin()) {
            $query->publicados();
        }

        $posts = $query->get();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validar($request);
        unset($data['image'], $data['images']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $data['user_id'] = Auth::id();
        $post = Post::create($data);

        $this->guardarGaleria($request, $post);

        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    }

    public function show(Post $post)
    {
        if (! $this->esAdmin() && $post->status !== 'publicado') {
            abort(404);
        }

        $post->load('category', 'images');

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        $post->load('images');
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validar($request);
        unset($data['image'], $data['images']);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        $this->guardarGaleria($request, $post);

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada correctamente.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }

        foreach ($post->images as $image) {
            Storage::disk('public')->delete($image->path);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Publicación eliminada correctamente.');
    }

    public function eliminarImagen(PostImage $image)
    {
        $post = $image->post;

        Storage::disk('public')->delete($image->path);
        $image->delete();

        return redirect()->route('posts.edit', $post)->with('success', 'Imagen eliminada de la galería.');
    }

    private function esAdmin(): bool
    {
        /** @var User|null $user */
        $user = Auth::user();

        return $user?->isAdmin() ?? false;
    }

    private function guardarGaleria(Request $request, Post $post): void
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $post->images()->create([
                    'path' => $file->store('posts/galeria', 'public'),
                ]);
            }
        }
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'date'        => 'required|date',
            'category_id' => 'required|exists:categories,id',
            'content'     => 'required|string',
            'authors'     => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images'      => 'nullable|array|max:10',
            'images.*'    => 'image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'      => 'required|in:borrador,publicado',
        ]);
    }
}