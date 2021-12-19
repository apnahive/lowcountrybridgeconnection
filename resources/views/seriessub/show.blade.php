@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ route('unitclass_subscription.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            

           <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Player Name</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3" style="text-align: center;">                            
                            <div class="col-md-6">Status</div> 
                            <div class="col-md-6"></div> 
                        </div>
                    </div>
                    @foreach ($class_sub as $subkey => $value)
                        @if ($value->classroom_id == $classid)
                            @if ($value->subscription_status && $value->is_member)
                                @foreach ($users as $user)
                                    @if ($value->user_id == $user->id)     
                                        <div class="row" style="margin-top: 15px;">
                                            <div class="col-md-2">{{ $user->id }}</div>
                                            <div class="col-md-3">{{ $user->name }}</div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3" style="text-align: center">
                                                <div class="col-md-6">
                                                    @if ($value->subscription_status)
                                                    <p >
                                                        Coming
                                                    </p>
                                                    @else
                                                    <p>Cancelled</p>
                                                    @endif
                                                </div>    
                                                <div class="col-md-6"></div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach 
                            @elseif ($value->subscription_status && !$value->is_member)
                                @foreach ($players as $player)
                                    @if ($value->user_id == $player->id)     
                                        <div class="row" style="margin-top: 15px;">
                                            <div class="col-md-2">{{ $player->id }}</div>
                                            <div class="col-md-3">{{ $player->name }}</div>
                                            <div class="col-md-3"></div>
                                            <div class="col-md-3" style="text-align: center">                           
                                                <div class="col-md-6">
                                                    @if ($value->subscription_status)
                                                    <p >
                                                        Coming
                                                    </p>
                                                    @else
                                                    <p>Cancelled</p>
                                                    @endif
                                                <div class="col-md-6"></div>
                                            </div>
                                        </div>
                                        </div>
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
