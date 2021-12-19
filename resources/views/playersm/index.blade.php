@extends('layouts.manager_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row" style="display: flex;">
            <div class="col-md-2 wcol-md-2"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-7 wcol-md-7"> 
            <form action="{!! route('playermanager.search') !!}" method="POST" role="search" class="search-des">
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

            <div class="col-md-3  wcol-md-3"><a href="{{ route('playermanager.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Player</button></a></div>             
            </div>
            <div class="col-md-12 search-mob" style="margin-top: 26px;"> 
            <form action="{!! route('playermanager.search') !!}" method="POST" role="search">
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
            <div class="col-md-2"><a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-7"> 
            <form action="{!! route('playermanager.search') !!}" method="POST" role="search">
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
            <div class="col-md-3"><a href="{{ route('playermanager.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new Player</button></a></div>             
            </div> -->
            
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
                    @foreach ($players as $playerkey => $value) 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <div class="col-md-4 wcol-md-4">
                            {{ $value->name }} {{ $value->lastname }}
                        </div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">
                            <div class="col-md-6" style="word-wrap: break-word;">{{ $value->email }} <br> {{ $value->acbl }} </div>
                            <div class="col-md-6" style="text-align: center;">                            
                                    <a href="{{ route('playergame.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>                            
                            </div>
                        </div>                        
                    </div>
                    <hr class="mobline">                                        
                    @endforeach
                    @foreach ($users as $userkey => $value1) 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-1">{{ $value1->id }}</div> -->
                        <div class="col-md-4 wcol-md-4">
                            {{ $value1->name }} {{ $value1->lastname }}
                        </div>
                        <div class="col-md-8 wcol-md-8" style="text-align: center">
                            <div class="col-md-6" style="word-wrap: break-word;">{{ $value1->email }} <br> {{ $value->acbl }} </div>
                            <div class="col-md-6" style="text-align: center">                            
                                    <a href="{{ route('Usermanager.add', $value1->id) }}"><button type="button" class="btn btn-priamry">Game</button></a>                            
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
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
