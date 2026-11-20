@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold" style="color: #0d3b26;">Publicaciones</h2>
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Nueva Publicación</a>
</div>

<div class="row g-4">
    @forelse($posts as $post)
        <div class="col-md-6">
            <div class="card h-100 shadow-sm">
                @if($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="height:200px;object-fit:cover;" alt="{{ $post->title }}">
                @endif
                <div class="card-body d-flex flex-column">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle">
                            {{ $post->category->name ?? 'Sin categoría' }}
                        </span>
                        <span class="badge {{ $post->status === 'publicado' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($post->status) }}
                        </span>
                    </div>

                    <h5 class="card-title fw-bold" style="color: #0d3b26;">{{ $post->title }}</h5>
                    <small class="text-muted mb-2">{{ $post->date?->format('d/m/Y') }} · {{ $post->authors }}</small>

                    <p class="card-text text-muted flex-grow-1">{{ Str::limit($post->content, 130) }}</p>

                    <div class="d-flex justify-content-between align-items-center pt-3 border-top border-success-subtle">
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-sm btn-primary">Leer más</a>
                        <div>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-outline-success">Editar</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar esta publicación?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body text-center text-muted py-5">No hay publicaciones registradas todavía.</div>
            </div>
        </div>
    @endforelse
</div>
@endsection