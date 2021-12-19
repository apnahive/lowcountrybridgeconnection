@extends('layouts.manage_app')

@section('content')


<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('classes.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
                       
            <div class="panel panel-default" style="margin-top: 30px;">            
                <div class="panel-heading">Create Class</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('classes.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <input id="class_name" type="text" class="form-control" name="class_name" value="{{ old('class_name') }}" placeholder="maximum 20 character" required autofocus>

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
                                <textarea id="class_description" type="text" class="form-control" name="class_description" placeholder="maximum 255 character" value="{{ old('class_description') }}" required autofocus></textarea>

                                @if ($errors->has('class_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <!-- <div class="form-group{{ $errors->has('class_type') ? ' has-error' : '' }}">
                            <label for="class_type" class="col-md-4 control-label">Class Type</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="class_type" name="class_type">
                                      <option selected>Choose...</option>                                      
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
                        <!-- <div id="new_series" style="display: none;margin-bottom: 71px;">
                            <div class="col-md-4"></div><div class="col-md-6">
                            <button type="button" class="btn btn-priamry" data-toggle="modal" data-target="#newseries">Create new series</button></div>
                        </div> -->
                        
                        <div class="form-group{{ $errors->has('club') ? ' has-error' : '' }}" id="club">
                            <label for="club" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="club" name="club">
                                      <option selected>Choose...</option>
                                        @foreach ($clubs as $club) 
                                            <h1><option value="{{$club->id}}">{{$club->club_name}}</h1>
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

                        <div class="form-group{{ $errors->has('class_from') ? ' has-error' : '' }}">
                            <label for="class_from" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="class_from" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="class_from" value="{{ old('class_from') }}" required autofocus>

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
                                <input id="class_till" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="class_till" value="{{ old('class_till') }}">

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
                                <input type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="start_time" id="start_time" class="form-control" value="" required autofocus>                              

                                @if ($errors->has('start_time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('class_size') ? ' has-error' : '' }}">
                            <label for="class_size" class="col-md-4 control-label">Maximum Students Allowed</label>

                            <div class="col-md-6">
                                <input id="class_size" type="text" class="form-control" name="class_size" value="{{ old('class_size') }}" required autofocus>

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
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="payment_option" name="payment_option">
                                      <!-- <option selected>Choose...</option> -->
                                      <option value="Bring Cash only">Bring Cash only</option>
                                      <option value="Bring Cash or Check">Bring Cash or Check</option>
                                      <option value="Prepayment required">Payment Gateway</option>
                                      <option value="Free">Free</option>                                      
                                    </select>
                                 </div>                                  

                                @if ($errors->has('payment_option'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('payment_option') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('fee_amount') ? ' has-error' : '' }}">
                            <label for="fee_amount" class="col-md-4 control-label">Price (USD)</label>

                            <div class="col-md-6">
                                <input id="fee_amount" type="text" class="form-control" name="fee_amount" value="{{ old('fee_amount') }}" required autofocus>

                                @if ($errors->has('fee_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fee_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('class_flyer_address') ? ' has-error' : '' }}">
                            <label for="class_flyer_address" class="col-md-4 control-label">Upload Flyer</label>

                            <div class="col-md-6">
                                <input id="class_flyer_address" class="form-control" name="class_flyer_address" type="file">
                                <!-- <input id="class_flyer_address" type="text" class="form-control" name="class_flyer_address" value="{{ old('class_flyer_address') }}"> -->

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
                                    Create Class
                                </button>

                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="newseries" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="text-align: left;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Series</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('series.store') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('series_name') ? ' has-error' : '' }}">
            <label for="series_name" class="col-md-4 control-label">Series Name</label>

            <div class="col-md-6">
                <input id="series_name" type="text" class="form-control" name="series_name" value="{{ old('series_name') }}" required autofocus>

                @if ($errors->has('series_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('series_name') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            <label for="description" class="col-md-4 control-label">Description</label>

            <div class="col-md-6">
                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description') }}" required autofocus></textarea>

                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
            <label for="start_date" class="col-md-4 control-label">From Date</label>

            <div class="col-md-6">
                <input id="start_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="start_date" value="{{ old('start_date') }}" required autofocus>

                @if ($errors->has('start_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('start_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('end_date') ? ' has-error' : '' }}">
            <label for="end_date" class="col-md-4 control-label">Till Date</label>

            <div class="col-md-6">
                <input id="end_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="end_date" value="{{ old('end_date') }}" required autofocus>

                @if ($errors->has('end_date'))
                    <span class="help-block">
                        <strong>{{ $errors->first('end_date') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('start_time') ? ' has-error' : '' }}">
            <label for="start_time" class="col-md-4 control-label">Start Time</label>

            <div class="col-md-6">
                <input type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="start_time" id="start_time" class="form-control" value="" required autofocus>                              

                @if ($errors->has('start_time'))
                    <span class="help-block">
                        <strong>{{ $errors->first('start_time') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('class_size') ? ' has-error' : '' }}">
            <label for="class_size" class="col-md-4 control-label">Maximum Students Allowed</label>

            <div class="col-md-6">
                <input id="class_size" type="text" class="form-control" name="class_size" value="{{ old('class_size') }}" required autofocus>

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
                <div class="form-group" style="margin: 0;">                                    
                    <select class="custom-select form-control" id="payment_option" name="payment_option">
                      <option selected>Choose...</option>
                      <option value="Bring Cash only">Bring Cash only</option>
                      <option value="Bring Cash or Check">Bring Cash or Check</option>
                      <option value="Prepayment required">Payment Gateway</option>
                      <option value="Free">Free</option>                                      
                    </select>
                 </div>                                  

                @if ($errors->has('payment_option'))
                    <span class="help-block">
                        <strong>{{ $errors->first('payment_option') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <div class="form-group{{ $errors->has('series_flyer') ? ' has-error' : '' }}">
            <label for="series_flyer" class="col-md-4 control-label">Flyer URL</label>

            <div class="col-md-6">

                <input id="series_flyer" type="text" class="form-control" name="series_flyer" value="{{ old('series_flyer') }}" required autofocus>

                @if ($errors->has('series_flyer'))
                    <span class="help-block">
                        <strong>{{ $errors->first('series_flyer') }}</strong>
                    </span>
                @endif
            </div>
        </div>
        <!-- <div class="form-group{{ $errors->has('fee_amount') ? ' has-error' : '' }}">
            <label for="fee_amount" class="col-md-4 control-label">Fee Amount</label>

            <div class="col-md-6">
                <input id="fee_amount" type="text" class="form-control" name="fee_amount" value="{{ old('fee_amount') }}" required autofocus>

                @if ($errors->has('fee_amount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('fee_amount') }}</strong>
                    </span>
                @endif
            </div>
        </div> -->
        
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Add Series
                </button>

                
            </div>
        </div>
    </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Footer -->

@endsection
