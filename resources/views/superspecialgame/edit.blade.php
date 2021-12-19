@extends('layouts.superadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Edit Special Game</div>
                <div class="panel-body">
               
                     <form class="form-horizontal" role="form" method="POST" action="{!! route('superspecialgame.update', $game['id']) !!}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       
                        <div class="form-group{{ $errors->has('special_game') ? ' has-error' : '' }}">
                            <label for="special_game" class="col-md-4 control-label">Special Game</label>

                            <div class="col-md-6">
                                <textarea id="special_game" type="text" class="form-control" name="special_game" value="{{ old('special_game') }}" required autofocus>{!! $game->description !!}</textarea>

                                @if ($errors->has('special_game'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('special_game') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
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
