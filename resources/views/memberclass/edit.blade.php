@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Add Member to Class</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('memberclass.update', $players['id']) !!}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="player_name" class="col-md-4 control-label">Member Name</label>
                            <div class="col-md-6">
                                <label for="class_name" class="control-label"> {{ $players->name }} </label>
                                <label for="class_name" class="control-label"> {{ $players->lastname }} </label>
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
                                    Add to Class
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
