@extends('layouts.superadmin')

@section('content')



<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">            
                <div class="panel-heading">Create Tournament</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('supertournament.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('tournament_name') ? ' has-error' : '' }}">
                            <label for="tournament_name" class="col-md-4 control-label">Tournament Name</label>

                            <div class="col-md-6">
                                <input id="tournament_name" type="text" class="form-control" name="tournament_name" value="{{ old('tournament_name') }}" placeholder="maximum 455 character" required autofocus>

                                @if ($errors->has('tournament_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tournament_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('tournament_description') ? ' has-error' : '' }}">
                            <label for="tournament_description" class="col-md-4 control-label">Tournament Description</label>

                            <div class="col-md-6">
                                <textarea id="tournament_description" type="text" class="form-control" name="tournament_description" placeholder="maximum 2024 character" value="{{ old('tournament_description') }}" required autofocus></textarea>

                                @if ($errors->has('tournament_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tournament_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('tournament_flyer') ? ' has-error' : '' }}">
                            <label for="tournament_flyer" class="col-md-4 control-label">Flyer URL</label>

                            <div class="col-md-6">
                                <!-- <input id="tournament_flyer" type="text" class="form-control" name="tournament_flyer" value="{{ old('tournament_flyer') }}" required autofocus> -->
                                <input id="tournament_flyer" class="form-control" name="tournament_flyer" type="file">

                                @if ($errors->has('tournament_flyer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tournament_flyer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Tournament
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
