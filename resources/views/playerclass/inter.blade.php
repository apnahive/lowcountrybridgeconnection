@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row" style="margin-top: 65px;margin-bottom: 65px;">
<div class="col-md-6"><p>*Registered Students have website account</p>
            <a href="{{ route('playerclass.create1') }}"><button type="button" class="btn btn-lg btn-info">Add Registered Student to Class</button></a></div>
<div class="col-md-6"><p class="pull-right">*Unregistered Students DO NOT have website account</p>
            <a href="{{ route('playerclass.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add Unregistered Student to Class</button></a>            
</div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
