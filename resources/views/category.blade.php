@extends('layouts.headAndFoot')

@section('content')
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show col-sm-6 offset-3 text-center" style="z-index: 1; position: absolute">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show col-sm-6 offset-3 text-center" style="z-index: 1; position: absolute">
            <i class="fa fa-check" aria-hidden="true"></i>
            {{ session('success') }}
            <a href="{{route('cart')}}">Cliquez ici pour accèder a votre panier</a>
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CATEGORY</h1>
        <p class="lead text-muted mb-0">Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l'imprimerie depuis les années 1500, quand un peintre anonyme assembla ensemble des morceaux de texte pour réaliser un livre spécimen de polices de texte...</p>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('category')}}">Catégorie</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Sous-catégorie</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Catégorie</div>
                <ul class="list-group category_block">
                    <li class="list-group-item" onclick="expandResults(0)" style="cursor: pointer">Tout</li>
                    @foreach($categories as $cat)
                    <li class="list-group-item" onclick="expandResults({{$cat->id}})" style="cursor: pointer">{{$cat->name}}</li>
                    @endforeach
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Dernier produit</div>
                <div class="card-body">
                    <img class="img-fluid" src="{{$last->pictures()->first()->url}}" />
                    <h5 class="card-title">{{$last->name}}</h5>
                    <p class="bloc_left_price">{{$last->price}} $</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row" id="category-container">
            </div>
                <div class="col-12">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">TITRE PRODUIT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <img class="img-fluid" src="https://dummyimage.com/1200x1200/55595c/fff" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>

        var request = new XMLHttpRequest();
        request.open("GET", "/api/products/0", false);
        request.send(null);
        var responses = JSON.parse(request.responseText);

        var request2 = new XMLHttpRequest();
        request2.open("GET", "/api/image/url/", false);
        request2.send(null);
        var url = JSON.parse(request2.responseText);

        expandResults(0);

        function expandResults(filterValue){
            containerE = document.getElementById("category-container");
            containerE.innerHTML = "";
            for (var i in responses){
                if(responses[i].category_id === filterValue || filterValue === 0){
                    containerE.innerHTML = containerE.innerHTML +
                        "<div class='col-12 col-md-6 col-lg-4'>" +
                            "<div class='card'>" +
                                "<img class='card-img-top' src='"+ url[responses[i].id] +"' alt='Card image cap'>" +
                                "<div class='card-body'>" +
                                    "<h4 class='card-title'><a href='"+"/product/"+ responses[i].id +"' title='View Product'>"+responses[i].name +"</a></h4>" +
                                    "<div class='row'>" +
                                        "<div class='col'>" +
                                            "<p class='btn btn-danger btn-block'>"+responses[i].price +" $</p>" +
                                        "</div>" +
                                        "<form class='col' method='POST' action='/cart/add/" + responses[i].id + "'>" + "<input type='hidden' name='_token' value='V6x69qglz1C1ALFYYBsGOv0UlepTgHjl6lwHyBkP'>" +
                                        "<input type='text' class='form-control d-none' id='quantity' name='quantity' min='1' max='10' value='1'>" +
                                            "<div class='col-sm-12'>" +
                                                "<button type='submit' class='btn btn-success btn-block'>Ajouter au panier</button>" +
                                            "</div>" +
                                        "</form>" +
                                    "</div>" +
                                "</div>" +
                            "</div>" +
                        "</div>";
                }
            }
        }
    </script>
@endsection