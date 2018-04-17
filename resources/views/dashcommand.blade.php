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
                <li class="breadcrumb-item active">Commandes</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Commandes de goodies à traiter</div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($commands as $command)
                            <tr>
                                <th scope="row">{{$command->id}}</th>
                                <td>{{$command->user->name}}</td>
                                <td>{{$command->user->surname}}</td>
                                <td>{{$command->created_at->format("d M Y H:i")}}</td>
                                @switch($command->status)
                                    @case(1)
                                        <td>Paiement Paypal validé <i class="fa fa-cc-paypal" aria-hidden="true"></i></td>
                                    @break
                                    @case(2)
                                        <td>Paiement éspece en attente <i class="fa fa-money" aria-hidden="true"></i></td>
                                    @break
                                @endswitch
                                <td><button type="button" class="btn btn-default" aria-label="Left Align" data-toggle="modal" data-target="#change{{$command->id}}">
                                        <span class="fa fa-pencil-square-o fa-lg fa-2x" aria-hidden="true"></span>
                                    </button></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @foreach($commands as $command)
                <div class="modal fade" id="change{{$command->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Changer status</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{route('ChangeStatusCommand', $command->id)}}">
                            <div class="modal-body">
                                    {{csrf_field()}}
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="paiementvalide" value="1">
                                        <label class="form-check-label" for="paiementvalide">
                                            Paiement validé
                                            <i class="fa fa-paypal" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="paiementattente" value="2">
                                        <label class="form-check-label" for="paiementattente">
                                            Paiement en attente
                                            <i class="fa fa-money" aria-hidden="true"></i>

                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="termine" value="0">
                                        <label class="form-check-label" for="termine">
                                            Terminé
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </label>
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
                <div class="card-footer small text-muted">Listes des commandes à jour sans délais</div>
            </div>
            </div>
        </div>
    </div>
@endsection