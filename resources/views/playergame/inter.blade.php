@extends('layouts.manager_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row" style="margin-top: 65px;margin-bottom: 65px;">
<div class="col-md-6"><p>*Registered Players have website account</p>
            <a href="{{ route('playergame.create1') }}"><button type="button" class="btn btn-lg btn-info">Add Registered Player to Game </button></a></div>
<div class="col-md-6"><p class="pull-right">*Unregistered Players DO NOT have website account</p>
            <a href="{{ route('playergame.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Unregistered Player to Game</button></a>
</div>            
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
