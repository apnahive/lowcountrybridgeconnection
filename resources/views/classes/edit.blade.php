@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Edit Class</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('classes.update', $classes['id']) !!}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <input id="class_name" type="text" class="form-control" name="class_name" value="{{ old( 'class_name', $classes['class_name']) }}" required autofocus>

                                @if ($errors->has('class_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('class_description') ? ' has-error' : '' }}">
                            <label for="class_description" class="col-md-4 control-label">Class Description</label>

                            <div class="col-md-6">
                                <textarea id="class_description" type="text" class="form-control" name="class_description" rows="5" required autofocus>{!! $classes->class_description !!}</textarea>

                                @if ($errors->has('class_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                            <label for="club_name" class="col-md-4 control-label">Category Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="category_name" name="category_name">
                                      <option selected>{{$classes->category_name}}</option>
                                        @foreach ($categories as $category) 
                                            <h1><option value="{{$category->category_name}}">{{$category->category_name}}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('category_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('club_name') ? ' has-error' : '' }}">
                            <label for="club_name" class="col-md-4 control-label">Club Name</label>
                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="club_name" name="club_name">
                                      <option selected>{{$classes->club_name}}</option>
                                        @foreach ($clubs as $club) 
                                            <option value="{{$club->club_name}}">{{$club->club_name}}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('club_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('club_name') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group{{ $errors->has('class_from') ? ' has-error' : '' }}">
                            <label for="class_from" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="class_from" type="date" class="form-control" name="class_from" value="{{ $classes['class_from'] }}" required autofocus>

                                @if ($errors->has('class_from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_from') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('class_till') ? ' has-error' : '' }}">
                            <label for="class_till" class="col-md-4 control-label">Till Date</label>
                            <div class="col-md-6">
                                <input id="class_till" type="date" class="form-control" name="class_till" value="{{ $classes['class_till'] }}" required autofocus>

                                @if ($errors->has('class_till'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_till') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group{{ $errors->has('class_size') ? ' has-error' : '' }}">
                            <label for="class_size" class="col-md-4 control-label">Maximum Student Allowed</label>

                            <div class="col-md-6">
                                <input id="class_size" type="text" class="form-control" name="class_size" value="{{ $classes['class_size'] }}" required autofocus>

                                @if ($errors->has('class_size'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_size') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('payment_option') ? ' has-error' : '' }}">
                            <label for="payment_option" class="col-md-4 control-label">Choose Payment Option</label>

                            <div class="col-md-6">
                                
                                <select class="custom-select form-control" id="payment_option" name="payment_option">
                                      <option selected>{{ $classes['payment_option'] }}</option>
                                      <option value="Prepayment required">Prepayment required</option>
                                      <option value="Bring Cash or Check">Bring Cash or Check</option>
                                      <option value="Full Series">Full Series</option>
                                      <option value="Individual">Individual</option>
                                    </select>

                                @if ($errors->has('payment_option'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_option') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('class_flyer_address') ? ' has-error' : '' }}">
                            <label for="class_flyer_address" class="col-md-4 control-label">Flyer URL</label>

                            <div class="col-md-6">
                                <input id="class_flyer_address" type="text" class="form-control" name="class_flyer_address" value="{{ $classes['class_flyer_address'] }}" required autofocus>

                                @if ($errors->has('class_flyer_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_flyer_address') }}</strong>
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
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright © The Low Country Bridge Connection 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
