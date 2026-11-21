@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    @if($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top"
             style="max-height:420px;object-fit:cover;" alt="{{ $post->title }}">
    @endif
    <div class="card-body p-4">
        <span class="badge bg-success-subtle text-success-emphasis border border-success-subtle mb-2">
            {{ $post->category->name ?? 'Sin categoría' }}
        </span>
        <h1 class="fw-bold" style="color: #0d3b26;">{{ $post->title }}</h1>
        <p class="text-muted">{{ $post->date?->format('d/m/Y') }} · Por {{ $post->authors }}</p>

        <div style="white-space: pre-line;">{{ $post->content }}</div>

        @if($post->images->isNotEmpty())
            <h5 class="fw-bold mt-4 mb-3" style="color: #0d3b26;">Galería</h5>
            <div class="collage">
                @foreach($post->images as $image)
                    <img src="{{ asset('storage/' . $image->path) }}" alt="Evidencia {{ $loop->iteration }}"
                         data-bs-toggle="modal" data-bs-target="#modalImagen">
                @endforeach
            </div>
        @endif

        <a href="{{ route('inicio') }}" class="btn btn-outline-secondary mt-4">← Volver al inicio</a>
    </div>
</div>

<div class="modal fade" id="modalImagen" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent border-0">
            <img id="imagenGrande" src="" class="img-fluid rounded" alt="Imagen ampliada">
        </div>
    </div>
</div>

<style>
    .collage {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
        grid-auto-rows: 160px;
        gap: 8px;
    }
    .collage img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        transition: transform .2s;
    }
    .collage img:hover {
        transform: scale(1.03);
    }
    @media (min-width: 768px) {
        .collage img:nth-child(5n + 1) {
            grid-column: span 2;
            grid-row: span 2;
        }
    }
</style>

<script>
    document.querySelectorAll('.collage img').forEach(function (img) {
        img.addEventListener('click', function () {
            document.getElementById('imagenGrande').src = img.src;
        });
    });
</script>
@endsection