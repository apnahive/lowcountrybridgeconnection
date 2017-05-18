@extends('layouts.app')

@section('content')
<header class="teacher">
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</header>
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Class Detail</div>
                <div class="panel-body" style="font-size: 19px;">               
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Class Name :</div>
                        <div class="col-md-6">{{ $classes->class_name}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Club Name :</div>
                        <div class="col-md-6">{{ $classes->club_name}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Class Description :</div>
                        <div class="col-md-6">{{ $classes->class_description}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Starts Date :</div>
                        <div class="col-md-6">{{ $classes->class_from}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">End Date :</div>
                        <div class="col-md-6">{{ $classes->class_till}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Class Size :</div>
                        <div class="col-md-6">{{ $classes->class_size}}</div>
                    </div>                    
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Payment Option :</div>
                        <div class="col-md-6">{{ $classes->payment_option}}</div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4 showdata">Flyer Web Address :</div>
                        <div class="col-md-6">{{ $classes->class_flyer_address}}</div>
                    </div>
                    
                </div>                
            </div>
            <a href="{{ route('subscriptions.store') }}"><button type="button" class="btn btn-lg btn-info">Subscribe </button></a>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Bridge Club 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
