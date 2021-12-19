@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;">    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="/unitadmins"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="{{ route('categories.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new cateory</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Categories</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Category Name</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="col-md-6" style="text-align: center;">Edit</div>
                            <div class="col-md-6" style="text-align: center;">Delete</div>
                        </div>
                    </div>
                    @foreach ($categories as $categorykey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->category_name }}</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div class="col-md-6" style="text-align: center;"><a href="{{ route('categories.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a></div>
                            <div class="col-md-6" style="text-align: center;"><button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#confirm{{$value->id}}">Delete</button>
                            </div>
                            <form id="{{$value->id}}" action="/categoriess/delete/{{$value->id}}" method="DELETE" style="display: none;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            </form>
                            <div class="modal fade" id="confirm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$value->id}}" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content" style="text-align: left;">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    You are going to delete Category. Are you sure? you won't be able to revert these changes!
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Category</button>
                                    <a onclick="event.preventDefault(); document.getElementById( {{$value->id}} ).submit();"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                  </div>
                                </div>
                              </div>
                            </div>
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
