@extends('layouts.dash')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-white">
                                <i class="fa fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">26 nouveaux mails!</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="#">
                            <span class="float-left">Voir la boite mail du BDE</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-white">
                                <i class="fa fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">11 nouvelles idées!</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="#">
                            <span class="float-left">Voir les idées</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-white">
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">123 nouvelles commandes!</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="#">
                            <span class="float-left">Voir les commandes</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon text-white">
                                <i class="fa fa-fw fa-support"></i>
                            </div>
                            <div class="mr-5">13 signalement du CESI!</div>
                        </div>
                        <a class="card-footer clearfix small z-1" href="#">
                            <span class="float-left">Voir les signalements</span>
                            <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Les stats du BDE Rouen</div>
                <div class="card-body">
                    <div style="width:75%;">
                        {!! $chartjs1->render() !!}
                    </div>
                </div>
                <div class="card-footer small text-muted">Graphique mis à jour tout les mois</div>
            </div>
        </div>
    </div>

@endsection