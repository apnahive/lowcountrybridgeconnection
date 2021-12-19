@extends('layouts.superadmin')

@section('content')
<div class="row" style="margin: 0;">
    <div class="col-lg-12 text-center">
        
    <h2>Superadmin's​ Reports</h2>
     <hr class="star-primary">       
    </div>
</div>
        

<div class="row" style="margin: 0;padding-bottom: 213px;">
    <div class="col-md-8 col-md-offset-2">
        <div class="row" style="margin: 0;">
            <div class="col-md-6"><h3>General User/Player Report</h3></div>
            <div class="col-md-6"><a class="pull-right" href="{{ route('user-report',['type'=>'xls']) }}"><button type="button" class="tn btn-lg btn-info">Download</button></a></div>
        </div>
        <div class="row" style="margin: 0;">
            <div class="col-md-6"><h3>User Workshop Report</h3></div>
            <div class="col-md-6"><a class="pull-right" href="{{ route('workshop-report',['type'=>'xls']) }}"><button type="button" class="tn btn-lg btn-info">Download</button></a></div>
        </div>
        <div class="row" style="margin: 0;">
            <div class="col-md-6"><h3>User Mailing Options Report</h3></div>
            <div class="col-md-6"><a class="pull-right" href="{{ route('mail-report',['type'=>'xls']) }}"><button type="button" class="tn btn-lg btn-info">Download</button></a></div>
        </div>
        <!-- <div class="row" style="margin: 0;">
            <div class="col-md-6"><h3>General Player Report</h3></div>
            <div class="col-md-6"><a class="pull-right" href="{{ route('excel-files',['type'=>'xls']) }}"><button type="button" class="tn btn-lg btn-info">Download</button></a></div>
        </div> -->
    </div>
</div>

        <!-- Footer -->

@endsection
