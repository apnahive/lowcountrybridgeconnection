@extends('layouts.unitadmin')

@section('content')



<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('unitgame.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">            
                <div class="panel-heading">Create Game</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('unitgame.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('game_name') ? ' has-error' : '' }}">
                            <label for="game_name" class="col-md-4 control-label">Game Name</label>

                            <div class="col-md-6">
                                <input id="game_name" type="text" class="form-control" name="game_name" value="{{ old('game_name') }}" placeholder="maximum 20 character" required autofocus>

                                @if ($errors->has('game_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('game_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('game_description') ? ' has-error' : '' }}">
                            <label for="game_description" class="col-md-4 control-label">Game Description</label>

                            <div class="col-md-6">
                                <textarea id="game_description" type="text" class="form-control" name="game_description" value="{{ old('game_description') }}" placeholder="maximum 255 character" required autofocus></textarea>

                                @if ($errors->has('game_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('game_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('manager_name') ? ' has-error' : '' }}">
                            <label for="manager_name" class="col-md-4 control-label">Manager Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="manager_name" name="manager_name">
                                      <option selected>Choose...</option>
                                        @foreach ($managers as $manager) 
                                            <option value="{{$manager->id}}">{{$manager->name}} --
                                            @foreach ($clubs as $club)
                                            @if ($manager->club_id == $club->id)
                                                {{ $club->club_name}}
                                            @endif
                                            @endforeach 
                                            </option>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('manager_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('manager_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('game_date') ? ' has-error' : '' }}">
                            <label for="game_date" class="col-md-4 control-label">Game Date</label>

                            <div class="col-md-6">
                                <input id="game_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="game_date" value="{{ old('game_date') }}" required autofocus>

                                @if ($errors->has('game_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('game_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                            <label for="start_time" class="col-md-4 control-label">Start Time</label>

                            <div class="col-md-6">
                                <input type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="start_time" id="start_time" class="form-control" value="" required autofocus>                              

                                @if ($errors->has('start_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('team_size') ? ' has-error' : '' }}">
                            <label for="team_size" class="col-md-4 control-label">Team Size</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="team_size" name="team_size">
                                      <!-- <option disabled="true">Choose...</option> -->
                                      <option value="1">Single</option>
                                      <option value="2">Two-Person</option>
                                      <option value="4">Four-Person</option>
                                    </select>
                                 </div>                                  

                                @if ($errors->has('team_size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('team_size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('max_enroll') ? ' has-error' : '' }}">
                            <label for="max_enroll" class="col-md-4 control-label">Maximum Enrollment</label>

                            <div class="col-md-6">
                                <input id="max_enroll" type="text" class="form-control" name="max_enroll" value="{{ old('max_enroll') }}" required autofocus>

                                @if ($errors->has('max_enroll'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('max_enroll') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>                       

                       <!-- <div class="form-group{{ $errors->has('tournament') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"></label>

                            <div class="checkbox checkbox-inline" style="margin-left: 15px;">
                                <input type="hidden" name="tournament" value="false">
                                <input type="checkbox" id="tournament" name="tournament" value="true" style="margin-left: 0;">
                                <label for="tournament">It is a tournament.</label>


                                @if ($errors->has('tournament'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tournament') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        

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

@endsection
