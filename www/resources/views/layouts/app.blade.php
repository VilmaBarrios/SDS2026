<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SDS26 | Green IoT Blog')</title>

    <!-- Evita parpadeo al cargar en modo oscuro -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('sds26-theme') || 'light';
            document.documentElement.setAttribute('data-bs-theme', savedTheme);
        })();
    </script>

    <!-- Tipografías geométricas parecidas al logo oficial -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;700&family=Montserrat:wght@600;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3.3 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        /* PALETA OFICIAL SDS26 GREEN IoT */
        :root, [data-bs-theme="light"] {
            --sds-lime: #8CC63F;
            --sds-lime-hover: #77ad30;
            --sds-lime-soft: rgba(140, 198, 63, 0.16);
            --sds-ink: #0A0A0A;
            --sds-bg: #F6F8F5;
            --sds-surface: #FFFFFF;
            --sds-nav-bg: rgba(255, 255, 255, 0.92);
            --sds-border: rgba(10, 10, 10, 0.09);
            --sds-dot-color: rgba(140, 198, 63, 0.35);

            --bs-primary: #8CC63F;
            --bs-primary-rgb: 140, 198, 63;
            --bs-link-color: #5c8a1e;
            --bs-link-hover-color: #0A0A0A;
            --bs-body-font-family: 'Plus Jakarta Sans', sans-serif;
            --bs-body-bg: var(--sds-bg);
            --bs-body-color: var(--sds-ink);
        }

        [data-bs-theme="dark"] {
            --sds-lime: #8CC63F;
            --sds-lime-hover: #9ed94e;
            --sds-lime-soft: rgba(140, 198, 63, 0.18);
            --sds-ink: #FFFFFF;
            --sds-bg: #070807;
            --sds-surface: #111311;
            --sds-nav-bg: rgba(10, 10, 10, 0.94);
            --sds-border: rgba(140, 198, 63, 0.22);
            --sds-dot-color: rgba(140, 198, 63, 0.18);

            --bs-body-bg: var(--sds-bg);
            --bs-body-color: #F3F4F6;
            --bs-link-color: #8CC63F;
            --bs-link-hover-color: #b4e673;
        }

        /* Fondo dinámico con nodos IoT */
        body {
            background-color: var(--sds-bg);
            background-image: radial-gradient(var(--sds-dot-color) 1.3px, transparent 1.3px);
            background-size: 28px 28px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Asegura que títulos como "Crear cuenta" o "Iniciar sesión" sean blancos en modo oscuro */
        [data-bs-theme="dark"] h1,
        [data-bs-theme="dark"] h2,
        [data-bs-theme="dark"] h3,
        [data-bs-theme="dark"] h4,
        [data-bs-theme="dark"] h5,
        [data-bs-theme="dark"] h6,
        [data-bs-theme="dark"] .card-title,
        [data-bs-theme="dark"] .form-label {
            color: #FFFFFF !important;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        /* NAVBAR OFICIAL */
        .navbar-sds {
            background-color: var(--sds-nav-bg);
            backdrop-filter: blur(12px);
            border-bottom: 2px solid var(--sds-border);
            transition: all 0.3s ease;
        }

        /* Control de visibilidad entre logo claro y oscuro */
        [data-bs-theme="light"] .logo-dark-mode { display: none; }
        [data-bs-theme="dark"] .logo-light-mode { display: none; }

        .brand-logo-wrapper {
            transition: transform 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        .brand-logo-wrapper:hover {
            transform: scale(1.04);
        }

        /* ENLACES DE MENÚ CON CAMBIO DINÁMICO DE COLOR */
        .nav-link-sds {
            position: relative;
            font-weight: 600;
            color: var(--sds-ink) !important;
            padding: 0.5rem 1rem !important;
            border-radius: 10px;
            transition: all 0.25s ease;
        }

        .nav-link-sds:hover {
            color: var(--sds-lime) !important;
            background-color: var(--sds-lime-soft);
            transform: translateY(-2px);
        }

        .nav-link-sds.active {
            background-color: var(--sds-lime);
            color: #0A0A0A !important;
            font-weight: 700;
            box-shadow: 0 4px 14px rgba(140, 198, 63, 0.38);
        }

        .nav-link-sds:active {
            transform: scale(0.96);
        }

        /* BOTONES DINÁMICOS CON EFECTO PRESIÓN Y BRILLO */
        .btn-primary {
            background-color: var(--sds-lime);
            border-color: var(--sds-lime);
            color: #0A0A0A;
            font-weight: 700;
            border-radius: 10px;
            padding: 0.55rem 1.25rem;
            box-shadow: 0 4px 14px rgba(140, 198, 63, 0.28);
            transition: all 0.22s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: var(--sds-lime-hover);
            border-color: var(--sds-lime-hover);
            color: #0A0A0A;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(140, 198, 63, 0.45);
        }

        .btn-primary:active {
            transform: translateY(1px) scale(0.97) !important;
            box-shadow: 0 2px 6px rgba(140, 198, 63, 0.3) !important;
        }

        /* Botón Acceso Admin en el Navbar */
        .btn-admin-access {
            border: 1.5px solid var(--sds-lime);
            color: var(--sds-ink);
            background-color: transparent;
            border-radius: 999px;
            font-weight: 600;
            padding: 0.4rem 1.05rem;
            transition: all 0.25s ease;
        }

        .btn-admin-access:hover {
            background-color: var(--sds-lime);
            color: #0A0A0A;
            transform: translateY(-2px);
            box-shadow: 0 4px 14px rgba(140, 198, 63, 0.38);
        }

        .btn-admin-access:active {
            transform: scale(0.96);
        }

        .btn-outline-secondary {
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.22s ease;
        }

        .btn-outline-secondary:hover {
            transform: translateY(-2px);
        }

        /* Botón interruptor de tema Claro / Oscuro */
        .btn-theme-toggle {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            border: 1px solid var(--sds-border);
            background-color: var(--sds-surface);
            color: var(--sds-ink);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
        }

        .btn-theme-toggle:hover {
            border-color: var(--sds-lime);
            color: var(--sds-lime);
            transform: rotate(20deg) scale(1.06);
            box-shadow: 0 0 12px rgba(140, 198, 63, 0.35);
        }

        /* TARJETAS Y FORMULARIOS ADAPTABLES */
        .card {
            background-color: var(--sds-surface);
            border: 1px solid var(--sds-border);
            border-radius: 16px;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.05);
            transition: transform 0.28s ease, box-shadow 0.28s ease, border-color 0.28s ease;
        }

        .card:hover {
            border-color: rgba(140, 198, 63, 0.45);
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 32px rgba(140, 198, 63, 0.16);
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--sds-lime);
            box-shadow: 0 0 0 0.25rem rgba(140, 198, 63, 0.25);
        }

        /* FOOTER */
        .footer-sds {
            background-color: #0A0A0A;
            color: #FFFFFF;
            border-top: 3px solid var(--sds-lime);
        }

        .pulse-lime {
            width: 8px;
            height: 8px;
            background-color: var(--sds-lime);
            border-radius: 50%;
            display: inline-block;
            animation: pulse-sds 2s infinite;
        }

        @keyframes pulse-sds {
            0% { box-shadow: 0 0 0 0 rgba(140, 198, 63, 0.75); }
            70% { box-shadow: 0 0 0 8px rgba(140, 198, 63, 0); }
            100% { box-shadow: 0 0 0 0 rgba(140, 198, 63, 0); }
        }
    </style>

    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR CON LOGO OFICIAL SDS26 GREEN IOT -->
    <nav class="navbar navbar-expand-lg navbar-sds sticky-top">
        <div class="container py-1">
            <!-- Marca con SVG idéntico a ambos logos oficiales -->
            <a class="navbar-brand brand-logo-wrapper py-0" href="{{ route('inicio') }}" title="SDS26 Green IoT">
                <!-- Logo Versión Clara (con corchetes negros y señal centrada) -->
                <svg class="logo-light-mode" width="142" height="48" viewBox="0 0 210 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="105" cy="27" r="4.2" fill="#8CC63F"/>
                    <path d="M94 21C100 15.5 110 15.5 116 21" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M86 14C96.5 4.8 113.5 4.8 124 14" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M22 33H15V67H22" stroke="#0A0A0A" stroke-width="3.2"/>
                    <rect x="13" y="31.5" width="7" height="3" fill="#0A0A0A"/>
                    <rect x="13" y="65.5" width="7" height="3" fill="#0A0A0A"/>
                    <path d="M188 33H195V67H188" stroke="#0A0A0A" stroke-width="3.2"/>
                    <rect x="190" y="31.5" width="7" height="3" fill="#0A0A0A"/>
                    <rect x="190" y="65.5" width="7" height="3" fill="#0A0A0A"/>
                    <text x="26" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#0A0A0A">SDS</text>
                    <text x="124" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#8CC63F">26</text>
                    <text x="34" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#8CC63F">GREEN</text>
                    <text x="126" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#0A0A0A">IOT</text>
                </svg>

                <!-- Logo Versión Oscura (fondo negro, corchetes y texto blanco) -->
                <svg class="logo-dark-mode" width="138" height="46" viewBox="0 0 260 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="96" cy="27" r="4.2" fill="#8CC63F"/>
                    <path d="M85 21C91 15.5 101 15.5 107 21" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M77 14C87.5 4.8 104.5 4.8 115 14" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M20 33H14V67H20" stroke="#FFFFFF" stroke-width="3.2"/>
                    <path d="M182 33H188V67H182" stroke="#FFFFFF" stroke-width="3.2"/>
                    <text x="24" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#FFFFFF">SDS</text>
                    <text x="122" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#8CC63F">26</text>
                    <text x="34" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#8CC63F">GREEN</text>
                    <text x="124" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#FFFFFF">IOT</text>
                </svg>
            </a>

            <div class="d-flex align-items-center gap-2 order-lg-3">
                <!-- Botón Acceso Admin visible cuando NO se ha iniciado sesión -->
                @guest
                    <a href="{{ route('login') }}" class="btn btn-admin-access btn-sm d-inline-flex align-items-center gap-1">
                        <i class="bi bi-shield-lock-fill"></i>
                        <span>Acceso Admin</span>
                    </a>
                @endguest

                <!-- Botón Modo Claro / Modo Oscuro -->
                <button type="button" id="themeToggle" class="btn-theme-toggle" title="Cambiar modo claro/oscuro" aria-label="Cambiar tema">
                    <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
                </button>

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
    <!-- NAVBAR CON LOGO OFICIAL SDS26 GREEN IOT -->
    <nav class="navbar navbar-expand-lg navbar-sds sticky-top">
        <div class="container py-1">
            <!-- Marca con SVG idéntico a ambos logos oficiales -->
            <a class="navbar-brand brand-logo-wrapper py-0" href="{{ auth()->check() ? route('posts.index') : route('login') }}" title="SDS26 Green IoT">
                <!-- Logo Versión Clara (con corchetes negros y señal centrada) -->
                <svg class="logo-light-mode" width="142" height="48" viewBox="0 0 210 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="105" cy="27" r="4.2" fill="#8CC63F"/>
                    <path d="M94 21C100 15.5 110 15.5 116 21" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M86 14C96.5 4.8 113.5 4.8 124 14" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M22 33H15V67H22" stroke="#0A0A0A" stroke-width="3.2"/>
                    <rect x="13" y="31.5" width="7" height="3" fill="#0A0A0A"/>
                    <rect x="13" y="65.5" width="7" height="3" fill="#0A0A0A"/>
                    <path d="M188 33H195V67H188" stroke="#0A0A0A" stroke-width="3.2"/>
                    <rect x="190" y="31.5" width="7" height="3" fill="#0A0A0A"/>
                    <rect x="190" y="65.5" width="7" height="3" fill="#0A0A0A"/>
                    <text x="26" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#0A0A0A">SDS</text>
                    <text x="124" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#8CC63F">26</text>
                    <text x="34" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#8CC63F">GREEN</text>
                    <text x="126" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#0A0A0A">IOT</text>
                </svg>

                <!-- Logo Versión Oscura (fondo negro, corchetes y texto blanco) -->
                <svg class="logo-dark-mode" width="138" height="46" viewBox="0 0 260 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="96" cy="27" r="4.2" fill="#8CC63F"/>
                    <path d="M85 21C91 15.5 101 15.5 107 21" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M77 14C87.5 4.8 104.5 4.8 115 14" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                    <path d="M20 33H14V67H20" stroke="#FFFFFF" stroke-width="3.2"/>
                    <path d="M182 33H188V67H182" stroke="#FFFFFF" stroke-width="3.2"/>
                    <text x="24" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#FFFFFF">SDS</text>
                    <text x="122" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#8CC63F">26</text>
                    <text x="34" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#8CC63F">GREEN</text>
                    <text x="124" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#FFFFFF">IOT</text>
                </svg>
            </a>

            <div class="d-flex align-items-center gap-2 order-lg-3">
                <!-- Botón Acceso Admin visible cuando NO se ha iniciado sesión -->
                @guest
                    <a href="{{ route('login') }}" class="btn btn-admin-access btn-sm d-inline-flex align-items-center gap-1">
                        <i class="bi bi-shield-lock-fill"></i>
                        <span>Acceso Admin</span>
                    </a>
                @endguest

                <!-- Botón Modo Claro / Modo Oscuro -->
                <button type="button" id="themeToggle" class="btn-theme-toggle" title="Cambiar modo claro/oscuro" aria-label="Cambiar tema">
                    <i class="bi bi-moon-stars-fill" id="themeIcon"></i>
                </button>

                @auth
                    <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Menú">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                @endauth
            </div>

            <!-- Menú solo visible cuando ya se inició sesión (unificado sin plecas) -->
            @auth
                <div class="collapse navbar-collapse mt-3 mt-lg-0 order-lg-2" id="navbarMain">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-1 ms-lg-4">
                        <li class="nav-item">
                            <a class="nav-link nav-link-sds {{ request()->routeIs('posts.index') || request()->routeIs('posts.show') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                                <i class="bi bi-journal-richtext me-1"></i> Bitácora
                            </a>
                        </li>

                        @if(auth()->user()->isAdmin())
                            <li class="nav-item">
                                <a class="nav-link nav-link-sds {{ request()->routeIs('categories.*') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                                    <i class="bi bi-tags me-1"></i> Categorías
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-sds {{ request()->routeIs('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}">
                                    <i class="bi bi-plus-circle me-1"></i> Nueva Entrada
                                </a>
                            </li>
                        @endif
                    </ul>

                    <!-- Perfil de usuario -->
                    <div class="dropdown me-lg-2">
                        <button class="btn btn-outline-secondary btn-sm rounded-pill dropdown-toggle px-3 d-flex align-items-center gap-2" type="button" data-bs-toggle="dropdown">
                            <span class="pulse-lime"></span>
                            <span>{{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-3 mt-2">
                            <li class="px-3 py-1">
                                <small class="text-muted font-mono d-block">
                                    {{ auth()->user()->isAdmin() ? 'ROL: ADMINISTRADOR' : 'ROL: ESTUDIANTE' }}
                                </small>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger fw-semibold">
                                        <i class="bi bi-box-arrow-right me-1"></i> Cerrar sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Contenido Principal -->
    <main class="container flex-grow-1 my-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 rounded-3 d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle-fill fs-5 me-2"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger shadow-sm border-0 rounded-3">
                <div class="d-flex align-items-center fw-bold mb-1">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> Por favor corrige los siguientes errores:
                </div>
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer Oficial SDS26 Green IoT -->
    <footer class="footer-sds py-4 mt-auto">
        <div class="container">
            <div class="row align-items-center gy-3">
                <div class="col-md-6 text-center text-md-start">
                    <div class="d-inline-flex align-items-center gap-2 mb-1">
                        <span class="pulse-lime"></span>
                        <span class="font-mono small fw-bold text-uppercase" style="color: #8CC63F; letter-spacing: 0.6px;">
                            SDS26 • GREEN IoT
                        </span>
                    </div>
                    <p class="mb-0 small text-white-50">
                        Universidad de El Salvador • Facultad Multidisciplinaria Oriental
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small class="d-block fw-semibold text-white">Desarrollado por</small>
                    <small class="text-white-50"> Vilma Barrios, Vilma Gutiérrez y Dayna Moreno &copy; </small>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const htmlEl = document.documentElement;
            const toggleBtn = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');

            function updateIcon(theme) {
                if (theme === 'dark') {
                    themeIcon.className = 'bi bi-sun-fill text-warning';
                } else {
                    themeIcon.className = 'bi bi-moon-stars-fill';
                }
            }

            updateIcon(htmlEl.getAttribute('data-bs-theme'));

            toggleBtn.addEventListener('click', function () {
                const current = htmlEl.getAttribute('data-bs-theme');
                const next = current === 'dark' ? 'light' : 'dark';
                htmlEl.setAttribute('data-bs-theme', next);
                localStorage.setItem('sds26-theme', next);
                updateIcon(next);
            });
        });
    </script>
    @stack('scripts')
</body>
</html>