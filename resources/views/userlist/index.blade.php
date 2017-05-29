@extends('layouts.manage_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('teacher.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="{{ route('unitadmins.create') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new teacher</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Teachers</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Teacher Name</div>
                        <div class="col-md-3">Email</div>
                        <div class="col-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">View</div> 
                        </div>
                    </div>
                    @foreach ($teacher as $teacherkey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->name }}</div>
                        <div class="col-md-3">{{ $value->email }}</div>
                        <div class="col-md-3" style="text-align: center">
                            <div class="col-md-6"><a href=""><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6"><a href=""><button type="button" class="btn btn-priamry">View</button></a></div>                            
                            
                        </div>
                    </div>                                        
                    @endforeach 
                    
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">            
            <a href="{{ route('unitadmin.create1') }}" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new manager</button></a>
            <div class="panel panel-default" style="margin-top: 60px;">
                <div class="panel-heading">Available Managers</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Manager Name</div>
                        <div class="col-md-3">Email</div>
                        <div class="col-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">View</div> 
                        </div>
                    </div>
                    @foreach ($manager as $managerkey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->name }}</div>
                        <div class="col-md-3">{{ $value->email }}</div>
                        <div class="col-md-3" style="text-align: center">
                            <div class="col-md-6"><a href=""><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6"><a href=""><button type="button" class="btn btn-priamry">View</button></a></div>                            
                            
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
