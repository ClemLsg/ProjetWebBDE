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
                    <table class="table" style="text-align: center">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                            <th scope="col">Participants</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($acts as $act)
                        <tr>
                            <th scope="row">{{$act->id}}</th>
                            <td>{{$act->name}}</td>
                            <td>{{$act->price}}€</td>
                            <td>{{$act->date}}</td>
                            <td><button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#change{{$act->id}}" >
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>
                            <td style="text-align: center"><a class="btn btn-default" aria-label="Left Align" href="{{route('partipateevents')}}">
                                    <span class="fa fa-user fa-2x" aria-hidden="true"></span>
                                </a>

                            </td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-2">

                            </div>
                            <div class="col-md-auto">
                                <button class="btn btn-lg btn-block btn-success text-uppercase" data-toggle="modal" data-target="#addevent">Ajouter un évenement <span class="fa fa-plus" aria-hidden="true"></span></button>
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
    @foreach($acts as $act)
        <div class="modal fade" id="change{{$act->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Suprimmer l'activité "{{$act->name}}"</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{route('DeleteEvent', $act->id)}}">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">Confirmer la supréssion de l'évenement</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Suprimmer l'activité</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="addevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crée un évent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{route("AddEvent")}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="exampleTextarea">Nom de l'event</label>
                            <input class="form-control" name="name" id="exampleTextarea"/>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Description de l'event</label>
                            <textarea class="form-control" name="desc" id="exampleTextarea" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea">Prix du produit</label>
                            <input class="form-control" type="number" name="price" value="0" id="example-number-input">
                        </div>
                        <div class="form-group row">
                            <label for="example-date-input" class="col-2 col-form-label">Date</label>
                            <div class="col-10">
                                <input class="form-control" name="date" type="date" value="2011-08-19" id="example-date-input">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleSelect1">Catégorie</label>
                            <select class="form-control" name="cat" id="exampleSelect1">
                                    <option>Recurrent</option>
                                    <option>Ponctuel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Image de l'évent</label>
                            <input type="file" class="form-control-file" name="image" id="exampleInputFile" aria-describedby="fileHelp">
                            <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Crée l'évent</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection