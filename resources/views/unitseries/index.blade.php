@extends('layouts.unitadmin')

@section('content')


@if(Session::get('error_code'))
<script type="text/javascript">
$(function() {
    $('#popup1').modal('show');
});
</script>
@endif
<div id="popup1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Series Created</h4>
      </div>
      <div class="modal-body">
        <p>Do you wish to create class for the series.</p>
      </div> 
      <div class="modal-footer">
        <a href="{{ route('unitclass.creates', Session::get('error_code') ) }}"><button type="button" class="btn btn-primary">Yes</button></a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
      </div>           
    </div>

  </div>
</div>


<div class="container" style="margin-top: 60px;">    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="{{ route('unitseries.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a New Series</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Series</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1">#</div> -->
                        <div class="col-md-4 wcol-md-4">Series Name</div>
                        <!-- <div class="col-md-3"></div> -->
                        <div class="col-md-8 wcol-md-8" style="text-align: center;">
                            <div class="col-md-3">Add</div>
                            <div class="col-md-3">View</div>
                            <div class="col-md-3">Edit</div>
                            <div class="col-md-3">Delete</div>

                        </div>
                    </div>
                    <hr class="mobline">
                    @foreach ($series as $serieskey => $value) 
                    <div class="row" style="margin-top: 15px;display: flex;">
                        <!-- <div class="col-md-1 wcol-md-1">{{ $value->id }}</div> -->
                        <div class="col-md-4 wcol-md-4">{{ $value->name }}</div>
                        <!-- <div class="col-md-3"></div> -->
                        <div class="col-md-8 wcol-md-8" style="text-align: center;">
                            <div class="col-md-3"><a href="{{ route('unitseries_class.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Classes</button></a></div>
                            <div class="col-md-3 button-top"><a href="{{ route('unitseries.show', $value->id) }}"><button type="button" class="btn btn-priamry">Classes</button></a></div>
                            <div class="col-md-3 button-top"><a href="{{ route('unitseries.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a></div>
                            <div class="col-md-3 button-top" style="text-align: center;"> <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$value->id}}">Delete</button></div>
                            <form id="{{$value->id}}" action="/unitseriess/delete/{{$value->id}}" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Series</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete Series. All the associated records will be deleted (i.e. Series enrollment). You won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Series</button>
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
