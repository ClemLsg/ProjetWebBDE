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

    <title>BDE SHOP</title>

    <link rel="stylesheet" href="{{ asset('css/icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/idea.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{route("index")}}">BDE CESI ROUEN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{route("product", 1)}}">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("category")}}">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route("contact")}}">A Propos</a>
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
                            <a class="dropdown-item" href="#">Mes commandes</a>
                            <a class="dropdown-item" href="#">Mon compte</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route("logout")}}">Déconnexion</a>
                        </div>
                    </li>
                @endguest
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" placeholder="Rechercher...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
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
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>A Propos</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Nous sommes une branche du BDS du CESI EXIA, une école d'ingénieur en informatique localisée à Mont Saint Aignan. L'objet de notre association est d'organiser des événements autour de l'esport.
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Liens utiles</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="https://ces-esport.fr">Site mère</a></li>
                    <li><a href="{{route("shop")}}">Page d'accueil</a></li>
                    <li><a href="{{route("user")}}">Votre compte</a></li>
                    <li><a href="{{route("contact")}}">Notre contact</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Autres liens</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="{{route("user")}}">Votre compte</a></li>
                    <li><a href="">Vos commandes</a></li>
                    <li><a href="{{route("cart")}}">Votre panier</a></li>
                    <li><a href="">Nos CGU</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> Ces'ESport</li>
                    <li><i class="fa fa-envelope mr-2"></i> paul.fontaine@viacesi.fr</li>
                    <li><i class="fa fa-phone mr-2"></i> + 33 7 81 70 35 86</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Haut de page</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/material.js') }}"></script>
@yield('scripts')

</body>
</html>