@extends('layouts.superadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('superadmin') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="{{ route('playersuper.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Player</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Player Name</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3" style="text-align: center;">
                            <div class="col-md-6" style="text-align: center">
                                Add to                            
                            </div>
                            <div class="col-md-6" style="text-align: center">
                                Edit
                            </div>
                        </div>
                    </div>
                    @foreach ($players as $playerkey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->name }}</div>
                        <div class="col-md-3">{{ $value->lastname }}</div>
                        <div class="col-md-3" style="text-align: center">
                            <div class="col-md-6" style="text-align: center">
                                <a href="{{ route('playerclass.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Class</button></a>
                            </div>
                            <div class="col-md-6" style="text-align: center">
                                <a href="{{ route('playersuper.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a>
                            </div>
                        </div>
                    </div>                                        
                    @endforeach                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
