@extends('layouts.app')

@section('content')


<div class="row full1">
    <div class="mid-section1" style="text-align: center;">
        <h3 class="text-uppercase">CLubs</h3>
        <h4 class="text-uppercase">Join Club</h4>
        
    </div>
</div>
<div class="row full1">
    <div class="mid-section1">
        @foreach ($clubs as $clubkey => $value)
                    <div class="row" style="margin-top: 50px;">
                        <div class="col-md-3">
                            <h5 class="text-uppercase sport1">{{ $value->club_name }}</h5>
                        </div>
                        <div class="col-md-3"><p class="text-uppercase">{{ $value->city}}</p></div>
                        <div class="col-md-3"><p class="text-uppercase">{{ $value->club_website}}</p></div>
                        <div class="col-md-3"><a href="{!! route('club_subscription.show', $value['id']) !!}"><button type="button" class="btn btn-primary">Join Now</button></a></div>
                    </div>             
        @endforeach 
    </div>
</div>    

        







@endsection
