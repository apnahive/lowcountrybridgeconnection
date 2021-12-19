@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('teacher.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="/classes/create" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new class</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Classes</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Class Name</div>
                        <div class="col-md-3">Class Starts From</div>
                        <div class="col-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">View</div> 
                        </div>
                    </div>
                    @foreach ($classes as $classkey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->class_name }}</div>
                        <div class="col-md-3">{{ date('m-d-Y', strtotime($value->class_from)) }}</div>
                        <div class="col-md-3" style="text-align: center">
                            <div class="col-md-6"><a href="{{ route('classes.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6"><a href="/classes/{{ $value->id }}"><button type="button" class="btn btn-priamry">View</button></a></div>                            
                            
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
