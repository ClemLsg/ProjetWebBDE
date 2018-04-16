<?php
/**
 * Created by PhpStorm.
 * User: Darkdady
 * Date: 04/16/18
 * Time: 13:20
 */
?>

@extends('layouts.headAndFoot')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Vos commandes</h1>
            <p class="lead text-muted mb-0">Sur cette page vous avez la possibilité de modifier vos informations personnelles</p>
        </div>
    </section>
    <div class="card col-sm-10 offset-1 mb-5">
        @foreach($commandes as $command)
        <div class="card-header">
            <i class="fa fa-calendar"></i> Commande n°{{$command->id}}</div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Quantité</th>
                </tr>
                </thead>
                <tbody>
                @foreach($command->products as $prod)
                    <tr>
                        <th scope="row">{{$prod->id}}</th>
                        <td><img style="max-width: 100px" src="{{$prod->pictures->first()->url}}" /> </td>
                        <td>{{$prod->name}}</td>
                        <td>{{$prod->products->quantity}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
                        <button class="btn btn-lg btn-block btn-success text-uppercase">
                            Statut de la commande :
                            @switch($command->status)

                                @case(0)
                                Validée
                                @break

                                @case(1)
                                Paiement Paypal validé
                                @break

                                @case(2)
                                Paiement espèce
                                @break

                            @endswitch
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
