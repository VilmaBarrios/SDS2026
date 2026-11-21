<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::orderBy('name')->get();

        $posts = Post::with('category')
            ->withCount('images')
            ->publicados()
            ->when($request->filled('buscar'), function ($query) use ($request) {
                $texto = '%' . $request->buscar . '%';
                $query->where(function ($q) use ($texto) {
                    $q->where('title', 'ilike', $texto)
                      ->orWhere('content', 'ilike', $texto)
                      ->orWhere('authors', 'ilike', $texto);
                });
            })
            ->when($request->filled('categoria'), function ($query) use ($request) {
                $query->where('category_id', $request->categoria);
            })
            ->latest('date')
            ->paginate(9)
            ->withQueryString();

        return view('inicio.index', compact('posts', 'categories'));
    }

    public function show(Post $post)
    {
        abort_if($post->status !== 'publicado', 404);

        $post->load('category', 'images');

        return view('inicio.show', compact('post'));
    }
}