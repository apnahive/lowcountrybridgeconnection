@extends('layouts.manager_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ route('tournament.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Tournament Details</div>
                <div class="panel-body" style="font-size: 19px;">               
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Tournament:</div>
                        <div class="col-md-6 wcol-md-6">{{ $tournaments->name}}</div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Description:</div>
                        <div class="col-md-6 wcol-md-6">{{ $tournaments->description}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">View Flyer:</div>

                        @if ($flyer)
                            <div class="col-md-6 wcol-md-6"> <a href="{{ route('tournamentflyer', $flyer) }}" target="_blank">Click Here</a></div>
                        @else
                            <div class="col-md-6 wcol-md-6">No flyer</div>
                        @endif
                        <!-- <div class="col-md-6 wcol-md-6" style="word-wrap: break-word;">{{ $tournaments->flyer}}</div> -->
                    </div>
                                     
                    
                    
                </div>                
            </div>
            <a href="{{ route('tournament.edit', $tournaments->id) }}"><button type="button" class="btn btn-lg btn-info">Edit</button></a>            
        </div>
    </div>
    <div class="row" style="height: 10px;"></div>
</div>
<!-- Footer -->

@endsection
