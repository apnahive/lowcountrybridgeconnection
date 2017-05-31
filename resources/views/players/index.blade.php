@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('teacher.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="{{ route('players.index') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new Player</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Players</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Player Name</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3" style="text-align: center;">
                            Add to Class                             
                        </div>
                    </div>
                    @foreach ($players as $playerkey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->firstname }}</div>
                        <div class="col-md-3">{{ $value->lastname }}</div>
                        <div class="col-md-3" style="text-align: center">
                            <a href="{{ route('playerclass.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Add to Class</button></a>
                        </div>
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
