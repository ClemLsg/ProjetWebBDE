@extends('layouts.headAndFoot')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{$event->name}}</h1>
        </div>
    </section>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div style="background-image: url({{asset($event->pictures()->first()->url)}}); padding-bottom: 18.75rem" class="img-event col-sm-12">
                    </div>
                    <div class="card-header">
                        <div class="row row-striped">
                            <div class="col-2 text-right">
                                <h1 class="display-4"><span class="badge badge-secondary">{{ $event->date->format('d') }}</span></h1>
                                <h2>{{ $event->date->format('M') }}</h2>
                            </div>
                            <div class="col-10">
                                <h3 class="text-uppercase"><strong>{{$event->name}}</strong></h3>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        Organisé par <a href="">{{ $event->creator->name }}</a>
                                        le {{ $event->created_at->format('d M Y - H:i') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <a href="{{route("event", $event->id)}}" class="btn btn-outline-primary"><i class="fa fa-check" aria-hidden="true"></i> S'inscrire</a>
                        <a href="{{route("event", $event->id)}}" class="btn btn-outline-primary"><i class="fa fa-upload" aria-hidden="true"></i> Ajouter une photo</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="whosVisible()">
                            Launch demo modal
                        </button>
                    </div>
                    <div class="card-body text-muted">
                        <div class="row mt-2 mb-4">
                            <div class="col-sm-12">
                                <h5 class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i> {{ $event->date->format('d M Y') }}</h5>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <h5 class="list-inline-item"><i class="fa fa-eur" aria-hidden="true"></i> {{ $event->price }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row mt-2 mb-4">
                            <div class="col-sm-12">
                                <h5 class="list-inline-item"> {{ $event->description }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 text-center">
                                <h5>{{$event->participants()->count()}} participant(s)</h5>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            @foreach($firstparticipants as $participant)
                                <div class="col-sm-2 text-center userpict">
                                    <div style="background-image: url({{asset($participant->avatar->url)}});" class="img-event col-sm-12 img-fluid userpict rounded-circle">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 text-center">
                                <h5>{{$event->pictures()->count()}} photo(s)</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($event->pictures as $pict)
                                <div class="col-sm-4 mb-4">
                                    <div style="background-image: url({{asset($pict->url)}})" class="img-event col-sm-12 imgs">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal img-modal fade" id="exampleModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 modal-image">
                            <div id="CarouselModal" class="carousel slide" data-ride="carousel" data-interval="false">
                                <div class="carousel-inner">
                                    @foreach($event->pictures as $pict)
                                        @if ($loop->first)
                                            <div class="carousel-item active" id="{{$pict->id}}" username="{{$pict->postedby->name}}" userpicturl="{{asset($pict->postedby->avatar->url)}}" dateofpost="{{$pict->created_at->format('d M Y')}}" likes="{{$pict->likes->count()}}">
                                                <img class="d-block m-auto" src="{{asset($pict->url)}}">
                                            </div>
                                        @else
                                        <div class="carousel-item" id="{{$pict->id}}" username="{{$pict->postedby->name}}" userpicturl="{{asset($pict->postedby->avatar->url)}}" dateofpost="{{$pict->created_at->format('d M Y')}}" likes="{{$pict->likes->count()}}">
                                            <img class="d-block m-auto" src="{{asset($pict->url)}}" />
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#CarouselModal" role="button" data-slide="prev" onclick="whosVisible()">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#CarouselModal" role="button" data-slide="next" onclick="whosVisible()">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 modal-meta">
                            <div class="modal-meta-top">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                <div class="modal-img-header">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div class="img-poster clearfix pb-2" id="imgposter">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <button class="btn btn-outline-primary" type="button" id="likes"></button>
                                            <button class="btn btn-outline-danger" type="button"><i class="fa fa-flag" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>

                                <ul class="img-comment-list" id="comments-picture">
                                </ul>
                            </div>
                            <div class="modal-meta-bottom">
                                <form id="commentform" class="form-horizontal" role="form" method="post" action="{{route('comment')}}" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="input-group">
                                        <input id="commentcontent" type="text" class="form-control" name="comment" placeholder="Votre commentaire..." aria-label="Votre commentaire..." aria-describedby="basic-addon2" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary" type="submit" ><i class="fa fa-comment" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <input id="idform" type="hidden" name="post_id" value="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/event.js') }}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>

    </script>
@endsection