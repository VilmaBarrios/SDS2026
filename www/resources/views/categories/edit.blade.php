@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header text-white fw-bold" style="background-color: #0d3b26;">
                Editar Categoría
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection