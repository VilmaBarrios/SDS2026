@extends('layouts.app')

@section('content')

{{-- Portada: foto a la izquierda, bienvenida a la derecha --}}
<div class="card overflow-hidden portada">
    <div class="row g-0">

        <div class="col-lg-6 portada-foto">
            <img src="{{ asset('img/portada.jpeg') }}" alt="Semana de Sistemas 2026">
        </div>

        <div class="col-lg-6 d-flex align-items-center">
            <div class="p-4 p-md-5 w-100 text-center text-lg-start">

                {{-- Logo --}}
                <div class="mb-3">
                    <svg class="logo-light-mode" width="260" height="118" viewBox="0 0 210 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="105" cy="27" r="4.2" fill="#8CC63F"/>
                        <path d="M94 21C100 15.5 110 15.5 116 21" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                        <path d="M86 14C96.5 4.8 113.5 4.8 124 14" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                        <path d="M22 33H15V67H22" stroke="#0A0A0A" stroke-width="3.2"/>
                        <path d="M188 33H195V67H188" stroke="#0A0A0A" stroke-width="3.2"/>
                        <text x="26" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#0A0A0A">SDS</text>
                        <text x="124" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#8CC63F">26</text>
                        <text x="34" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#8CC63F">GREEN</text>
                        <text x="126" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#0A0A0A">IOT</text>
                    </svg>
                    <svg class="logo-dark-mode" width="260" height="118" viewBox="0 0 210 95" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="105" cy="27" r="4.2" fill="#8CC63F"/>
                        <path d="M94 21C100 15.5 110 15.5 116 21" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                        <path d="M86 14C96.5 4.8 113.5 4.8 124 14" stroke="#8CC63F" stroke-width="4.5" stroke-linecap="round"/>
                        <path d="M22 33H15V67H22" stroke="#FFFFFF" stroke-width="3.2"/>
                        <path d="M188 33H195V67H188" stroke="#FFFFFF" stroke-width="3.2"/>
                        <text x="26" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#FFFFFF">SDS</text>
                        <text x="124" y="65" font-family="Montserrat, sans-serif" font-weight="900" font-size="43" letter-spacing="-1.5" fill="#8CC63F">26</text>
                        <text x="34" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#8CC63F">GREEN</text>
                        <text x="126" y="86" font-family="Montserrat, sans-serif" font-weight="800" font-size="18.5" letter-spacing="1.2" fill="#FFFFFF">IOT</text>
                    </svg>
                </div>

                {{-- Texto de bienvenida --}}
                <p class="font-mono text-uppercase fw-bold small mb-2 etiqueta">
                    UES · Facultad Multidisciplinaria Oriental
                </p>
                <h1 class="titulo-portada display-5 mb-3">
                    Semana de Sistemas <span>2026</span>
                </h1>
                <p class="lead mb-3">
                    Bienvenidos al blog oficial donde registramos y compartimos nuestras experiencias reales
                    en las actividades académicas, tecnológicas y de convivencia de la Semana de Sistemas 2026.
                </p>
                <p class="text-body-secondary mb-4">
                    Ponencias, talleres, feria de proyectos, torneo de fútbol sala, bingo, comelona de pizza
                    y parrillada, contados desde nuestra propia experiencia.
                </p>

                {{-- Botones --}}
                <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-lg-start">
                    @auth
                        <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-journal-richtext me-1"></i> Ir a la bitácora
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Iniciar sesión
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-lg btn-registro">
                            <i class="bi bi-person-plus me-1"></i> Registrarse
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .portada-foto {
        position: relative;
        min-height: 280px;
    }
    .portada-foto img {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    @media (min-width: 992px) {
        .portada-foto {
            min-height: 520px;
        }
    }
    .etiqueta {
        color: var(--sds-lime);
        letter-spacing: .6px;
    }
    .titulo-portada {
        font-family: 'Montserrat', sans-serif;
        font-weight: 900;
        letter-spacing: -1px;
    }
    .titulo-portada span {
        color: var(--sds-lime);
    }
    .btn-registro {
        border: 2px solid var(--sds-lime);
        color: var(--sds-ink);
        font-weight: 700;
        border-radius: 10px;
        transition: all .22s ease;
    }
    .btn-registro:hover {
        background-color: var(--sds-lime);
        color: #0A0A0A;
        transform: translateY(-2px);
    }
</style>
@endsection