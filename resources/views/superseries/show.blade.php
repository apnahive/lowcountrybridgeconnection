@extends('layouts.superadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">{{ $series->name }}</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                       <!--  <div class="col-md-1"></div> -->
                        <div class="col-md-5  wcol-md-5">
                            <div class="col-md-6">Class Name</div>
                            <div class="col-md-6"></div>
                        </div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-4 wcol-md-4" style="text-align: center;">Action
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($classes as $classkey => $class) 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        
                        <div class="col-md-5 wcol-md-5">
                            <div class="col-md-12">{{ $class->class_name }}</div>
                            
                        </div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-4 wcol-md-4" style="text-align: center">
                            <a href="{{ route('superclass.show', $class->id) }}"><button type="button" class="btn btn-priamry">View</button></a>
                        </div>
                    </div>              
                    <hr class="mobline">                          
                    @endforeach
                </div>            
            </div>
            
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
