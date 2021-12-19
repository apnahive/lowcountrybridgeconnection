@extends('layouts.superadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="{{ route('superunit.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Unitadmin</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Unitadmin</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1">#</div> -->
                        <div class="col-md-4 wcol-md-4">Unitadmin Name</div>
                        <div class="col-md-4 wcol-md-4">Email</div>
                        <!-- <div class="col-md-1 wcol-md-1"></div> -->
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">Delete</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($unitadmins as $unitadminkey => $value) 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1">{{ $value->id }}</div> -->
                        <div class="col-md-4 wcol-md-4">{{ $value->name }}</div>
                        <div class="col-md-4 wcol-md-4" style="word-wrap: break-word;">{{ $value->email }}</div>
                        <!-- <div class="col-md-1">
                            
                        </div> -->
                        <div class="col-md-3 wcol-md-3" style="text-align: center">
                            <div class="col-md-6"><a href="{{ route('superunit.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6 button-top" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$value->id}}">Delete</button></div>
                            <form id="{{$value->id}}" action="/superunit/delete/{{$value->id}}" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Unitadmin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete Unitadmin. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Unitadmin</button>
                                    <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>
                            
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
