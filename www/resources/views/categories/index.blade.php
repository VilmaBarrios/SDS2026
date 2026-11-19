@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="fw-bold" style="color: #0d3b26;">Categorías</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-primary">Nueva Categoría</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-success">
                <tr>
                    <th class="ps-3">ID</th>
                    <th>Nombre</th>
                    <th class="text-end pe-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td class="ps-3 fw-semibold text-success">{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td class="text-end pe-3">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-outline-success">Editar</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminarla?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">No hay categorías registradas.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection