@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Category Details</div>
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
            <a href="{{ route('classes.edit', $classes->id) }}"><button type="button" class="btn btn-lg btn-info">Edit</button></a>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
