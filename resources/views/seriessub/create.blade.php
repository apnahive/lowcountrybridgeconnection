@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Add Series to Class</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('series_class.store') !!}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="series_name" class="col-md-4 control-label">Series Name</label>
                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="series_name" name="series_name">
                                      <option selected>Choose...</option>
                                        @foreach ($series as $series1) 
                                            <h1><option value="{{$series1->id}}">{{$series1->name}}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('series_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('series_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="class_name" name="class_name">
                                      <option selected>Choose...</option>
                                        @foreach ($classes as $class) 
                                            <h1><option value="{{$class->id}}">{{$class->class_name}}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('class_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add to Series
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
