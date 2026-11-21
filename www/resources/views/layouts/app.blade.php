<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Semana de Sistemas 2026</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      :root {
        --bs-primary: #198754;
        --bs-primary-rgb: 25, 135, 84;
        --bs-link-color: #146c43;
        --bs-link-hover-color: #0f5132;
        --bs-body-bg: #f4f9f6;
        --bs-body-color: #1c2b24;
      }

      .btn-primary {
        --bs-btn-bg: #198754;
        --bs-btn-border-color: #198754;
        --bs-btn-hover-bg: #157347;
        --bs-btn-hover-border-color: #146c43;
        --bs-btn-active-bg: #146c43;
        --bs-btn-active-border-color: #13653f;
      }

      .navbar-iot {
        background: linear-gradient(135deg, #0d3b26 0%, #198754 100%);
      }

      .footer-iot {
        background-color: #0d3b26;
      }

      .card {
        border-color: #d1e7dd;
        box-shadow: 0 2px 6px rgba(25, 135, 84, 0.06);
      }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark navbar-iot shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('posts.index') }}">SDS 2026</a>
            <div class="navbar-nav ms-auto align-items-center">
                @auth
                    <a class="nav-link {{ request()->routeIs('posts.*') ? 'active fw-bold' : '' }}" href="{{ route('posts.index') }}">Publicaciones</a>
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active fw-bold' : '' }}" href="{{ route('categories.index') }}">Categorías</a>

                    <span class="nav-link text-white-50 small ms-2">
                        {{ auth()->user()->name }} ({{ auth()->user()->isAdmin() ? 'Admin' : 'Usuario' }})
                    </span>

                    <form action="{{ route('logout') }}" method="POST" class="d-inline ms-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-sm">Cerrar sesión</button>
                    </form>
                @else
                    <a class="nav-link {{ request()->routeIs('login') ? 'active fw-bold' : '' }}" href="{{ route('login') }}">Iniciar sesión</a>
                    <a class="nav-link {{ request()->routeIs('register') ? 'active fw-bold' : '' }}" href="{{ route('register') }}">Registrarse</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container flex-grow-1 mb-5">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer-iot text-white text-center py-3 mt-auto">
        <div class="container">
            <small>Semana de Sistemas 2026 &copy; Desarrollado por Bibi, Vilma y Dayna</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>