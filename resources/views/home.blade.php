@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                

                
                    <p>You are logged in as <strong>USER</strong>!</p>
                    <a href="{{route('sendEmail')}}" class="btn btn-block btn-primary">Send Email</a>

                
            </div>
        </div>
    </div>
</div>
@endsection
