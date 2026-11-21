@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-3" style="color: #0d3b26;">Editar Publicación</h2>

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('posts.form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>

@if($post->images->isNotEmpty())
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold mb-3" style="color: #0d3b26;">Imágenes de la galería</h5>
            <div class="row g-3">
                @foreach($post->images as $image)
                    <div class="col-6 col-md-3">
                       <img src="{{ $image->url() }}" class="img-thumbnail w-100" style="height:140px;object-fit:cover;">
                        <img src="{{ asset('storage/' . $image->path) }}" class="img-thumbnail w-100" style="height:140px;object-fit:cover;">
                        <form action="{{ route('posts.imagenes.destroy', $image) }}" method="POST" class="mt-1"
                              onsubmit="return confirm('¿Eliminar esta imagen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger w-100">Eliminar</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
@endsection