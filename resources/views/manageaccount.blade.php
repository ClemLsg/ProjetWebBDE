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
                <li class="breadcrumb-item active">Gestion des évenements</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-calendar"></i> Evenement prévu</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Promo</th>
                            <th scope="col">Rang</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fontaine</td>
                            <td>Paul</td>
                            <td>A2</td>
                            <td>Etudiant</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Billis</td>
                            <td>Enzo</td>
                            <td>A2</td>
                            <td>Membre BDE</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Antoine</td>
                            <td>Morlet</td>
                            <td>A9</td>
                            <td>Salarié CESI</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-2">

                            </div>
                            <div class="col-md-auto">
                                <button class="btn btn-lg btn-block btn-success text-uppercase">Ajouter un utilisateur <span class="fa fa-plus" aria-hidden="true"></span></button>
                            </div>
                            <div class="col col-lg-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection