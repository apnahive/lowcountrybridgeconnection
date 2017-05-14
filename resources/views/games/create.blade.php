@extends('layouts.app')

@section('content')

<header class="teacher">
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</header>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/games"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">            
                <div class="panel-heading">Create Game</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('games.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('game_name') ? ' has-error' : '' }}">
                            <label for="game_name" class="col-md-4 control-label">Game Name</label>

                            <div class="col-md-6">
                                <input id="game_name" type="text" class="form-control" name="game_name" value="{{ old('game_name') }}" required autofocus>

                                @if ($errors->has('game_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('game_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('game_description') ? ' has-error' : '' }}">
                            <label for="game_description" class="col-md-4 control-label">Class Description</label>

                            <div class="col-md-6">
                                <textarea id="game_description" type="text" class="form-control" name="game_description" value="{{ old('game_description') }}" required autofocus></textarea>

                                @if ($errors->has('game_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('game_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('club_name') ? ' has-error' : '' }}">
                            <label for="club_name" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="club_id" name="club_id">
                                      <option selected>Choose...</option>
                                        @foreach ($clubs as $club) 
                                            <option value="{{$club->id}}">{{$club->club_name}}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('club_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('club_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('game_date') ? ' has-error' : '' }}">
                            <label for="game_date" class="col-md-4 control-label">Game Date</label>

                            <div class="col-md-6">
                                <input id="game_date" type="date" class="form-control" name="game_date" value="{{ old('game_date') }}" required autofocus>

                                @if ($errors->has('game_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('game_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('team_size') ? ' has-error' : '' }}">
                            <label for="class_size" class="col-md-4 control-label">Team Size</label>

                            <div class="col-md-6">
                                <input id="team_size" type="text" class="form-control" name="team_size" value="{{ old('team_size') }}" required autofocus>

                                @if ($errors->has('team_size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('team_size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Create Game
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
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Bridge Club 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
