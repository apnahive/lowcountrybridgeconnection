@extends('layouts.unitadmin')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row" style="margin-top: 65px;margin-bottom: 65px;">
<div class="col-md-12"  style="text-align: center;">
            <a href="{{ route('blank-template',['type'=>'xls']) }}"><button type="button" class="btn btn-lg btn-info">Download Template</button></a></div>
<div class="col-md-12">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('import-csv-excels') }}" accept-charset="UTF-8" enctype="multipart/form-data">
                        {{ csrf_field() }}
               <div class="row" style="margin-top: 10px;">
                   <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="sample_file" class="col-md-3">Select File to Import:</label>
                            <div class="col-md-9">
                            <input class="form-control" name="sample_file" type="file" id="sample_file">
                            
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="margin-top: 10px;">
                    <input class="btn btn-primary" type="submit" value="Upload">
                    </div>
                </div>
            </form>
</div>            
            </div>
        </div>
    </div>
</div>
<!-- Footer -->

@endsection
