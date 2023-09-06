<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="/dist/cdn.datatables.net_1.13.6_css_jquery.dataTables.min.css" rel="stylesheet">
    <link href="/dist/cdnjs.cloudflare.com_ajax_libs_dropzone_5.7.0_min_dropzone.min.css" rel="stylesheet">
  


    <!-- Scripts -->
    @vite(['public/sass/app.scss', 'public/js/app.js','public/sass/app.css'])
</head>
<body>
<div id="mySidebar" class="sidebar">
<a href="{{route('addrestaurant')}}">Add Restaurant</a>
<a  href="{{route('setting')}}">Restaurants</a>

<a href="{{route('logout')}}">
                                        Logout
                                    </a>

                             
                                </div>
                            </li>
</div>
<div id="main">

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img  onclick="openNav()" class="menu"  src="{{ asset('img/menu.png') }}" />
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else


                     

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a  class="dropdown-item"  href="{{route('logout')}}">
                                        Logout
                                    </a>

                               
                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="dist/cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="dist/cdnjs.cloudflare.com_ajax_libs_dropzone_5.7.0_min_dropzone.min.js"></script>
<script>
function openNav() {
    if(!$(".sidebar").hasClass("opn")){
        $(".sidebar").addClass("opn")
        $("#main").addClass("mrgn")
    }else{
        $(".sidebar").removeClass("opn")
        $("#main").removeClass("mrgn")
    }
}
    </script>

</body>
</html>
