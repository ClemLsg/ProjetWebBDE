@extends('layouts.headAndFoot')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Votre panier</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col"> </th>
                        <th scope="col">Produit</th>
                        <th scope="col">Disponnibilité</th>
                        <th scope="col" class="text-center">Quantité</th>
                        <th scope="col" class="text-right">Prix</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $prod)
                        <tr>
                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
                            <td>{{$prod->name}}</td>
                            <td>In stock</td>
                            <td><input class="form-control" type="text" value="{{$prod->cart->quantity}}" /></td>
                            <td class="text-right">{{($prod->cart->quantity) * ($prod->price) }} €</td>
                            <form method="POST" action="{{route('removefromcart', $prod->id)}}">
                                {{ csrf_field() }}
                                <td class="text-right"><button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                            </form>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Livraison</td>
                        <td class="text-right">Gratuite</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><strong>{{$total}} €</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a class="btn btn-block" href="{{route('category')}}">Continuer vos achats</a>
                </div>
                @if($validate == 1)
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{route('payment')}}" class="btn btn-lg btn-block btn-success text-uppercase">Confirmer la commande</a>
                    </div>
                @else
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="{{route('category')}}" class="btn btn-lg btn-block btn-primary text-uppercase">Votre panier est vide</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection