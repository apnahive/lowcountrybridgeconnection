@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('series.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Add Classes to Series</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="GET" action="{!! route('series_class.save', $classes['id']) !!}">
                        <!-- <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->


                        <div class="form-group">
                            <label for="player_name" class="col-md-4 control-label">class Name</label>
                            <div class="col-md-6">
                                <label for="player_name" class="control-label"> {{ $classes->class_name }} </label>
                            </div>
                        </div>
                        <input type="hidden" name="class_name" value="{{ $classes->classroom_id }}">
                        <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">
                            <label for="series_name" class="col-md-4 control-label">Series Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="series_name" name="series_name">
                                      <option selected>Choose...</option>
                                        @foreach ($series as $serieskey => $value) 
                                            <h1><option value="{{$value->id}}">{{$value->name}}</h1>
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
                      
                        


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add to series
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
