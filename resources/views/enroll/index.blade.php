@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Games Currently Enrolled</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-4 wcol-md-4">Game Name</div>
                        <div class="col-md-4 wcol-md-4">Game Date</div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                             
                            <div class="col-md-6">Status</div> 
                            <div class="col-md-6">Action</div>
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($game_subscription as $gamekey => $subscriptions)                    
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">{{ $subscriptions->id }}</div> -->
                        @foreach ($games as $gameskey => $agame) 
                            
                                @if ($subscriptions->game_id === '')
                                    <div class="col-md-4 wcol-md-4"></div>

                                @elseif ($subscriptions->game_id === $agame->game_id)
                                    <div class="col-md-4 wcol-md-4">{{ $agame->game_name }}</div>
                                    <div class="col-md-4 wcol-md-4">{{ date('m-d-Y', strtotime($agame->game_date)) }}</div>
                                    <div class="col-md-3 wcol-md-3" style="text-align: center">
                                        <div class="col-md-6">
                                        @if ($subscriptions->subscription_status)
                                        <p >
                                            @if ($agame->game_date < $now->format("Y-m-d"))
                                             game is over
                                            @else
                                             Upcoming
                                            @endif
                                        </p> 
                                        @else
                                        <p>Cancelled</p>
                                        @endif
                                        </div>     
                                        <div class="col-md-6">                       
                                        @if ($subscriptions->subscription_status)
                                        <!-- <a href="{{ route('game_enrollment.edit', $subscriptions->id) }}"> -->
                                            <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$subscriptions->id}}">Cancel</button>
                                        <!-- </a> -->
                                        <form id="{{$subscriptions->id}}" action="{!! route('game_enrollment.edit', $subscriptions->id) !!}" method="POST" style="display: none;">
                                        <input type="hidden" name="_method" value="GET">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                        <div class="modal fade" id="confirm{{$subscriptions->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$subscriptions->id}}" aria-hidden="true">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="text-align: left;">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cancel enrollment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">
                                                You are going to cancel enrollment. Are you sure?<br> note: Manager can re-add you if you cancel
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Keep enrollment</button>
                                                <a onclick="event.preventDefault(); document.getElementById( {{$subscriptions->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! cancel it</button></a>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
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
                    <hr class="mobline">                                      
                    @endforeach 
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
