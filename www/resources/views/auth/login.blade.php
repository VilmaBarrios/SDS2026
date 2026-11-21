@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h3 class="fw-bold text-center mb-4" style="color: #0d3b26;">Iniciar sesión</h3>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}" autofocus
                <h3 class="fw-bold text-center mb-4" style="color: #0d3b26;">Crear cuenta</h3>

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nombre completo</label>
                        <input type="text" name="name" value="{{ old('name') }}" autofocus
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password"
                               class="form-control @error('password') is-invalid @enderror">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label class="form-check-label" for="remember">Recordarme</label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Entrar</button>
                </form>

                <p class="text-center mt-3 mb-0">
                    ¿No tienes cuenta? <a href="{{ route('register') }}">Regístrate</a>
                    <div class="mb-3">
                        <label class="form-label">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Registrarme</button>
                </form>

                <p class="text-center mt-3 mb-0">
                    ¿Ya tienes cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection