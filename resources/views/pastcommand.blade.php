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
                            <th scope="col">Promo</th>
                            <th scope="col">Date</th>
                            <th scope="col">Nom article</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">3</th>
                            <td>Clément</td>
                            <td>Lesage</td>
                            <td>A2</td>
                            <td>09/01/2018</td>
                            <td>Bonet Ces'ESport</td>
                            <td>5</td>
                            <td>Terminé <i class="fa fa-check" aria-hidden="true"></i></td>

                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Antoine</td>
                            <td>Morlet</td>
                            <td>A9</td>
                            <td>02/01/2018</td>
                            <td>Vaseline Ces'ESport</td>
                            <td>20</td>
                            <td>Terminé <i class="fa fa-check" aria-hidden="true"></i></td>

                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Paul</td>
                            <td>Fontaine</td>
                            <td>A2</td>
                            <td>01/01/2018</td>
                            <td>Pull Ces'ESport</td>
                            <td>1</td>
                            <td>Terminé <i class="fa fa-check" aria-hidden="true"></i></td>

                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer small text-muted">Listes des commandes à jour sans délais</div>
            </div>
        </div>
    </div>
@endsection