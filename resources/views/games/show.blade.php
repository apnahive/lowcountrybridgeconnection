@extends('layouts.manage_app')

@section('content')
<header class="teacher">
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</header>
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Games Details</div>
                <div class="panel-body" style="font-size: 19px;">               
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Game Name :</div>
                        <div class="col-md-6">{{ $games->game_name}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Club Name :</div>
                        <div class="col-md-6"> {{ $games->club_name }} </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Game Description :</div>
                        <div class="col-md-6">{{ $games->game_description}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Game Date :</div>
                        <div class="col-md-6">{{ $games->game_date}}</div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Team Size :</div>
                        <div class="col-md-6">{{ $games->team_size}}</div>
                    </div>                    
                    
                    
                </div>                
            </div>
            <a href="{{ route('games.edit', $games->id) }}"><button type="button" class="btn btn-lg btn-info">Edit</button></a>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Bridge Club 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
