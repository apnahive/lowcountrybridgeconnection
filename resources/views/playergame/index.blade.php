@extends('layouts.manager_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">            
            <div class="row">
            <a href="{{ route('playermanager.index') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Player to Game</button></a></div>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Games</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 20px;display: flex;">
                        <!-- <div class="col-md-2">#</div> -->
                        <div class="col-md-3 wcol-md-3">Game Name</div>
                        <div class="col-md-4 wcol-md-4">Details</div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center;">                            
                            <div class="col-md-6">View</div> 
                            <div class="col-md-6">Waiting</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($games as $gamekey => $value)
                        @if ($value->game_status)
                            <div class="row" style="margin-top: 15px;margin-left: 20px;display: flex;">
                                <!-- <div class="col-md-2">{{ $value->id }}</div> -->
                                <div class="col-md-3 wcol-md-3">{{ $value->game_name }}</div>
                                <div class="col-md-4 wcol-md-4">
                                    Starts From: {{ date('m-d-Y', strtotime($value->game_date)) }} <br>
                                    Status: @if($value->game_status == 0) Cancelled @else Active @endif
                                </div>
                                <div class="col-md-5 wcol-md-5" style="text-align: center">                           
                                    <div class="col-md-6"><a href="{{ route('playergame.show', $value->id) }}"><button type="button" class="btn btn-priamry">Enrollment</button></a></div>    

                                    <div class="col-md-6 button-top"><a href="{{ route('gamewaiting.show', $value->id) }}"><button type="button" class="btn btn-priamry">Waitlist</button></a></div>

                                    <!-- <div class="col-md-4 button-top"><a href="/playergame/delete/{{ $value->id }}"><button type="button" class="btn btn-priamry">Cancel</button></a></div> -->
                                    
                                </div>
                            </div>
                            <hr class="mobline">
                        @endif                                            
                    @endforeach                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
