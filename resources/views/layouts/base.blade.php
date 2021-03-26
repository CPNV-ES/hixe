<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Hixe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css">
    
    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/30414cf885.js" crossorigin="anonymous"></script>

    <script src="{{ asset('/js/app.js')}}"></script>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- List interactions -->
    <script src={{ asset('/lib/jquery/jquery.min.js') }}></script>
    <script src={{ asset('/lib/datatables/min/jquery.dataTables.min.js') }}></script>
    <script src={{ asset('/lib/datatables/js/dataTables.bootstrap4.min.js') }}></script>
    <link rel='stylesheet' href={{ asset('/lib/datatables/css/dataTables.bootstrap4.min.css') }}/>
</head>

<style>

    .menuright {
        text-align: center;

    }

    .containermenu {
        vertical-align: center;
        margin-top: auto;
        margin-bottom: auto;

    }

    .containermenu:hover {
        color: #bf0000;

    }

    @media screen and (max-width: 770px) {
        .menuright {
            margin-top: 2%;
        }

        .logo {
            text-align: center;
        }
    }

</style>

<body>
<div class="none">

    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 logo">
                <div class="text-center">
                    <a href="/"><img class="img-fluid" src="{{ asset('img/logo.png') }}"/></a>
                </div>
                <div class="versiontag">v{{ config('app.version') }}</div>
            </div>
            <div class="col-md-8">
                <div class="text-center">
                    <img class="img-fluid" src="{{ asset('img/imageprincipale.jpg') }}"/></a>
                </div>
            </div>
            <div class="col-md-1 containermenu">
                <a class="nav-item nav-link" href="/hikes_calendar">
                    <div class="menuright">
                        <i class="far fa-calendar-alt fa-2x"></i>
                        <p>Calendrier</p>
                    </div>
                </a>
            </div>
            @if(Auth::check())
                <div class="col-md-1 containermenu" onclick="location.href='{{ route('profile.show',Auth::user()->id) }}'">
                    <div class="menuright">
                        <i class="fas fa-user fa-2x"></i>
                        <p>{{ Auth::user()->firstname }} {{Auth::user()->lastname}}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="http://www.clubalpinsion.ch/">Club Alpin Sion</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link {{ $view_name == 'home' ? 'active' : '' }}" href="/">Mes Courses <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link {{ $view_name == 'hikes-index' ? 'active' : '' }}" href="{{route('hikes.index')}}">Liste des courses</a>
                <a class="nav-item nav-link {{ $view_name == 'hikes-create' ? 'active' : '' }}" href="{{route('hikes.create')}}">Créer une course</a>
                <a class="nav-item nav-link {{ $view_name == 'multihikes-create' ? 'active' : '' }}" href="{{route('multiHikes.index')}}">Créer plusieurs courses</a>
            </div>
        </div>
    </nav>

    <div class="content">
        @yield('body-content')
        @include('popup-message')
    </div>
</div>

@stack('scripts')
<script src="{{ asset('/js/utils.js') }}"></script>
</body>


</html>
