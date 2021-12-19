@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">                       
            <a href="{{ route('unitclass_subscription.select') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Student to Class</button></a>
            <div class="panel panel-default" style="margin-top: 60px;">
                <div class="panel-heading">Available Classes</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Class Name</div>
                        <div class="col-md-3">Class Starts From</div>
                        <div class="col-md-3" style="text-align: center;">                            
                            <div class="col-md-6">View</div> 
                            <div class="col-md-6">Cancel</div> 
                        </div>
                    </div>
                    @foreach ($classes as $classkey => $value) 
                        @if ($value->class_status)
                            <div class="row" style="margin-top: 15px;">
                                <div class="col-md-2">{{ $value->id }}</div>
                                <div class="col-md-3">{{ $value->class_name }}</div>
                                <div class="col-md-3">{{ date('m-d-Y', strtotime($value->class_from)) }}</div>
                                <div class="col-md-3" style="text-align: center">                           
                                    <div class="col-md-6"><a href="{{ route('unitclass_subscription.show', $value->id) }}"><button type="button" class="btn btn-priamry">View</button></a></div>    
                                    <div class="col-md-6"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$value->id}}">Cancel</button></div>
                                    <form id="{{$value->id}}" action="/unitclass_subscriptionss/delete/{{ $value->id }}" method="DELETE" style="display: none;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    </form>
                                    <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
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
                                            <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Cancel it</button></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        @endif                                            
                    @endforeach                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
