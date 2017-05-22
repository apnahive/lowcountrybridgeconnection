@extends('layouts.app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Classes Subscribed</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Class Name</div>
                        <div class="col-md-3">Class Starts From</div>
                        <div class="col-md-3" style="text-align: center;">                             
                            <div class="col-md-6">View</div> 
                            <div class="col-md-6">Unsubscribe</div>
                        </div>
                    </div>
                    @foreach ($class_subscription as $classkey => $subscriptions)                    
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $subscriptions->id }}</div>
                        @foreach ($classes as $classeskey => $aclass) 
                            
                                @if ($subscriptions->classroom_id === '')
                                    <div class="col-md-3"></div>

                                @elseif ($subscriptions->classroom_id === $aclass->classroom_id)
                                    <div class="col-md-3">{{ $aclass->class_name }}</div>
                                    <div class="col-md-3">{{ $aclass->class_from }}</div>
                                     <a href="">
                                            <button type="button" class="btn btn-priamry">View</button>
                                        </a>
                                        <a href="{{ route('subscription.edit', $subscriptions->id) }}">
                                            <button type="button" class="btn btn-priamry">Unsubscribe</button>
                                        </a>        

                                @endif
                        @endforeach   
                        
                       
                        <div class="col-md-3" style="text-align: center">                            
                            
                            

                            
                        </div>
                    </div>                                        
                    @endforeach 
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright © The Low Country Bridge Connection 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
