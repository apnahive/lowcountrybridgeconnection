@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Games Subscribed</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Game Name</div>
                        <div class="col-md-3">Game Date</div>
                        <div class="col-md-3" style="text-align: center;">                             
                            <div class="col-md-6">Status</div> 
                            <div class="col-md-6">Action</div>
                        </div>
                    </div>
                    @foreach ($game_subscription as $gamekey => $subscriptions)                    
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $subscriptions->id }}</div>
                        @foreach ($games as $gameskey => $agame) 
                            
                                @if ($subscriptions->game_id === '')
                                    <div class="col-md-3"></div>

                                @elseif ($subscriptions->game_id === $agame->game_id)
                                    <div class="col-md-3">{{ $agame->game_name }}</div>
                                    <div class="col-md-3">{{ $agame->game_date }}</div>
                                    <div class="col-md-3" style="text-align: center">
                                        <div class="col-md-6">
                                        @if ($subscriptions->subscription_status)
                                        <p >
                                            Upcoming
                                        </p>
                                        @else
                                        <p>Cancelled</p>
                                        @endif
                                        </div>     
                                        <div class="col-md-6">                       
                                        @if ($subscriptions->subscription_status)
                                        <a href="{{ route('enroll.edit', $subscriptions->id) }}">
                                            <button type="button" class="btn btn-priamry">Cancel</button>
                                        </a>
                                        @else        
                                        <a href="">
                                            <!-- <button type="button" class="btn btn-priamry"></button> -->
                                        </a>
                                        @endif 
                                        </div> 
                                    </div>    
                                @endif
                        @endforeach                        
                    </div>                                        
                    @endforeach 
                    
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
                    Copyright © The Low Country Bridge Connection 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
