@extends('layouts.dash')

@section('content')
    <style>
        .fa-cog {
            color: gray;
        }
    </style>
    <!-- modal -->

    <div class="modal" tabindex="-1" role="dialog" id="AddUserModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajouter Utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="{{route('manageAccountAddUser')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleTextarea">Nom</label>
                            <input class="form-control" name="surname"/>
                        </div>
                        <div class="form-group">
                            <label for="FirstNameTextArea">Prénom</label>
                            <textarea class="form-control" name="firstname"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline4" value=0 name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline4">Etudiant</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline5" value=1 name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline5">Membre BDE</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline6" value=2 name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline6">Salarié CESI</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="emailTextArea">Email</label>
                            <input class="form-control" name="email"/>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <div class="content-wrapper">
        <div class="container-fluid">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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

                        @foreach($users as $user)

                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->name}}</td>
                            <td>A2</td>
                            @if($user->rank == 0)
                            <td>Etudiant</td>
                            @elseif($user->rank == 1)
                                <td>Membre BDE</td>
                            @elseif($user->rank == 2)
                            <td>Salarié CESI</td>
                            @endif
                            <td><button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#editModal{{$user->id}}">
                                    <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                </button></td>
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
                                <button class="btn btn-lg btn-block btn-success text-uppercase" data-toggle="modal" data-target="#AddUserModal">Ajouter un utilisateur <span class="fa fa-plus" aria-hidden="true"></span></button>
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

    @foreach($users as $user)
    <div class="modal" tabindex="-1" role="dialog" id="editModal{{$user->id}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editer utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" role="form" enctype="multipart/form-data" action="{{route('manageAccountUpdateUser', $user->id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleTextarea">Nom</label>
                            <input class="form-control" name="surname"/>
                        </div>
                        <div class="form-group">
                            <label for="FirstNameTextArea">Prénom</label>
                            <textarea class="form-control" name="firstname"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline1{{$user->id}}" value=0 name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline1{{$user->id}}">Etudiant</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline2{{$user->id}}" value=1 name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline2{{$user->id}}">Membre BDE</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadioInline3{{$user->id}}" value=2 name="customRadioInline1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadioInline3{{$user->id}}">Salarié CESI</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Sauvegarder</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    @endforeach

@endsection