@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1"> <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>           
            <a href="{{ route('unitadmin.create1') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Manager</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Managers</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-1">#</div> -->
                        <div class="col-md-3 wcol-md-3">Manager Name</div>
                        <div class="col-md-3 wcol-md-3">Email</div>
                        <div class="col-md-3 wcol-md-3">Club</div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">Delete</div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($manager as $managerkey => $value) 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-1">{{ $value->id }}</div> -->
                        <div class="col-md-3 wcol-md-3">{{ $value->name }}</div>
                        <div class="col-md-3 wcol-md-3" style="word-wrap: break-word;">{{ $value->email }}</div>
                        <div class="col-md-3 wcol-md-3">
                            @foreach ($clubs as $clubkey => $club)
                                @if($club->id == $value->club_id)
                                    {{ $club->club_name }} 
                                @endif    
                            @endforeach
                        </div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center">
                            <div class="col-md-6"><a href="{{ route('unitmanager.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6 button-top" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$value->id}}">Delete</button></div>
                            <form id="{{$value->id}}" action="/unitmanager/delete/{{$value->id}}" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Manager</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  @if($value->active == 1)                                  
                                  <div class="modal-body">
                                    You are going to delete Manager. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Manager</button>
                                    <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
                                   @else
                                  <div class="modal-body">
                                    This manager has games. Please re-asign or delete them to delete this manager.
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                  </div>
                                  @endif

                                  
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
