@extends('layouts.app')

@section('content')
<h2 class="fw-bold mb-3" style="color: #0d3b26;">Nueva Publicación</h2>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('posts._form')
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection