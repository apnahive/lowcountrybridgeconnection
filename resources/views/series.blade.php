@extends('layouts.app')

@section('content')


<div class="row full1">
    <div class="mid-section">
        <div class="col-md-12"><img src="/img/series.png" style="margin-top: 22px;margin-left: -30px;width: 100%;"></div>
        <div class="col-md-12" style="margin-top: 72px;border: 1px black solid;text-align: left;">
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Series Name</div>
                <div class="col-md-8 table-space left-table">{{ $series->name }}</div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Description</div>
                <div class="col-md-8 table-space left-table">{{ $series->description }}</div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Starts Date</div>
                <div class="col-md-8 table-space left-table">{{ date('m-d-Y', strtotime($series->start_date)) }}</div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">End Date</div>
                <div class="col-md-8 table-space left-table">
                    @if($series->end_date == 'N/A')
                    {{ $series->end_date }}
                    @else
                    {{ date('m-d-Y', strtotime($series->end_date)) }}
                    @endif
                </div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Starts Time</div>
                <div class="col-md-8 table-space left-table">{{ date("g:i a", strtotime($series->start_time)) }}</div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Series Size</div>
                <div class="col-md-8 table-space left-table">{{ $series->class_size }}</div>
            </div>
            <div class="row bottom-table">
                <div class="col-md-4 table-space" style="font-weight: 600;">Payment Option</div>
                <div class="col-md-8 table-space left-table">{{ $series->payment_option }}</div>
            </div>
            <div class="row">
                <div class="col-md-4 table-space" style="font-weight: 600;">Price (USD)</div>
                <div class="col-md-8 table-space left-table">{{ $series->fee_amount}}</div>
            </div>
        </div>

        <div class="col-md-12 buttonbox1" style="margin-top: 72px;margin-bottom: 72px;">
            <div class="col-md-4 listclass button-top" style="text-align: left;">
                <a href="{{ URL::previous() }}">
                    <button class="btn btn-primary silver">Back</button>
                </a>
            </div>
            <div class="col-md-4 listclass button-top" style="text-align: center;">
                @if ($flyer)
                <a href="{{ route('seriesflyer', $flyer) }}" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a>
                @endif
                <!-- <a href="{{ $series->series_flyer }}" target="_blank">
                    <button class="btn btn-primary silver">View Flyer</button>
                </a> -->
            </div>
            <div class="col-md-4 listclass button-top" style="text-align: right;">
                <a href="{!! route('seriesbook', $series['id']) !!}">
                    <button class="btn btn-primary silver">Enroll Now</button>
                </a>
            </div>
        </div>
    </div>
</div>
    <!-- Header -->
       
        <!-- Portfolio Grid Section -->
        <!-- <div class="row full1">
            <div class="mid-section">
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
                <div class="col-md-6"><h3 class="text-uppercase" style="font-size: 17px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">local bridge classes & seminar information</h3></div>
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

            </div>
        </div>
        <div class="row full1">
            <div class="mid-section">
                <h3 class="text-uppercase" style="font-size: 17px; margin-top: 32px; font-weight: 400;">bridge is a fascinating game...........check out our current offerings.</h3>
                <hr style="border-top: 1px solid rgb(35, 34, 34);width: 50%;">
            </div>
        </div> -->
        @if(count($classes) > 0)
        <div class="row full1" style="margin-bottom: 50px;">
            <div class="mid-section">
                <div class="col-md-12"><img src="/img/enroll.png" style="width: 100%;margin-bottom: 54px;margin-left: -30px;"></div>
                <div class="col-md-12">
                
                    <div class="row buttonbox1">
                        @foreach ($classes as $classkey => $value)
                        <div class="col-md-4 wcol-md-4 sapce1 listclass button-top">
                            <a href="{!! route('class_details.show', $value['id']) !!}"><button type="button" class="btn btn-primary silver sp">{{ $value->class_name }}</button></a>
                        </div>
                        @endforeach                        
                    </div>                    
                </div>                   
           
            </div>
        </div>
       @endif 

        

         <!-- Footer -->
        


@endsection
