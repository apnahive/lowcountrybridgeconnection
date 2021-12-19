@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Series</div>
                <div class="panel-body">
               
                    <form class="form-horizontal" role="form" method="POST" action="{!! route('series.update', $series['id']) !!}" enctype="multipart/form-data">
                       <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('series_name') ? ' has-error' : '' }}">
                            <label for="series_name" class="col-md-4 control-label">Series Name</label>

                            <div class="col-md-6">
                                <input id="series_name" type="text" class="form-control" name="series_name" value="{{ old('series_name', $series['name']) }}" required autofocus>

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
                                <textarea id="description" type="text" class="form-control" name="description" value="{{ old('description', $series['description']) }}" required autofocus>{!! $series->description !!}</textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('club') ? ' has-error' : '' }}" id="club">
                            <label for="club" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <div class="form-group" style="margin: 0;">                                    
                                    <select class="custom-select form-control" id="club" name="club">
                                      
                                        @foreach ($clubs as $club) 
                                            <h1><option value="{{$club->id}}" {{ $series['club_id'] === $club->id ? 'selected' : '' }}>{{$club->club_name}}</h1>
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
                        <div class="form-group{{ $errors->has('start_date') ? ' has-error' : '' }}">
                            <label for="start_date" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="start_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="start_date" value="{{ $series['start_date'] }}" required autofocus>

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
                                <input id="end_date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" class="form-control" name="end_date" value="{{ $series['end_date'] }}">

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
                                <input type="text" onfocus="(this.type='time')" onblur="(this.type='text')" name="start_time" id="start_time" class="form-control" value="{{ $series['start_time'] }}" required autofocus>                              

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
                                <input id="class_size" type="text" class="form-control" name="class_size" value="{{ $series['class_size'] }}" required autofocus>

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
                                      <!-- <option selected>{{ $series['payment_option'] }}</option> -->
                                      <option value="Bring_Cash_only" {{ $series['payment_option'] === "Bring_Cash_only" ? 'selected' : '' }}>Bring Cash only</option>
                                    <option value="Bring_Cash_or_Check"{{ $series['payment_option'] === "Bring_Cash_or_Check" ? 'selected' : '' }}>Bring Cash or Check</option>
                                    <option value="Prepayment_required" {{ $series['payment_option'] === "Prepayment_required" ? 'selected' : '' }}>Payment Gateway</option>
                                    <option value="Free" {{ $series['payment_option'] === "Free" ? 'selected' : '' }}>Free</option>                                     
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
                            <label for="fee_amount" class="col-md-4 control-label">Fee Amount</label>

                            <div class="col-md-6">
                                <input id="fee_amount" type="text" class="form-control" name="fee_amount" value="{{ old('fee_amount', $series['fee_amount']) }}" required autofocus>

                                @if ($errors->has('fee_amount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fee_amount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('series_flyer') ? ' has-error' : '' }}">
                            <label for="series_flyer" class="col-md-4 control-label">Flyer URL</label>

                            <div class="col-md-6">
                                <!-- <input id="series_flyer" type="text" class="form-control" name="series_flyer" value="{{ $series['series_flyer'] }}"> -->

                                @if ($flyer)
                                <div class="col-md-12" style="margin-bottom: 12px;">
                                    <a href="{{ route('seriesflyer', $flyer) }}" target="_blank">{{ $flyer }}</a>
                                </div>
                                <div class="col-md-12">
                                    <input id="series_flyer" style="visibility:hidden;" class="form-control inputfile" name="series_flyer" type="file">
                                    <label for="series_flyer" class="btn" style="border:  1px black solid;margin-top: -52px;"><span>Change Flyer</span></label>
                                </div>
                                <div class="col-md-12">
                                    

                                    <button type="button" class="btn" data-toggle="modal" data-target="#confirm{{$series->id}}" style="border:  1px black solid;">Delete</button>
                                    
                                    <div class="modal fade" id="confirm{{$series->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$series->id}}" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content" style="text-align: left;">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete Flyer</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            You are going to delete Series flyer. You won't be able to revert the changes!
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No, I'll keep this Flyer</button>
                                            <a href="{{ route('series.flyer', $series['id']) }}"><button type="button" class="btn btn-primary" >Yes! Delete it</button></a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>



                                </div>
                                @else
                                <div class="col-md-12">
                                    <input id="series_flyer" style="visibility:hidden;" class="form-control inputfile" name="series_flyer" type="file">
                                    <label for="series_flyer" class="btn" style="border:  1px black solid;margin-top: -52px;"><span>Add Flyer</span></label>
                                </div>

                                @endif

                                @if ($errors->has('series_flyer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('series_flyer') }}</strong>
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
