<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - {{env('APP_NAME')}}</title>
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    @vite(['resources/sass/app.scss'])
</head>

<body>

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-secondary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn"
        data-wow-delay="0.1s">
        <a href="{{url('/')}}" class="navbar-brand ms-4 ms-lg-0">
            <h1 class="mb-0 text-h3 text-primary text-uppercase">RDF</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="{{route('home')}}" class="nav-item nav-link active">INICIO</a>
                <a href="{{route('news')}}" class="nav-item nav-link">NOTICIAS</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">EXPLORAR</a>
                    <div class="dropdown-menu m-0">
                        <a href="testimonial.html" class="dropdown-item">Discusiones</a>
                        <a href="price.html" class="dropdown-item">Artistas</a>
                        <a href="team.html" class="dropdown-item">Rimas</a>
                        <a href="open.html" class="dropdown-item">Competiciones</a>
                        <a href="404.html" class="dropdown-item">Encuestas</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">NOSOTROS</a>
                <a href="service.html" class="nav-item nav-link">CONTACTO</a>
                @auth
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{Auth::user()->username}}</a>
                    <div class="dropdown-menu m-0">
                        <a href="{{route('user.profile', ['username' => Auth::user()->username])}}" class="dropdown-item">Perfil</a>
                        <a href="team.html" class="dropdown-item">Configuración</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         Cerrar sesión
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                         @csrf
                     </form>
                    </div>
                </div>
                @endauth
            </div>
            @guest
            <a href="{{url('/login')}}" class="btn btn-primary rounded-0 py-2 px-lg-4 d-none d-lg-block">INICIAR SESIÓN<i class="fa fa-arrow-right ms-3"></i></a>
            @endguest
        </div>
    </nav>
    <!-- Navbar End -->
    <div id="app">
        @yield('content')
    </div>
    <hr>
    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-light footer wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-uppercase mb-4">Ponerse en contacto</h4>
                    <div class="d-flex align-items-center mb-2">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-map-marker-alt text-primary"></span>
                        </div>
                        <span>123 Street, New York, USA</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-phone-alt text-primary"></span>
                        </div>
                        <span>+51 912719166</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-envelope-open text-primary"></span>
                        </div>
                        <span>johnyulberingalapa@gmail.com</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-uppercase mb-4">Accesos rapido</h4>
                    <a class="btn btn-link" href="">Compite</a>
                    <a class="btn btn-link" href="">Artistas</a>
                    <a class="btn btn-link" href="">Rimas</a>
                    <a class="btn btn-link" href="">Terms & Condition</a>
                    <a class="btn btn-link" href="">Contacto</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-uppercase mb-4">Suscribete</h4>
                    <div class="position-relative mb-4">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text"
                            placeholder="Correo electrónico">
                        <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">Iniciar</button>
                    </div>
                    {{-- <div class="d-flex pt-1 m-n1">
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i
                                class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i
                                class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i
                                class="fab fa-youtube"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="{{route('home')}}">{{env('APP_NAME')}}</a>, Todos los derechos reservados.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Diseñado por <a class="border-bottom" href="https://github.com/IngYulber">John Inga</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    @vite(['resources/js/app.js','resources/wow/wow.min.js'])
</body>

</html>
