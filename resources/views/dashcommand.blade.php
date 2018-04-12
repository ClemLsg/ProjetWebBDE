@extends('layouts.dash')

@section('content')
    <style>
        .fa-cog {
            color: gray;
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Commandes</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Commandes de goodies à traiter</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Promo</th>
                            <th scope="col">Date</th>
                            <th scope="col">Nom article</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">5</th>
                            <td>Clément</td>
                            <td>Lesage</td>
                            <td>A2</td>
                            <td>09/01/2018</td>
                            <td>Bonet Ces'ESport</td>
                            <td>5</td>
                            <td>Paiement éspece en attente <i class="fa fa-money" aria-hidden="true"></i></td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#change">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Paul</td>
                            <td>Fontaine</td>
                            <td>A2</td>
                            <td>01/01/2018</td>
                            <td>Pull Ces'ESport</td>
                            <td>1</td>
                            <td>Paiement validé <i class="fa fa-paypal" aria-hidden="true"></i></td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#change">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true">

                                    </span>
                                </button></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Changer status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Paiement validé
                                        <i class="fa fa-paypal" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Paiement en attente
                                        <i class="fa fa-money" aria-hidden="true"></i>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Terminé
                                        <i class="fa fa-check" aria-hidden="true"></i>

                                    </label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer small text-muted">Listes des commandes à jour sans délais</div>
            </div>
            </div>
        </div>
    </div>
@endsection