<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin - Start Bootstrap Template</title>
    <!-- Bootstrap core CSS-->
    <link href="{{asset('css/material.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Page level plugin CSS-->
    <link href="{{asset('css/dataTables.css')}}" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('dashboard')}}">BDE Administration</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Tableau de bord</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-area-chart"></i>
                    <span class="nav-link-text">Goodies</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents3">
                    <li>
                        <a href="{{route('dashcommand')}}">Commandes à traiter</a>
                    </li>
                    <li>
                        <a href="{{route('pastcommand')}}">Commandes terminées</a>
                    </li>
                    <li>
                        <a href="{{route('manageproduct')}}">Gestion des produits</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-calendar"></i>
                    <span class="nav-link-text">Evenements</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents2">
                    <li>
                        <a href="{{route('manageevent')}}">Gestion des evenements</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Administration</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseComponents">
                    <li>
                        <a href="{{route('manageaccount')}}">Gestion des comptes</a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Quitter le tableau de bord</a>
            </li>
        </ul>
    </div>
</nav>

@yield('content')

<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © BDE Rouen 2018</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vous partez déja ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Cliquez sur "Quitter" pour quitter la session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{route('index')}}">Quitter</a>
            </div>
        </div>
    </div>
</div> <!-- Bootstrap core JavaScript-->
<script src="{{asset('js/jquery2.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('js/jquery.easing.js')}}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{asset('js/chart.js')}}"></script>
<script src="{{asset('js/datachart.js')}}"></script>
<script src="{{asset('js/bootstrap.table.js')}}"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin.js')}}"></script>
<!-- Custom scripts for this page-->
<script>$(document).ready(function(){$("#dataTable").DataTable()});</script>
<script src="{{asset('js/data-sb-admin.js')}}"></script>
</div>

</body>

</html>