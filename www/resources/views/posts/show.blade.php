@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="max-height:400px;object-fit:cover;" alt="{{ $post->title }}">
    @endif
    <div class="card-body">
        <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle mb-2">
            {{ $post->category->name ?? 'Sin categoría' }}
        </span>
        <h2 class="fw-bold" style="color: #0d3b26;">{{ $post->title }}</h2>
        <p class="text-muted">{{ $post->activity_date->format('d/m/Y') }} · Por {{ $post->authors }}</p>
        <div style="white-space: pre-line;">{{ $post->content }}</div>
        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary mt-4">Volver</a>
    </div>
</div>
@endsection