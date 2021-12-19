@extends('layouts.manager_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>   
             @if($games->game_status == 1)
            <div class="pull-right">
                <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#confirm{{$games->id}}">Cancel</button>
            </div>


            <form id="{{$games->id}}" action="/playergame/delete/{{ $games->id }}" method="DELETE" style="display: none;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            <div class="modal fade" id="confirm{{$games->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$games->id}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="text-align: left;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Game</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    You are going to Cancel Game. Are you sure? you won't be able to revert these changes!
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Game</button>
                    <a onclick="event.preventDefault(); document.getElementById( {{$games->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                  </div>
                </div>
              </div>
            </div>


            @endif         
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Games Details @if($games->game_status == 0)<span class="pull-right">Game Cancelled</span>@endif </div>
                <div class="panel-body" style="font-size: 19px;">               
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Game Name:</div>
                        <div class="col-md-6 wcol-md-6">{{ $games->game_name}}</div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Game Description:</div>
                        <div class="col-md-6 wcol-md-6">{{ $games->game_description}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Game Date:</div>
                        <div class="col-md-6 wcol-md-6">{{ date('m-d-Y', strtotime($games->game_date)) }}</div>
                    </div>
                     <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Game Time:</div>
                        <div class="col-md-6 wcol-md-6">{{ date("g:i a", strtotime($games->start_time)) }}</div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Team Size:</div>
                        <div class="col-md-6 wcol-md-6">{{ $games->team_size}}</div>
                    </div>                    
                    
                    
                </div>                
            </div>
             @if($games->game_status == 1)<a href="{{ route('games.edit', $games->id) }}"><button type="button" class="btn btn-lg btn-info">Edit</button></a>@endif
            <div class="pull-right">
               <a href="{{ route('gamewaiting.show', $games->id) }}"><button type="button" class="btn btn-lg btn-info">Waiting List</button></a>
               
            </div>
        </div>
    </div>
    <div class="row" style="height: 10px;"></div>
</div>
<!-- Footer -->

@endsection
