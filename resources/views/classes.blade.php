@extends('layouts.app')

@section('content')

    <!-- Header -->
       
        <!-- Portfolio Grid Section -->
        <div class="row full1">
            <div class="mid-section">
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
                <div class="col-md-6"><h3 class="text-uppercase" style="font-size: 17px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">local bridge classes & seminar information</h3></div>
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

            </div>
        </div>




        <div class="row full1">
            <div class="mid-section">
                @foreach ($data as $key => $value)
                   @if(count($value->clubs) > 0)                        
                        <div class="col-md-12"><img src="img/{{ $value->name }}-classes.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
                        @foreach ($value->clubs as $clubkey => $club)
                            @if(count($club->classes) > 0 || count($club->series) > 0) 
                            <div class="col-md-12"><h3>{{ $club->club_name }}</h3></div>
                            <div class="col-md-12">
                                @foreach ($club->classes as $clubkey => $class)
                                <a href="{!! route('class_details.show', $class['id']) !!}" style="margin-right: 24px;"><button type="button" class="btn btn-primary outline" style="margin-bottom: 34px;margin-top: 21px;width: 170px;white-space: normal!important;height: 68px;">{{ $class->class_name }}</button></a>
                                @endforeach

                                @foreach ($club->series as $clubkey => $series1)
                                <a href="{!! route('serieslist', $series1['id']) !!}" style="margin-right: 24px;"><button type="button" class="btn btn-primary outline" style="margin-bottom: 34px;margin-top: 21px;width: 170px;white-space: normal!important;height: 68px;">{{ $series1->name }}</button></a>
                                @endforeach
                            </div>
                            <hr style="border-top: 1px solid rgb(35, 34, 34);width: 50%;">
                            @endif
                        @endforeach
                    @endif
                @endforeach 

                
                
            </div>
        </div>



        
        

         <!-- Footer -->
        


@endsection
