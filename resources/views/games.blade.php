@extends('layouts.app')

@section('content')



<div class="row full1">
    <div class="mid-section">
        @if(count($tournaments) > 0)
        <div class="col-md-12"><img src="img/local.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
        <div class="col-md-12 row" style="margin-top: 58px;padding-bottom: 58px;">
            @foreach ($tournaments as $tournamentkey => $tournament)
            
            @if ($loop->iteration%2 == 0)
            <div class="col-md-6 text-right1">
                <h4 style="color: #937b22;word-wrap: break-word;">{{ $tournament->name }}</h4>
                <p style="padding-bottom: 16px;word-wrap: break-word;">{{ $tournament->description }}</p>
                @if ($tournament->flyer1)
                <a href="{{ route('tournamentflyer', $tournament->flyer1) }}" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
                @endif
                <!-- <a href="{{ $tournament->flyer }}"><button type="button" class="btn btn-primary silver">View Flyer</button></a> -->
            </div>
            <hr class="border-bottom" style="width: 100%;padding-top: 58px;">
                
            @else
            <div class="col-md-6 border-right text-left1 space-bottom">
                <h4 style="color: #937b22;word-wrap: break-word;">{{ $tournament->name }}</h4>
                <p style="padding-bottom: 16px;word-wrap: break-word;">{{ $tournament->description }}</p>
                @if ($tournament->flyer1)
                <a href="{{ route('tournamentflyer', $tournament->flyer1) }}" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
                @endif
                <!-- <a href="{{ $tournament->flyer }}"><button type="button" class="btn btn-primary silver">View Flyer</button></a> -->
            </div>
            @endif
            @endforeach 
        </div>
        @endif
        @if(count($special_games) > 0)
        <div class="col-md-12"><img src="img/special.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
        <div class="col-md-12" style="text-align: left;margin-top: 40px;margin-bottom: 40px;">
            
                @foreach ($special_games as $special_gameskey => $value)
                    <div class="row" style="padding-bottom: 12px;word-wrap: break-word;"><h4><i class="fa fa-check" style="color: #894343;"></i>&nbsp;&nbsp; {{ $value->description }}</h4></div>
                @endforeach 
                      
        </div>
         @endif  

    </div>
</div>


@if($counter === 0)
<div class="row full1">
    <div class="mid-section">
        <div class="col-md-2"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
        <div class="col-md-8"><h3 style="font-size: 20px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">LOCAL BRIDGE GAMES INFORMATION</h3></div>
        <div class="col-md-2"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

    </div>
</div>
@endif
<div class="row full1">
    <div class="mid-section">
        @foreach ($data as $key => $value)
           @if(count($value->clubs) > 0)
                <div class="col-md-12"><img src="img/{{ $value->name }}-games.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
                @foreach ($value->clubs as $clubkey => $club)
                    @if(count($club->games) > 0) 
                    <div class="col-md-12"><h3>{{ $club->club_name }}</h3></div>
                    <div class="col-md-12">
                        @foreach ($club->games as $clubkey => $game)
                        <a href="{!! route('game_details.show', $game['id']) !!}" style="margin-right: 24px;"><button type="button" class="btn btn-primary outline" style="margin-bottom: 34px;margin-top: 21px;width: 170px;white-space: normal!important;height: 68px;">{{ $game->game_name }}</button></a>
                        @endforeach
                    </div>
                    <hr style="border-top: 1px solid rgb(35, 34, 34);width: 50%;">
                    @endif
                @endforeach     
            @endif
        @endforeach 
        
    </div>
</div>









@endsection
