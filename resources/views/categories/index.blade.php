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
        <div class="col-md-8 col-md-offset-2">
            <a href=""><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="/categories/create" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new class</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Categories</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Category Name</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3" style="text-align: center;">Edit</div>
                    </div>
                    @foreach ($categories as $categorykey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->category_name }}</div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3" style="text-align: center;"><a href="{{ route('categories.edit', $value->id) }}"><button type="button" class="btn btn-priamry">Edit</button></a></div>
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
