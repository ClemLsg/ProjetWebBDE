@extends('layouts.headAndFoot')

@section('content')

    {{--Contenu--}}
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Bienvenue sur le site du BDE Rouen</h1>
            <p class="lead text-muted mb-0">Vous pouvez ici faire plein de truc vraiment bien, comme voler l'argent des clubs ou faire un gala seulement qu'entre FIA.</p>
        </div>
    </section>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show col-sm-6 offset-3 text-center">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show col-sm-6 offset-3 text-center">
            <i class="fa fa-check" aria-hidden="true"></i>
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

<div class="container">
    <div class="row">
        <div class="col-md-6">
            @foreach($ideaboxes as $box)

                <div class="row">
                <div class="card-header col-md-12">
                    <h5>{{$box->name}}</h5>
                    <div class="container">
                        <div class="row">
                            <div class="card-body col-md-8">
                                <p class="mb-1 para">
                                    {{$box->desc}}
                                </p>
                            </div>
                            <div class="col-md-4 text-center justify-content-center mb-5 hr">
                                <div class="row mb-2">
                                    <div class="col-md-12">
                                        <a href="{{route('likeidea', $box->id)}}">
                                            <i class="fa fa-thumbs-up fa-2x" aria-hidden="true"></i>
                                        </a>
                                        <h4>{{$box->votes->count()}}</h4>
                                    </div>
                                </div>
                                @if($bde==1)
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#create{{$box->id}}">
                                            <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                </div>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            @guest
                <div class="card-header">
                    <h5>Faire un post</h5>
                    <div class="form-text">
                        <p>Vous devez être connecté pour proposer des idées</p>
                    </div>
                </div>
                @else
                <div class="card-header">
                    <h5>Faire un post</h5>
                    <form class="form-horizontal" role="form" method="post" action="{{route('addidea')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-lg-12 control-label">Titre:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" placeholder="" name="titre" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-12 control-label">Description:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" placeholder="" name="desc" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label"></label>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endguest

            <div class="best"></div>
            <div class="card-header " >
                <div class="card-header top "><h2>Meilleurs idées</h2></div>

                <div class="card-body scroll">
                    @foreach($bestboxes as $box)
                        <h4 id="fat">{{$box->name}}</h4>
                        <p>{{$box->desc}}</p>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
</div>
    @foreach($ideaboxes as $box)
        <div class="modal fade" id="create{{$box->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Créer l'évènement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="{{route("transformevent", $box->id)}}">
                        <div class="modal-body">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label class="col-lg-12 control-label">Titre:</label>
                                <div class="col-lg-12">
                                    <input class="form-control" type="text" placeholder="" name="titre" value="{{$box->name}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-12 control-label">Description:</label>
                                <div class="col-lg-12">
                                    <input class="form-control" type="text" placeholder="" name="desc" value="{{$box->desc}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-12 control-label">Price:</label>
                                <div class="col-lg-12">
                                    <input class="form-control" type="number" placeholder="" name="price" value="0" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-12 control-label">Date:</label>
                                <div class="col-lg-12">
                                    <input class="form-control" type="date" placeholder="" name="date" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Image:</label>
                                <input type="file" class="form-control-file" name="image" id="exampleInputFile" aria-describedby="fileHelp" required>
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


    {{--Fin contenu--}}
@endsection