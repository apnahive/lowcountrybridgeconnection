@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Add Player to Game</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('unitgame_subscription.store') !!}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="player_name" class="col-md-4 control-label">Player Name</label>
                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="player_name" name="player_name">
                                      <option selected>Choose...</option>
                                        @foreach ($players as $player) 
                                            <h1><option value="{{ $player->id }}">{{ $player->name }} {{ $player->lastname }}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>                                
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('game_name') ? ' has-error' : '' }}">
                            <label for="game_name" class="col-md-4 control-label">Game Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="game_name" name="game_name">
                                      <option selected>Choose...</option>
                                        @foreach ($games as $game) 
                                            <h1><option value="{{ $game->id }}">{{ $game->game_name }}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add to Game
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
