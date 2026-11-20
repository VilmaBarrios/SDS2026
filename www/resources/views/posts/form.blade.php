<div class="row g-3">
    <div class="col-md-8">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $post->title ?? '') }}">
        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4">
        <label class="form-label">Fecha de la actividad</label>
        <input type="date" name="date" class="form-control @error('date') is-invalid @enderror"
               value="{{ old('date', isset($post) ? $post->date->format('Y-m-d') : '') }}">
        @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Categoría</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">Seleccione...</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id ?? '') == $category->id)>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6">
        <label class="form-label">Estado</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror">
            <option value="borrador" @selected(old('status', $post->status ?? 'borrador') === 'borrador')>Borrador</option>
            <option value="publicado" @selected(old('status', $post->status ?? '') === 'publicado')>Publicado</option>
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Autor(es)</label>
        <input type="text" name="authors" class="form-control @error('authors') is-invalid @enderror"
               placeholder="Ej: Alexander Retana, Nombre Compañero"
               value="{{ old('authors', $post->authors ?? '') }}">
        @error('authors') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Contenido</label>
        <textarea name="content" rows="8" class="form-control @error('content') is-invalid @enderror">{{ old('content', $post->content ?? '') }}</textarea>
        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-12">
        <label class="form-label">Imagen principal</label>
        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        @if(isset($post) && $post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail mt-2" style="max-height:150px;">
        @endif
    </div>
    <div class="col-12">
    <label class="form-label">Galería de imágenes (collage)</label>
    <input type="file" name="images[]" accept="image/*" multiple
           class="form-control @error('images') is-invalid @enderror @error('images.*') is-invalid @enderror">
    <div class="form-text">Puedes seleccionar varias imágenes a la vez (máximo 10, de 2 MB cada una).</div>
    @error('images') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
    @error('images.*') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
</div>
</div>