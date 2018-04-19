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
                <li class="breadcrumb-item active">Participants events</li>
            </ol>
            <!-- Area Chart Example-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-area-chart"></i> Participants {{$event->name}}</div>
                <div class="card-body">
                    <table class="table" style="text-align: center" id="printTable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($participant as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->surname}}</td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-header" style="text-align: center">

                        <button class="btn btn-default" onclick="printData()"><i class="fa fa-download" aria-hidden="true"></i></button>

                </div>
            </div>

        </div>
    </div>
    <script >
        function printData()
        {
            var divToPrint=document.getElementById("printTable");
            newWin= window.open("");
            newWin.document.write(divToPrint.outerHTML);
            newWin.print();
            newWin.close();
        }

        $('a').on('click',function(){
            printData();
        })
    </script>
@endsection