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
                            <td><button type="button" class="btn btn-default" aria-label="Left Align"  data-toggle="modal" data-target="#change">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Pull Ces'ESport</td>
                            <td>154</td>
                            <td>20</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#change">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true" ></span>
                                </button></td>

                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Pull Ces'ESport</td>
                            <td>465</td>
                            <td>20</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align"  data-toggle="modal" data-target="#change">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>

                        </tr>
                        </tbody>
                    </table>
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

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Stock" aria-label="Stock" aria-describedby="basic-addon1">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Ventes" aria-label="Ventes" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row justify-content-md-center">
                                        <div class="col col-lg-2">
                                        </div>
                                        <div class="col-md-auto">
                                            <form class="upload">
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">Upload</label>
                                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col col-lg-2">

                                        </div>
                                    </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection