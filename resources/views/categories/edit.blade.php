@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Categories</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('categories.update', $categories['id']) !!}">
                       <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label for="category_name" class="col-md-4 control-label">Categories Name</label>

                            <div class="col-md-6">
                                <input id="category_name" type="text" class="form-control" name="category_name" value="{{ old( 'category_name', $categories['category_name']) }}" required autofocus>

                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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
