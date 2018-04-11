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
                <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
                <div class="card-body">
                    <div class="row row-striped">
                        <div class="col-2 text-right">
                            <h1 class="display-4"><span class="badge badge-secondary">13</span></h1>
                            <h2>AVRIL</h2>
                        </div>
                        <div class="col-10">
                            <h3 class="text-uppercase"><strong>Le Gala du CESI</strong></h3>
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> Vendredi</li>
                                <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> 2:30 PM - 4:00 PM</li>
                                <li class="list-inline-item"><i class="fa fa-location-arrow" aria-hidden="true"></i> Panorama XXL - So</li>
                            </ul>
                            <p>Lorem ipsum dolsit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <a href="#" class="btn btn-primary">Read More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on January 1, 2018 by
                    <a href="#">LeVeloute</a>
                </div>
            </div>

            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                    <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Dernière activité publié</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Boite à idée</h5>
                <div class="card-body">
                    <div class="well">
                        <div class="input-group">
                            <input type="text" id="userComment" class="form-control input-sm chat-input" placeholder="Ecrivez votre idée ici !" />
                            <span class="input-group-btn" onclick="addComment()">
                            <a href="#" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-comment"></span> Add Comment</a></span>
                                </div>
                                <hr data-brackets-id="12673">
                                <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
                                    <strong class="pull-left primary-font">James</strong>
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>7 mins ago</small>
                                    </br>
                                    <li class="ui-state-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
                                    </br>
                                    <strong class="pull-left primary-font">Taylor</strong>
                                    <small class="pull-right text-muted">
                                        <span class="glyphicon glyphicon-time"></span>14 mins ago</small>
                                    </br>
                                    <li class="ui-state-default">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>

                                </ul>
                </div>
            </div>
            

        </div>






    </div>
    <!-- /.row -->

</div>
<!-- /.container -->



@endsection