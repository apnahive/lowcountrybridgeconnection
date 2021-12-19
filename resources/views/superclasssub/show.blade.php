@extends('layouts.superadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ route('superclass_subscription.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <a href="{{ URL::previous() }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">View Class</button></a> 

           <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Player Name</div>
                        <div class="col-md-2 wcol-md-2"></div>
                        <div class="col-md-4 wcol-md-4" style="text-align: center;">                            
                            <div class="col-md-6">Status</div> 
                            <div class="col-md-6">Cancel</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($class_sub as $subkey => $value)
                        @if ($value->classroom_id == $classid)
                            @if ($value->subscription_status && $value->is_member)
                                @foreach ($users as $user)
                                    @if ($value->user_id == $user->id)     
                                        <div class="row" style="margin-top: 15px;display: flex;">
                                            <!-- <div class="col-md-2 wcol-md-2">{{ $user->id }}</div> -->
                                            <div class="col-md-5 wcol-md-5">{{ $user->name }}</div>
                                            <div class="col-md-2 wcol-md-2"></div>
                                            <div class="col-md-4 wcol-md-4" style="text-align: center">
                                                <div class="col-md-6">
                                                    @if ($value->subscription_status)
                                                    <p >
                                                        Coming
                                                    </p>
                                                    @else
                                                    <p>Cancelled</p>
                                                    @endif
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="col-md-4 button-top"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$value->id}}">Cancel</button></div>

                                                    <form id="{{$value->id}}" action="/superclass_cancel_enrollment/delete/{{ $value->id }}" method="DELETE" style="display: none;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                    <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content" style="text-align: left;">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Cancel Enrollment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            You are going to Cancel Enrollment. Are you sure? you won't be able to revert these changes!
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Enrollment</button>
                                                            <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mobline">
                                    @endif
                                @endforeach 
                            @elseif ($value->subscription_status && !$value->is_member)
                                @foreach ($players as $player)
                                    @if ($value->user_id == $player->id)     
                                        <div class="row" style="margin-top: 15px;display: flex;">
                                            <!-- <div class="col-md-2 wcol-md-2">{{ $player->id }}</div> -->
                                            <div class="col-md-5 wcol-md-5">{{ $player->name }} {{ $player->lastname }}</div>
                                            <div class="col-md-2 wcol-md-2"></div>
                                            <div class="col-md-4 wcol-md-4" style="text-align: center">                           
                                                <div class="col-md-6">
                                                    @if ($value->subscription_status)
                                                    <p >
                                                        Coming
                                                    </p>
                                                    @else
                                                    <p>Cancelled</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-4 button-top"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$value->id}}">Cancel</button></div>

                                                    <form id="{{$value->id}}" action="/superclass_cancel_enrollment/delete/{{ $value->id }}" method="DELETE" style="display: none;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    </form>
                                                    <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content" style="text-align: left;">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Cancel Enrollment</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            You are going to Cancel Enrollment. Are you sure? you won't be able to revert these changes!
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Enrollment</button>
                                                            <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="mobline">
                                    @endif
                                @endforeach 
                            @endif
                        @endif    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer -->

@endsection
