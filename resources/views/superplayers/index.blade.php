@extends('layouts.superadmin')

@section('content')

<div class="container" style="margin-top: 60px;margin-bottom: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
            <div class="row" style="display: flex;">
            <div class="col-md-2 wcol-md-2"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-7 wcol-md-7"> 
            <form action="{!! route('superplayers.search') !!}" method="POST" role="search" class="search-des">
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

            <div class="col-md-3  wcol-md-3"><a href="{{ route('superplayers.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Player</button></a></div>             
            </div>
            <div class="col-md-12 search-mob" style="margin-top: 26px;"> 
            <form action="{!! route('superplayers.search') !!}" method="POST" role="search">
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





            <!-- <div class="row">
            <div class="col-md-2"><a href="{{ route('superadmins.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-6"> 
            <form action="{!! route('superplayers.search') !!}" method="POST" role="search">
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
            <div class="col-md-4"><a href="{{ route('superplayers.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add New Unregistered User</button></a></div>
            </div>  -->                      
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players/Students</div>
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
                    @foreach ($players as $playerkey => $value) 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-1">{{ $value->id }}</div> -->
                        <div class="col-md-4 wcol-md-4">{{ $value->name }} {{ $value->lastname }}</div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">

                            <div class="col-md-6" style="word-wrap: break-word;">{{ $value->email }} <br> {{ $value->acbl }} </div>
                            <div class="col-md-6" style="text-align: center">
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="{{ route('superclass_subscription.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                </div>                            
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="{{ route('supergame_subscription.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>
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
                            <div class="col-md-6" style="word-wrap: break-word;">{{ $value1->email }} <br> {{ $value->acbl }} </div>
                            <div class="col-md-6" style="text-align: center">
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="{{ route('superuserclass.edit', $value1->id) }}"><button type="button" class="btn btn-priamry">Series/Class</button></a>
                                </div>                            
                                <div class="col-md-6 button-top" style="text-align: center">
                                    <a href="{{ route('superusergame.edit', $value1->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>
                                </div>                            
                            </div>
                        </div>
                    </div>  
                    <hr class="mobline">                                      
                    @endforeach                  
                    
                </div>
            </div>
            <div class="col-md-12">  
                @if($players->total() > $users->total())
                    {!! $players->render() !!}
                @else
                    {!! $users->render() !!}
                @endif  
            </div>
            <a href="{{ route('user-report',['type'=>'xls']) }}"><button type="button" class="btn btn-lg btn-info">Download Report</button></a>
            <a href="{{ route('superplayers.show', 'upload-record') }}" class="pull-right" style="margin-bottom: 30px;">
            <button type="button" class="btn btn-lg btn-info">Upload Records</button></a>
            
            

        </div>
    </div>
</div>
<!-- Footer -->

@endsection
