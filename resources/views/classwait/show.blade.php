@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 30px;">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <a href="{{ route('classes.show', $id) }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">View Class</button></a>
           <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Members</div>
                <div class="panel-body">
                    <div class="row" style="display: flex;">
                        <!-- <div class="col-md-2 wcol-md-2">#</div> -->
                        <div class="col-md-5 wcol-md-5">Member Name</div>
                        <div class="col-md-3 wcol-md-3"></div>
                        <div class="col-md-3 wcol-md-3" style="text-align: center;">                            
                            <div class="col-md-6">Action</div> 
                            <div class="col-md-6"></div> 
                        </div>
                    </div>
                    <hr class="mobline">
                    @if(count($waiting) > 0)
                    @foreach ($waiting as $wait => $value)
                        @foreach ($users as $user)
                            @if($user->id == $value->user_id)                                
                                <div class="row" style="margin-top: 15px;display: flex;">
                                    <!-- <div class="col-md-2 wcol-md-2">{{ $user->id }}</div> -->
                                    <div class="col-md-5 wcol-md-5">{{ $user->name }}</div>
                                    <div class="col-md-3 wcol-md-3"></div>
                                    <div class="col-md-3 wcol-md-3" style="text-align: center">
                                        <div class="col-md-6">
                                           <a href="{{ route('classwaiting.edit', $value) }}"><button type="button" class="btn btn-priamry">Send Mail</button></a>
                                        </div>    
                                        <div class="col-md-6"></div>
                                    </div>
                                </div>
                                <hr class="mobline">
                            @endif
                        @endforeach         
                    @endforeach
                    @else
                        <br>
                        <div style="text-align: center;">no records to show</div>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Footer -->

@endsection
