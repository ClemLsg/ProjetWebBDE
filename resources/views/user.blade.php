<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Heroic Features - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">


    <style>
        footer {
            background: #424242;
            padding: 40px;
        }
        footer a {
            color: #f8f9fa!important
        }
    </style>

</head>

<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/goodies/">Ces'ESport Goodies</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/goodies/product">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/goodies/category">Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/goodies/contact">A Propos</a>
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
                <a class="btn btn-success btn-sm ml-3" href="cart">
                    <i class="fa fa-shopping-cart"></i> Panier
                    <span class="badge badge-light">3</span>
                </a>
            </form>

        </div>
    </div>
</nav>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Votre compte</h1>
        <p class="lead text-muted mb-0">Sur cette page vous avez la possibilité de modifier vos informations personnelles</p>
    </div>
</section>
<div class="container">
    <h1>Modifier votre compte</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                <h6>Choisir autre photo</h6>

                <input type="file" class="form-control">
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-camera-retro"></i>
                Vous n'avez pas encore importé de <strong>photo</strong>. Une image vaut mieux que de long discours vous ne trouvez pas ?
            </div>
            <h3>Information personnelle</h3>
            <br>

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Prénom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Paul">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Fontaine">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Numéro de téléphone:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="06 69 32 11 05">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="gland@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Nom d'utilisateur:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="LeVeloute">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Nouveau mot de passe:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Retaper le mot de passe:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-primary" value="Sauvegarder" data-toggle="modal" data-target="#exampleModal">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Annuler">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>

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
                <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href=""><i>LeVeloute</i></a> | <span>v. 1.0</span></p>
            </div>
        </div>
    </div>
</footer>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmez</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe actuel:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe actuel">
                    </div>
                    <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script></html>