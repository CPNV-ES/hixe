<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') - Hixe</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <!--Font Awesome -->
    <script src="https://kit.fontawesome.com/30414cf885.js" crossorigin="anonymous"></script>

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
                <a href="/"><img class="img-fluid align-middle" src="{{ asset('img/logo.png') }}"/></a>
            </div>
            <div class="col-md-8">
                <img class="img-fluid align-middle" src="{{ asset('img/imageprincipale.jpg') }}"/></a>
            </div>
            <div class="col-md-1 containermenu">
                <div class="menuright">
                    <i class="far fa-calendar-alt fa-2x"></i>
                    <p>Calendrier</p>
                </div>
            </div>
            <div class="col-md-1 containermenu">
                <div class="menuright">
                    <i class="fas fa-user fa-2x"></i>
                    <p>Hubert Login</p>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        @yield('body-content')
    </div>
</div>
</body>

</html>
