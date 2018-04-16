@extends('layouts.headAndFoot')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Votre compte</h1>
        <p class="lead text-muted mb-0">Sur cette page vous avez la possibilité de modifier vos informations personnelles</p>
    </div>
</section>
<div class="container">
    <h1>Modifier votre compte</h1>
    <hr>
    <div class="row">
        <!-- left column -->
        <div class="col-md-3">
            <form class="form-horizontal" role="form" method="post" action="{{route('changeAvatar')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="text-center">
                    <img src="{{$user->avatar->url}}" class="avatar img-circle" alt="avatar" style="max-width: 100px; max-height: 100px">
                    <div class="form-group">
                        <label for="file">Example file input</label>
                        <input type="file" class="form-control-file" name="avatar" id="file">
                    </div>
                    <button type="submit" class="btn btn-primary">Mettre cette photo trop swag</button>
                </div>
            </form>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show col-sm-6 offset-3 text-center">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show col-sm-6 offset-3 text-center">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif
            <h3>Information personnelle</h3>
            <br>
            <form class="form-horizontal" role="form" method="post" action="{{route('changeData')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <label class="col-lg-3 control-label">Prénom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" placeholder="{{$user->name}}" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" placeholder="{{$user->surname}}" name="surname">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" placeholder="{{$user->email}}" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Nouveau mot de passe:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" name="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Retaper le mot de passe:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" name="passwordCheck">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<hr>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmez</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe actuel:</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Entrez votre mot de passe actuel">
                    </div>
                    <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $( '.inputfile' ).each( function()
            {
                var $input	 = $( this ),
                    $label	 = $input.next( 'label' ),
                    labelVal = $label.html();

                $input.on( 'change', function( e )
                {
                    var fileName = '';

                    if( this.files && this.files.length > 1 )
                        fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                    else if( e.target.value )
                        fileName = e.target.value.split( '\\' ).pop();

                    if( fileName )
                        $label.find( 'span' ).html( fileName );
                    else
                        $label.html( labelVal );
                });

// Firefox bug fix
                $input
                    .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
                    .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
            });
        });
    </script>
@endsection