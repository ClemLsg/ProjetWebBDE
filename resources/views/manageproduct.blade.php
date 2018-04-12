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
                <li class="breadcrumb-item active">Gestion des produits</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Produit en vente</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Vendu</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Vaseline Ces'ESport</td>
                            <td>465</td>
                            <td>20</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Pull Ces'ESport</td>
                            <td>154</td>
                            <td>20</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Pull Ces'ESport</td>
                            <td>465</td>
                            <td>20</td>
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
                                <button class="btn btn-lg btn-block btn-success text-uppercase">Ajouter un produit <span class="fa fa-plus" aria-hidden="true"></span></button>
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