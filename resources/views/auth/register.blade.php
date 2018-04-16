@extends('layouts.headAndFoot')

@section('content')
<div class="container-fluid mt-5 pt-3" style="margin-bottom: 5.3rem">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}" name="registration">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Prénom</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nom</label>

                            <div class="col-md-12">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Adresse Mail</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mot de passe</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" passwordCheck="passwordCheck">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="passwordconfirm" class="col-md-12 control-label">Confirmation le mot de passe</label>

                            <div class="col-md-12">
                                <input id="passwordconfirm" type="password" class="form-control" name="passwordconfirm">
                            </div>
                        </div>

                        <div class="form-group">
                            <div id="contact_submit" class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    S'inscrire
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script src="{{ asset('js/validator.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
@endsection
