@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row" style="display: flex;">
            <div class="col-md-2 wcol-md-2"><a href="{{ route('playerunit.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-6 wcol-md-6"> 
            <form action="{!! route('playerunit.search') !!}" method="POST" role="search" class="search-des">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search players"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>

            <div class="col-md-4 wcol-md-4"><a href="{{ route('playerunit.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add New Student/Player</button></a></div>             
            </div>
            <div class="col-md-12 search-mob" style="margin-top: 26px;"> 
            <form action="{!! route('playerunit.search') !!}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search Students/Players"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>                       
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                       <!--  <div class="col-md-1"></div> -->
                        <div class="col-md-4 wcol-md-4">
                            Name
                        </div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">
                            <div class="col-md-6">Email/ACBL</div>
                            <div class="col-md-6" style="text-align: center;">                            
                                    Add to                            
                            </div>
                        </div>
                    </div>
                    <hr class="mobline">
                    @if(count($players) > 0 && count($users) > 0)
                        @foreach ($players as $playerkey => $value) 
                        <div class="row" style="margin-top: 15px;display: flex;">
                       
                            <div class="col-md-4 wcol-md-4">{{ $value->name }} {{ $value->lastname }}</div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">

                                <div class="col-md-6" style="word-wrap: break-word;">{{ $value->email }} <br> {{ $value->acbl }} </div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unitclass_subscription.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unitgame_subscription.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div> 
                                    <div class="col-md-12" style="text-align: center;margin-top: 9px!important;">
                                        <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm1{{$value->id}}">Delete</button>
                                    </div>                            
                                </div>

                                <form id="{{$value->id}}" action="/playerunits/delete/{{$value->id}}" method="DELETE" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm1{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body"> 
                                        You are going to delete Member. Are you sure? you won't be able to revert these changes!
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Member</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                            </div>
                        </div>  
                        <hr class="mobline">                                                                             
                        @endforeach
                        @foreach ($users as $userkey => $value1) 
                        <div class="row" style="margin-top: 15px;display: flex;">
                     
                            <div class="col-md-4 wcol-md-4">{{ $value1->name }} {{ $value1->lastname }}</div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">
                                <div class="col-md-6" style="word-wrap: break-word;">{{ $value1->email }} <br> {{ $value1->acbl }} </div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unituserclass.edit', $value1->id) }}"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unitusergame.edit', $value1->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div>
                                    <div class="col-md-12" style="text-align: center;margin-top: 9px!important;">
                                        <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm{{$value1->id}}">Delete</button>
                                    </div>                           
                                </div>

                                <form id="{{$value1->id}}" action="/members/delete/{{$value1->id}}" method="DELETE" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm{{$value1->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value1->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body"> 
                                        You are going to delete Member. Are you sure? you won't be able to revert these changes!
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Member</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value1->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>





                            </div>
                        </div>  
                        <hr class="mobline">                                       
                        @endforeach                  
                    @elseif (count($players) > 0)
                        @foreach ($players as $playerkey => $value) 
                        <div class="row" style="margin-top: 15px;display: flex;">
                       
                            <div class="col-md-4 wcol-md-4">{{ $value->name }} {{ $value->lastname }}</div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">

                                <div class="col-md-6" style="word-wrap: break-word;">{{ $value->email }} <br> {{ $value->acbl }} </div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unitclass_subscription.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unitgame_subscription.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div> 
                                    <div class="col-md-12" style="text-align: center;margin-top: 9px!important;">
                                        <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm1{{$value->id}}">Delete</button>
                                    </div>                            
                                </div>

                                <form id="{{$value->id}}" action="/playerunits/delete/{{$value->id}}" method="DELETE" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm1{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body"> 
                                        You are going to delete Member. Are you sure? you won't be able to revert these changes!
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Member</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>


                            </div>
                        </div>  
                        <hr class="mobline">                                                                              
                        @endforeach
                    @elseif (count($users) > 0)
                        @foreach ($users as $userkey => $value1) 
                        <div class="row" style="margin-top: 15px;display: flex;">
                     
                            <div class="col-md-4 wcol-md-4">{{ $value1->name }} {{ $value1->lastname }}</div>
                            <div class="col-md-8 wcol-md-8" style="text-align: center">
                                <div class="col-md-6" style="word-wrap: break-word;">{{ $value1->email }} <br> {{ $value1->acbl }} </div>
                                <div class="col-md-6" style="text-align: center">
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unituserclass.edit', $value1->id) }}"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                    </div>                            
                                    <div class="col-md-6 button-top" style="text-align: center">
                                        <a href="{{ route('unitusergame.edit', $value1->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>
                                    </div>
                                    <div class="col-md-12" style="text-align: center;margin-top: 9px!important;">
                                        <button type="button" class="btn btn-priamry"  data-toggle="modal" data-target="#confirm{{$value1->id}}">Delete</button>
                                    </div>                           
                                </div>

                                <form id="{{$value1->id}}" action="/members/delete/{{$value1->id}}" method="DELETE" style="display: none;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div class="modal fade" id="confirm{{$value1->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value1->id}}" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="text-align: left;">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body"> 
                                        You are going to delete Member. Are you sure? you won't be able to revert these changes!
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Member</button>
                                        <a onclick="event.preventDefault(); document.getElementById( {{$value1->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>





                            </div>
                        </div>  
                        <hr class="mobline">                                      
                        @endforeach                  
                    @else
                        <br>
                        <div style="text-align: center;">no records to show</div>
                    @endif

                </div>
            </div>
            

        </div>
    </div>
</div>
<!-- Footer -->

@endsection
