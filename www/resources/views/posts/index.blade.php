@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold">Publicaciones</h2>
    @if(auth()->user()?->isAdmin())
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Nueva Publicación</a>
    @endif
</div>

{{-- Búsqueda y filtro por categoría --}}
<form method="GET" action="{{ route('posts.index') }}" class="row g-2 mb-3">
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-search"></i></span>
            <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control"
                   placeholder="Buscar por título, contenido o autor...">
        </div>
    </div>
    <div class="col-md-4">
        <select name="categoria" class="form-select" onchange="this.form.submit()">
            <option value="">Todas las categorías</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(request('categoria') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2 d-grid">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>

@if(request('buscar') || request('categoria'))
    <p class="text-muted small mb-3">
        {{ $posts->count() }} resultado(s).
        <a href="{{ route('posts.index') }}">Limpiar filtros</a>
    </p>
@endif

<div class="row g-4">
    @forelse($posts as $post)
        <div class="col-sm-6 col-lg-4">
            <div class="card h-100 shadow-sm overflow-hidden">
                @if($post->image)
                    <div class="marco-imagen">
                        <img src="{{ $post->urlImagen() }}" class="fondo-difuminado" alt="" aria-hidden="true">
                        <img src="{{ $post->urlImagen() }}" class="imagen-completa" alt="{{ $post->title }}">
                    </div>
                @endif
                <div class="card-body d-flex flex-column p-3">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle">
                            {{ $post->category->name ?? 'Sin categoría' }}
                        </span>
                        @if(auth()->user()?->isAdmin())
                            <span class="badge {{ $post->status === 'publicado' ? 'bg-success' : 'bg-secondary' }}">
                                {{ ucfirst($post->status) }}
                            </span>
                        @endif
                    </div>

                    <h6 class="card-title fw-bold mb-1">{{ $post->title }}</h6>
                    <small class="text-muted mb-2">{{ $post->date?->format('d/m/Y') }} · {{ $post->authors }}</small>

                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($post->content, 90) }}</p>

                    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 border-top border-success-subtle">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">Leer más</a>
                        @if(auth()->user()?->isAdmin())
                            <div class="d-flex gap-1">
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-success">Editar</a>
                                <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta publicación?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center text-muted py-5">
                    @if(request('buscar') || request('categoria'))
                        No se encontraron publicaciones con esos filtros.
                    @else
                        No hay publicaciones registradas todavía.
                    @endif
                </div>
            </div>
        </div>
    @endforelse
</div>

<style>
    .marco-imagen {
        position: relative;
        aspect-ratio: 16 / 9;
        max-height: 190px;
        overflow: hidden;
        background-color: #0A0A0A;
    }
    .marco-imagen .fondo-difuminado {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: blur(18px) brightness(.7);
        transform: scale(1.15);
    }
    .marco-imagen .imagen-completa {
        position: relative;
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
@endsection