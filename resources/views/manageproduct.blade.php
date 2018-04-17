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
                            <th scope="col">Prix</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <th scope="row">{{$product->id}}</th>
                                <td>{{$product->name}}</td>
                                <td>{{$product->stock}}</td>
                                <td>{{$product->price}}</td>
                                <td><button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#change{{$product->id}}">
                                        <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                    </button></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="card-footer">
                        <div class="container">
                            <div class="row justify-content-md-center">
                                <div class="col col-lg-2">

                                </div>
                                <div class="col-md-auto">
                                    <button class="btn btn-lg btn-block btn-success text-uppercase" data-toggle="modal" data-target="#addprod">Ajouter un produit <span class="fa fa-plus" aria-hidden="true"></span></button>
                                </div>
                                <div class="col col-lg-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach($products as $product)
                        <div class="modal fade" id="change{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Changer le stock</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="post" action="{{route('ChangeInfoProduct', $product->id)}}">
                                        <div class="modal-body">
                                            {{csrf_field()}}
                                            <div class="form-group row">
                                                <label for="example-number-input" class="col-2 col-form-label">Stock réstant</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="number" name="stock" value="{{$product->stock}}" id="example-number-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endforeach
                <!-- Modal -->
                    <div class="modal fade" id="addprod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Crée un produit</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form method="post" action="{{route("AddProduct")}}" enctype="multipart/form-data">
                                        {{csrf_field()}}

                                        <div class="form-group">
                                            <label for="exampleTextarea">Nom du produit</label>
                                            <input class="form-control" name="name" id="exampleTextarea"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea">Description du produit</label>
                                            <textarea class="form-control" name="desc" id="exampleTextarea" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleSelect1">Catégorie</label>
                                            <select class="form-control" name="cat" id="exampleSelect1">
                                                @foreach($categorys as $category)
                                                <option>{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea">Prix du produit</label>
                                            <input class="form-control" type="number" name="price" value="0" id="example-number-input">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea">Stock actuel</label>
                                            <input class="form-control" type="number" name="stock" value="0" id="example-number-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputFile">Image du produit</label>
                                            <input type="file" class="form-control-file" name="image" id="exampleInputFile" aria-describedby="fileHelp">
                                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
    </div>
@endsection