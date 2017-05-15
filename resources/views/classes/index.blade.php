@extends('layouts.manage_app')

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
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ URL::previous() }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="/classes/create" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new class</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Classes</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Class Name</div>
                        <div class="col-md-3">Class Starts From</div>
                        <div class="col-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">View</div> 
                        </div>
                    </div>
                    @foreach ($classes as $classkey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->class_name }}</div>
                        <div class="col-md-3">{{ $value->class_from }}</div>
                        <div class="col-md-3" style="text-align: center">
                            <div class="col-md-6"><a href="{{ route('classes.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6"><a href="/classes/{{ $value->id }}"><button type="button" class="btn btn-priamry">Veiw</button></a></div>                            
                            
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
                    Copyright &copy; Bridge Club 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
