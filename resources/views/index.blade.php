@extends('layouts.headAndFoot')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Bienvenue sur le site du BDE Rouen</h1>
        <p class="lead text-muted mb-0">Vous pouvez ici faire plein de truc vraiment bien, comme voler l'argent des clubs ou faire un gala seulement qu'entre FIA.</p>
    </div>
</section>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <h1 class="my-4">Les évenements du BDE</h1>

            <!-- Blog Post -->
            <div class="card mb-4">
                <div style="background-image: url({{$firstevent->pictures()->first()->url}}); padding-bottom: 18.75rem" class="img-event col-sm-12">
                </div>
                <div class="card-body">
                    <div class="row row-striped">
                        <div class="col-2 text-right">
                            <h1 class="display-4"><span class="badge badge-secondary">{{ $firstevent->date->format('d') }}</span></h1>
                            <h2>{{ $firstevent->date->format('M') }}</h2>
                        </div>
                        <div class="col-10">
                            <h3 class="text-uppercase"><strong>{{$firstevent->name}}</strong></h3>
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $firstevent->date->format('d M Y') }}</li>
                                <li class="list-inline-item"><i class="fa fa-eur" aria-hidden="true"></i> {{ $firstevent->price }}</li>
                            </ul>
                            <p>{{$firstevent->description}}</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Lire Plus &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Créé le {{ $firstevent->created_at->format('d M Y - H:i') }} par
                    <a href="">{{ $firstevent->creator->name }}</a>
                </div>
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Dernière activité publié</h5>
                <div class="card-body">
                    <strong>{{$latestevent->name}}</strong>
                    <p>{{$latestevent->description}}</p>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Boite à idée</h5>
                <div class="card-body">
                    <div class="well">
                        <div class="input-group">
                        @foreach($bestboxes as $box)
                            <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
                                <strong class="pull-left primary-font">{{$box->name}}</strong>
                                </br>
                                <li class="ui-state-default">{{$box->desc}}</li>
                                </br>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        </div>






    </div>
    <!-- /.row -->

</div>
<!-- /.container -->



@endsection