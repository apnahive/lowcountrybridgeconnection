@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Class</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('classes.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('class_name') ? ' has-error' : '' }}">
                            <label for="class_name" class="col-md-4 control-label">Class Name</label>

                            <div class="col-md-6">
                                <input id="class_name" type="text" class="form-control" name="class_name" value="{{ old('class_name') }}" required autofocus>

                                @if ($errors->has('class_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('class_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('club_name') ? ' has-error' : '' }}">
                            <label for="club_name" class="col-md-4 control-label">Club Name</label>

                            <div class="col-md-6">
                                <input id="club_name" type="text" class="form-control" name="club_name" value="{{ old('club_name') }}" required autofocus>

                                @if ($errors->has('club_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('club_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('from_date') ? ' has-error' : '' }}">
                            <label for="from_date" class="col-md-4 control-label">From Date</label>

                            <div class="col-md-6">
                                <input id="from_date" type="date" class="form-control" name="from_date" value="{{ old('from_date') }}" required autofocus>

                                @if ($errors->has('from_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('from_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('till_date') ? ' has-error' : '' }}">
                            <label for="till_date" class="col-md-4 control-label">Till Date</label>

                            <div class="col-md-6">
                                <input id="till_date" type="date" class="form-control" name="till_date" value="{{ old('till_date') }}" required autofocus>

                                @if ($errors->has('till_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('till_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('class_size') ? ' has-error' : '' }}">
                            <label for="class_size" class="col-md-4 control-label">Maximum Student Allowed</label>

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
                                <input id="payment_option" type="text" class="form-control" name="payment_option" value="{{ old('payment_option') }}" required autofocus>

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
                                <input id="class_flyer_address" type="text" class="form-control" name="class_flyer_address" value="{{ old('payment_option') }}" required autofocus>

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
@endsection
