<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
public function index()
{
    $posts = Post::with('category')->latest('date')->get();
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
        unset($data['image']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $data['user_id'] = Auth::id();
        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Publicación creada correctamente.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::orderBy('name')->get();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $this->validar($request);
        unset($data['image']);

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Publicación actualizada correctamente.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Publicación eliminada correctamente.');
    }

    private function validar(Request $request): array
    {
        return $request->validate([
            'title'         => 'required|string|max:255',
            'activity_date' => 'required|date',
            'category_id'   => 'required|exists:categories,id',
            'content'       => 'required|string',
            'authors'       => 'required|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'        => 'required|in:borrador,publicado',
        ]);
    }
}