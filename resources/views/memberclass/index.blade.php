@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="row">
            <div class="col-md-2"><a href="{{ route('teacher.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a></div>
            <div class="col-md-7"> 
            <form action="{!! route('memberclass.search') !!}" method="POST" role="search">
                {{ csrf_field() }}
                <div class="input-group">
                    <input type="text" class="form-control" name="q"
                        placeholder="Search member"> <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>
            </div>            
            </div>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Member</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-1">#</div>
                        <div class="col-md-5">
                            <div class="col-md-6">First Name</div>
                            <div class="col-md-6">Last Name</div>
                        </div>
                        <div class="col-md-3">Email</div>
                        <div class="col-md-3" style="text-align: center;">                            
                                Add to
                        </div>
                    </div>
                    @foreach ($players as $playerkey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-1">{{ $value->id }}</div>
                        <div class="col-md-5">
                            <div class="col-md-6">{{ $value->name }}</div>
                            <div class="col-md-6">{{ $value->lastname }}</div>
                        </div>
                        <div class="col-md-3">{{ $value->email }}</div>
                        <div class="col-md-3" style="text-align: center">                            
                                <a href="{{ route('memberclass.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Class</button></a>
                        </div>
                    </div>                                        
                    @endforeach                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
