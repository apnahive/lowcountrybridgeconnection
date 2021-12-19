@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            @if($classes->class_status == 1)
            <div class="pull-right">
                <button type="button" class="btn btn-lg btn-info" data-toggle="modal" data-target="#confirm{{$classes->id}}">Cancel</button>
            </div>


            <form id="{{$classes->id}}" action="/playerclass/delete/{{ $classes->id }}" method="DELETE" style="display: none;">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
            <div class="modal fade" id="confirm{{$classes->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$classes->id}}" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content" style="text-align: left;">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Class</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    You are going to Cancel Class. Are you sure? you won't be able to revert these changes!
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Class</button>
                    <a onclick="event.preventDefault(); document.getElementById( {{$classes->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                  </div>
                </div>
              </div>
            </div>


            @endif
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Class Details @if($classes->class_status == 0)<span class="pull-right">Class Cancelled</span>@endif </div>
                <div class="panel-body" style="font-size: 19px;">               
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4  wcol-md-4 showdata">Class Name:</div>
                        <div class="col-md-6  wcol-md-6">{{ $classes->class_name}}</div>
                    </div>
                    
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Class Description:</div>
                        <div class="col-md-6 wcol-md-6">{{ $classes->class_description}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Starts Date:</div>
                        <div class="col-md-6 wcol-md-6">{{ date('m-d-Y', strtotime($classes->class_from)) }}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">End Date:</div>
                        <div class="col-md-6 wcol-md-6">
                            @if($classes->class_till == 'N/A')
                            {{ $classes->class_till }}
                            @else
                            {{ date('m-d-Y', strtotime($classes->class_till)) }}
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Starts Time</div>
                        <div class="col-md-6 wcol-md-6">{{ date("g:i a", strtotime($classes->start_time)) }}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Class Size:</div>
                        <div class="col-md-6 wcol-md-6">{{ $classes->class_size}}</div>
                    </div> 

                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata" style="word-wrap: break-word;">Enrollments Available:</div>
                        <div class="col-md-6 wcol-md-6">{{ $classes->seats_available}}</div>
                    </div> 
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Seats Booked:</div>
                        <div class="col-md-6 wcol-md-6">{{ $classes->seats_booked}}</div>
                    </div> 

                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">Payment Option:</div>
                        <div class="col-md-6 wcol-md-6">{{ $classes->payment_option}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;display: flex;">
                        <div class="col-md-4 wcol-md-4 showdata">View Flyer:</div>
                        @if ($flyer)
                            <div class="col-md-6 wcol-md-6"> <a href="{{ route('classflyer', $flyer) }}" target="_blank">Click Here</a></div>
                        @else
                            <div class="col-md-6 wcol-md-6">No flyer</div>
                        @endif
                    </div>
                    
                </div>                
            </div>
            
            @if($classes->class_status == 1)<a href="{{ route('classes.edit', $classes->id) }}"><button type="button" class="btn btn-lg btn-info">Edit</button></a>
            <div class="pull-right">@endif
                <a href="{{ route('playerclass.create') }}"><button type="button" class="btn btn-lg btn-info">Add Student</button></a>
                <a href="{{ route('classwaiting.show', $classes->id) }}"><button type="button" class="btn btn-lg btn-info">Waiting List</button></a>
                <a href="{{ route('playerclass.index') }}"><button type="button" class="btn btn-lg btn-info">Manage Enrollment</button></a>                
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
