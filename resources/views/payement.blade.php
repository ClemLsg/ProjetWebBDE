<?php
/**
 * Created by PhpStorm.
 * User: Darkdady
 * Date: 04/11/18
 * Time: 17:14
 */
?>

@extends('layouts.headAndFoot')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Paiement</h1>
        </div>
    </section>

    <div class="container mb-4">
        <div class="row">
            <div id="accordion" class="col-sm-12">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>     Paiement par Paypal <i class="fa fa-paypal"></i>
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="col mb-2">
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6 text-center">
                                            <p>Paiement via Paypal (5% de frais supplémentaires)</p>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-sm-6 text-center">
                                            <form method="POST" action="{{route('order', 1)}}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-lg btn-block btn-primary text-uppercase">Paypal</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa fa-angle-down" aria-hidden="true"></i>     Paiement en espèce <i class="fa fa-eur" aria-hidden="true"></i>
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="col mb-2">
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 text-center">
                                        <p>Le paiement en espèce se fera lors de la remise en main propre du colis</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6 text-center">
                                        <form method="POST" action="{{route('order', 2)}}">
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-lg btn-block btn-success text-uppercase">Commander</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col mb-2">
                <div class="row justify-content-center">
                    <div class="col-sm-6">
                        <a class="btn btn-block" href="{{route('category')}}">Annuler la commande</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
