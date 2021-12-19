@extends('layouts.manage_app')

@section('content')



<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">            
                <div class="panel-heading">Create Student</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('manage_students.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <p style="font-weight: 800;">
                            Select Low Country Bridge Connection Emails You Wish To Send.
                        </p>
                        <div class="checkbox">
                            <input id="checkbox1" type="radio" name="mailing_options" value="A">
                            <label for="checkbox1">
                                Send All
                            </label>
                        </div>                    
                        <div class="checkbox checkbox-success">
                            <input id="checkbox3" type="radio" name="mailing_options" value="G">
                            <label for="checkbox3">
                                Special Games
                            </label>
                        </div>
                        <div class="checkbox checkbox-info">
                            <input id="checkbox4" type="radio" name="mailing_options" value="T">
                            <label for="checkbox4">
                                Tournaments
                            </label>
                        </div>
                        <div class="checkbox checkbox-warning">
                            <input id="checkbox5" type="radio" name="mailing_options" value="N">
                            <label for="checkbox5">
                                None
                            </label>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Player
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
