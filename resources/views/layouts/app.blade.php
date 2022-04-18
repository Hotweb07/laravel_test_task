<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" >
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" >
    
    @stack('styles')

</head>
<body>
<!-- header start -->
<header class="darkgrey-bg">
    <nav class="navbar navbar-expand-lg navbar-light porperty_navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.home') }}"><h3 class="rosegold">{{ config('app.name', 'Laravel') }}</h3></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link p-0" href="{{ route('user.home') }}">Home</a>
                    </li>
                    @guest
                        @if(Route::has('login'))
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link p-0 text-center all_btn d-inline-block login_popup_open">Log In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link p-0 text-center all_btn d-inline-block" href="{{ route('register') }}">Get Started</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle user_login_btn text-center" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('images/user-icon.png') }}" alt="user-icon">
                            </a>
                            <ul class="dropdown-menu fade-up" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item colorccc font14 text-center" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest

                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- header end -->

@yield('content')

<!-- footer start -->
<footer class="footer darkgrey-bg py-60">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="footer_links">
                    <ul class="list-unstyled list-inline">
                        <li class="mb-2"><a href="{{ route('user.home') }}" class="font14 roboto_slab title_color">Home</a></li>                        
                    </ul>
                    <ul class="list-unstyled list-inline footer_socila_media">
                        <li class="list-inline-item"><a href="javascript:void(0);" target="_blank"><img src="{{ asset('images/facebook-icon.png') }}"></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0);"><img src="{{ asset('images/twitter-icon.png') }}"></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0);"><img src="{{ asset('images/linkedin-icon.png') }}"></a></li>
                        <li class="list-inline-item"><a href="javascript:void(0);"><img src="{{ asset('images/whatsapp-icon.png') }}"></a></li>                        
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="footer_links"></div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="footer_links"></div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="footer_links"></div>
            </div>            
        </div>
    </div>
</footer>
<section class="copyright-text rosegold-bg py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <p class="mb-0 roboto_slab text-center text-lg-start font18 grey_color medium">Copyright {{ date('Y') }} – All rights reserved</p>
            </div>
            <div class="col-12 col-lg-6 text-center text-lg-end mt-2 mt-lg-0">
                <p class="mb-0 roboto_slab font18 grey_color  medium"></p>
            </div>
        </div>
    </div>
</section>
<div class="scrolltop-arrow text-center ">
    <a  class="scrollup"><img src="{{ asset('images/bottom-top-arrow.png') }}" class="img-fluid mt-4 pt-3"></a>
</div>
<!-- footer end -->

<!-- Optional JavaScript; choose one of the two! -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


@stack('scripts')

</body>
</html>
