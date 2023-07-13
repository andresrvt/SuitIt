@extends('general')

@section('head')

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- ===============================================-->
        <!--    Document Title-->
        <!-- ===============================================-->
        <title>SuitIt | Adapta la moda</title>

        <!-- ===============================================-->
        <!--    Favicons-->
        <!-- ===============================================-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('assets/img/gallery/logo.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('assets/img/gallery/logo.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('assets/img/gallery/logo.png')}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('assets/img/gallery/logo.png')}}">
        <link rel="manifest" href="{{URL::asset('assets/img/gallery/logo.png')}}">
        <meta name="msapplication-TileImage" content="{{URL::asset('assets/img/gallery/logo.png')}}">
        <meta name="theme-color" content="#ffffff">

        <!-- ===============================================-->
        <!--    Stylesheets-->
        <!-- ===============================================-->
        <link href="{{URL::asset('assets/css/theme.css')}}" rel="stylesheet" />

        <link href="{{URL::asset('assets/css/custom.css')}}" rel="stylesheet" />
        <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
        <!-- ===============================================-->
        <!--    JavaScripts-->
        <!-- ===============================================-->

        <script defer src="{{URL::asset('assets/vendors/popperjs/popper.min.js')}}"></script>
        <script defer src="{{URL::asset('assets\js\custom.js')}}"></script>
        <script defer src="{{URL::asset('assets/vendors/bootstrap/bootstrap.min.js')}}"></script>
        <script defer src="{{URL::asset('assets/vendors/is/is.min.js')}}"></script>
        <script defer src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
        <script defer src="{{URL::asset('assets/vendors/feather-icons/feather.min.js')}}"></script>
        <script>
            feather.replace();
        </script>
        <script defer src="{{URL::asset('assets/js/theme.js')}}"></script>

        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap"
            rel="stylesheet">

        <script defer src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
        <script defer src='https://kenwheeler.github.io/slick/slick/slick.js'></script>

    </head>
@endsection


@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-block" data-navbar-on-scroll="data-navbar-on-scroll">
        <div class="container">
            <a class="navbar-brand d-inline-flex" href="/">
                <img class="d-inline-block" src="{{URL::asset('assets/img/gallery/logo.png')}}" alt="logo" />
                <span class="text-1000 fs-0 fw-bold ms-2">SUITIT</span>
            </a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item px-2">
                        <a class="nav-link fw-medium active" aria-current="page" href="/armario">Armario</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link fw-medium" href="#header">Recomendación</a>
                    </li>
                </ul>
                @auth
                    <li class="nav-item dropdown d-flex mx-md-5">
                        <a class="nav-link dropdown-toggle text-primary text-hover-white" href="#"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-fill"></i>
                            {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu products-open">
                            @if (Auth::user()->role == 'admin')
                                <li>
                                    <a class="dropdown-item px-2 text-hover-white" href="{{ route('admin.table') }}"><i
                                            class="bi bi-gear-fill"></i> Panel de administración</a>
                                </li>
                            @elseif (Auth::user()->role == 'user')
                                <li>
                                    <a class="dropdown-item px-2 text-hover-white" href="{{ route('account.profile') }}"><i
                                            class="bi bi-person-circle"></i> Panel de usuario</a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item px-2 text-hover-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('formLogout').submit();"><i
                                        class="bi bi-x-square-fill"></i> {{ __('Logout') }}</a>
                                </li>
                            </ul>
                        </li>
                        <form action="{{ route('logout') }}" method="POST" id="formLogout">
                            @csrf
                        </form>
                    @endauth
                        
                <form class="d-flex"><a class="text-1000" href="#!">
                        <svg class="feather feather-phone me-3" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg></a><a class="text-1000" href="#!">
                        <svg class="feather feather-search me-3" xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg></a><a class="text-1000" href="#!">
                    </a>
                </form>
            </div>
        </div>
    </nav>
@endsection
