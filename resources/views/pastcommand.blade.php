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
                <li class="breadcrumb-item active">Commandes Passé</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Commandes de goodies terminé</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commands as $command)
                            <tr>
                                <th scope="row">{{$command->id}}</th>
                                <td>{{$command->user->name}}</td>
                                <td>{{$command->user->surname}}</td>
                                <td>{{$command->created_at->format("d M Y H:i")}}</td>
                                    <td>Terminé <i class="fa fa-check" aria-hidden="true"></i></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer small text-muted">Listes des commandes à jour sans délais</div>
            </div>
        </div>
    </div>
@endsection