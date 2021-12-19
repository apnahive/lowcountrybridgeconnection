@extends('layouts.manage_app')

@section('content')


<!-- <style>
    .class_flyer_address {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
    }
</style> -->

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('classes.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Edit Class</div>
                <div class="panel-body">
                    
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('classes.update', $classes['id']) !!}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <input id="class_name" type="text" class="form-control" name="class_name" value="{{ old( 'class_name', $classes['class_name']) }}" placeholder="maximum 20 character" required autofocus>

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
                                <textarea id="class_description" type="text" class="form-control" name="class_description" rows="5"  placeholder="maximum 255 character" required autofocus>{!! $classes->class_description !!}</textarea>

                                @if ($errors->has('class_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('club') ? ' has-error' : '' }}" id="club">
                            <label for="club" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="club" name="club">
                                      <option selected>Choose...</option>
                                        @foreach ($clubs as $club) 
                                            <h1><option value="{{$club->id}}" {{ $classes['club_id'] === $club->id ? 'selected' : '' }}>{{$club->club_name}}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('club'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('club') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group{{ $errors->has('class_type') ? ' has-error' : '' }}">
                            <label for="class_type" class="col-md-4 control-label">Class Type</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="class_type" name="class_type">
                                      <option selected>{{ $classes['class_type'] }}</option>                                      
                                      <option value="Seminar">Seminar</option>
                                      <option value="New Series">New Series</option>
                                      <option value="Existing Series">Existing Series</option>
                                    </select>
                                 </div>                                  

                                @if ($errors->has('class_type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->
                        <!-- <div class="form-group{{ $errors->has('series_name') ? ' has-error' : '' }}" id="series" style="display: none;">
                            <label for="series_name" class="col-md-4 control-label">Series Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="series_name" name="series_name">
                                      <option selected>Choose...</option>
                                        @foreach ($series as $series1) 
                                            <h1><option value="{{$series1->id}}">{{$series1->name}}</h1>
                                        @endforeach                                      
                                    </select>
                                </div>
                                @if ($errors->has('series_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('series_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                        <div class="form-group{{ $errors->has('class_from') ? ' has-error' : '' }}">
                            <label for="class_from" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="class_from" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="class_from" value="{{ $classes['class_from'] }}" required autofocus>

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
                                <input id="class_till" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="class_till" value="{{ $classes['class_till'] }}">

                                @if ($errors->has('class_till'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_till') }}</strong>
                                    </span>
                                @endif
                            </div>                            
                        </div>

                        <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
                            <label for="start_time" class="col-md-4 control-label">Start Time</label>

                            <div class="col-md-6">
                                <input type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="start_time" id="start_time" class="form-control" value="{{ $classes['start_time'] }}" required autofocus>                              

                                @if ($errors->has('start_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_time') }}</strong>
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
                                    <!-- <option selected>{{ $classes['payment_option'] }}</option> -->
                                    <option value="Bring_Cash_only" {{ $classes['payment_option'] === "Bring_Cash_only" ? 'selected' : '' }}>Bring Cash only</option>
                                    <option value="Bring_Cash_or_Check"{{ $classes['payment_option'] === "Bring_Cash_or_Check" ? 'selected' : '' }}>Bring Cash or Check</option>
                                    <option value="Prepayment_required" {{ $classes['payment_option'] === "Prepayment_required" ? 'selected' : '' }}>Payment Gateway</option>
                                    <option value="Free" {{ $classes['payment_option'] === "Free" ? 'selected' : '' }}>Free</option>                                      
                                </select>

                                @if ($errors->has('payment_option'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_option') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fee_amount') ? ' has-error' : '' }}">
                            <label for="fee_amount" class="col-md-4 control-label">Fee Amount (USD)</label>

                            <div class="col-md-6">
                                <input id="fee_amount" type="text" class="form-control" name="fee_amount" value="{{ $classes['fee_amount'] }}" required autofocus>

                                @if ($errors->has('fee_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fee_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('class_flyer_address') ? ' has-error' : '' }}">
                            <label for="class_flyer_address" class="col-md-4 control-label">Flyer URL</label>

                            <div class="col-md-6">
                                @if ($flyer)
                                <div class="col-md-12" style="margin-bottom: 12px;">
                                    <a href="{{ route('classflyer', $flyer) }}" target="_blank">{{ $flyer }}</a>
                                </div>
                                <div class="col-md-12">
                                    <input id="class_flyer_address" style="visibility:hidden;" class="form-control inputfile" name="class_flyer_address" type="file">
                                    <label for="class_flyer_address" class="btn" style="border:  1px black solid;margin-top: -52px;"><span>Change Flyer</span></label>
                                </div>
                                <div class="col-md-12">
                                    <!-- <a href="{{ route('classes.flyer', $classes['id']) }}" class="btn" style="border:  1px black solid;">Delete Flyer</a> -->


                                    <button type="button" class="btn" data-toggle="modal" data-target="#confirm{{$classes->id}}" style="border:  1px black solid;">Delete</button>
                                    <!-- <form id="{{$classes->id}}" action="{{ route('classes.flyer', $classes['id']) }}" method="GET" style="display: none;">
                                    </form> -->
                                    <div class="modal fade" id="confirm{{$classes->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$classes->id}}" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="text-align: left;">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Flyer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            You are going to delete Class flyer. You won't be able to revert the changes!
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Flyer</button>
                                            <a href="{{ route('classes.flyer', $classes['id']) }}"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                </div>
                                @else
                                <div class="col-md-12">
                                    <input id="class_flyer_address" style="visibility:hidden;" class="form-control inputfile" name="class_flyer_address" type="file">
                                    <label for="class_flyer_address" class="btn" style="border:  1px black solid;margin-top: -52px;"><span>Add Flyer</span></label>
                                </div>

                                @endif
                                
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

@endsection
