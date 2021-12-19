@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">            
            <div class="col-md-12"><a href="{{ route('manage_students.index') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Student to Class</button></a></div> 
            <div class="panel panel-default" style="margin-top: 60px;">
                <div class="panel-heading">Available Classes</div>
                <div class="panel-body">
                    <div class="row" style="margin-left: 20px;display: flex;">
                         
                        <div class="col-md-3 wcol-md-3">Class Name</div>
                        <div class="col-md-4 wcol-md-4">Details</div>
                        <div class="col-md-5 wcol-md-5" style="text-align: center;">                            
                            <div class="col-md-6">View</div>                             
                            <div class="col-md-6">Waiting</div>  
                            <!-- <div class="col-md-4">Cancel</div> --> 
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($classes as $classkey => $value) 
                        @if ($value->class_status)
                            <div class="row" style="margin-top: 15px;margin-left: 20px;display: flex;">
                                
                                <div class="col-md-3 wcol-md-3">{{ $value->class_name }}</div>
                                <div class="col-md-4 wcol-md-4">
                                    Starts From: {{ date('m-d-Y', strtotime($value->class_from)) }}<br>
                                    Series: {{ $value->series_name }}
                                </div>
                                <div class="col-md-5 wcol-md-5" style="text-align: center">                           
                                    <div class="col-md-6"><a href="{{ route('playerclass.show', $value->id) }}"><button type="button" class="btn btn-priamry">Enrollment</button></a></div>    
                                    <div class="col-md-6 button-top"><a href="{{ route('classwaiting.show', $value->id) }}"><button type="button" class="btn btn-priamry">Waitlist</button></a></div>
                                    <!-- <div class="col-md-4 button-top"><a href="/playerclass/delete/{{ $value->id }}"><button type="button" class="btn btn-priamry">Cancel</button></a></div> --> 
                                    
                                </div>
                            </div>
                            <hr class="mobline">
                        @endif                                            
                    @endforeach                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
