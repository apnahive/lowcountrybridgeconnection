@extends('layouts.superadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Player to Game</button></a>
            <div class="panel panel-default" style="margin-top: 60px;">
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
                                    <div class="col-md-6"><a href="{{ route('supergame_subscription.show', $value->id) }}"><button type="button" class="btn btn-priamry">Enrollment</button></a></div>    
                                    <div class="col-md-6"><a href="{{ route('supergamewaiting.show', $value->id) }}"><button type="button" class="btn btn-priamry">waitlist</button></a></div>

                                    <!-- <div class="col-md-4"><a href="/supergame_subscription/delete/{{ $value->id }}"><button type="button" class="btn btn-priamry">Cancel</button></a></div> -->

                                </div>
                            </div>
                        @endif                                            
                    @endforeach                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
