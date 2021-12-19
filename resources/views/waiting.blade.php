@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ route('profile') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            

           <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">You are on the waiting list for the following classes:</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Class Name</div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                            
                            <div class="col-md-6"></div> 
                            <div class="col-md-6"></div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($classes as $class)                        
                            <div class="row" style="margin-top: 15px;display: flex;">
                                <!-- <div class="col-md-2 wcol-md-2"></div> -->
                                <div class="col-md-5 wcol-md-5">{{ $class->class_name }}</div>
                                <div class="col-md-3 wcol-md-3"></div>
                                <div class="col-md-3 wcol-md-3" style="text-align: center">
                                    <div class="col-md-6">
                                    </div>    
                                    <div class="col-md-6"></div>
                                </div>
                            </div> 
                            <hr class="mobline">                       
                    @endforeach         
                    
                </div>
            </div>

            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">You are on the waiting list for the following games:</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Game Name</div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                            
                            <div class="col-md-6"></div> 
                            <div class="col-md-6"></div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    
                    @foreach ($games as $game)                        
                            <div class="row" style="margin-top: 15px;display: flex;">
                                <!-- <div class="col-md-2 wcol-md-2"></div> -->
                                <div class="col-md-5 wcol-md-5">{{ $game->game_name }}</div>
                                <div class="col-md-3 wcol-md-3"></div>
                                <div class="col-md-3 wcol-md-3" style="text-align: center">
                                    <div class="col-md-6">
                                    </div>    
                                    <div class="col-md-6"></div>
                                </div>
                            </div>
                            <hr class="mobline">                        
                    @endforeach         
                    
                </div>
            </div>


        </div>
    </div>
</div>
</div>
<!-- Footer -->

@endsection
