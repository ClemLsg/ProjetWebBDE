@guest
@else
<?php
$cart = Auth::user()->cart;
?>
@endguest

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('/public/pictures/bde.ico')}}" type="image/gif" sizes="16x16">

    <title>BDE SHOP</title>

    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/idea.css') }}">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="background: #8a1002 !important;">
    <div class="container">
        <a class="navbar-brand" href="{{route("index")}}">
            <img src="{{asset('/public/pictures/bde.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
            BDE CESI ROUEN
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route("events")}}">évènements</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("category")}}">Boutique</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("ideabox")}}">Boite a idées</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("login")}}">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("register")}}">Inscription</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{\Illuminate\Support\Facades\Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('commandes_user')}}">Mes commandes</a>
                            <a class="dropdown-item" href="{{route('user')}}">Mon compte</a>
                            @if(Auth::user()->rank > 0)
                                <a class="dropdown-item" href="{{route('dashboard')}}">Dashboard</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route("logout")}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Déconnexion</a>
                        </div>
                    </li>
                @endguest
            </ul>

            <form class="form-inline my-2 my-lg-0">
                @guest
                @else
                <a class="btn btn-success btn-sm ml-3" href="{{route("cart")}}">
                    <i class="fa fa-shopping-cart"></i> Panier
                    @if($cart->count() > 0)
                        <span class="badge badge-light">{{$cart->count()}}</span>
                    @endif
                </a>
                @endguest
            </form>

        </div>
    </div>
</nav>

@yield('content')

<!-- Footer -->
<footer class="text-light" style="background: #8a1002 !important;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>A Propos</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Le site du BDE du cesi de Rouen
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Liens utiles</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="{{route("index")}}">Page d'accueil</a></li>
                    <li><a href="{{route('user')}}">Votre compte</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Autres liens</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="{{route("user")}}">Votre compte</a></li>
                    <li><a href="{{route('commandes_user')}}">Vos commandes</a></li>
                    <li><a href="{{route("cart")}}">Votre panier</a></li>
                </ul>
            </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/jquery2.js') }}"></script>
<script src="{{ asset('js/material.js') }}"></script>
@yield('scripts')

</body>
</html>