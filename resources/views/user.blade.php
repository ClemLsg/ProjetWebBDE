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
            <div class="text-center">
                <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                <h6>Choisir autre photo</h6>

                <input type="file" class="form-control">
            </div>
        </div>

        <!-- edit form column -->
        <div class="col-md-9 personal-info">
            <div class="alert alert-info alert-dismissable">
                <a class="panel-close close" data-dismiss="alert">×</a>
                <i class="fa fa-camera-retro"></i>
                Vous n'avez pas encore importé de <strong>photo</strong>. Une image vaut mieux que de long discours vous ne trouvez pas ?
            </div>
            <h3>Information personnelle</h3>
            <br>

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Prénom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Paul">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Nom:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="Fontaine">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Numéro de téléphone:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="06 69 32 11 05">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="gland@gmail.com">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Nom d'utilisateur:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" value="LeVeloute">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Nouveau mot de passe:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Retaper le mot de passe:</label>
                    <div class="col-md-8">
                        <input class="form-control" type="password" value="11111122333">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label"></label>
                    <div class="col-md-8">
                        <input type="button" class="btn btn-primary" value="Sauvegarder" data-toggle="modal" data-target="#exampleModal">
                        <span></span>
                        <input type="reset" class="btn btn-default" value="Annuler">
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