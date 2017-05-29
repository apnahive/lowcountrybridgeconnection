@extends('layouts.unitadmin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Unit adminn Dashboard</div>

                <div class="panel-body">

                    <div class="container" style="width:100%;">
                        <div class="row" style="width:100%;">
                            <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container" style="margin: 0;">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                                  <div class="list-group">
                                    <a href="#" class="list-group-item active text-center">
                                      <h4 class="glyphicon glyphicon-user"></h4><br/>Create Teacher
                                    </a>
                                    <a href="#" class="list-group-item text-center">
                                      <h4 class="glyphicon glyphicon-user"></h4><br/>Create Manager
                                    </a>
                                   </div> 
                                  </div>

                                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                    <div class="bhoechie-tab-content active">
                                      <div class="row">
                                         <div class="col-md-10">
                                            <form class="form-horizontal" role="form" method="POST" action="{{ route('unitadmin.store') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Teacher Name</label>

                                                    <div class="col-md-8">
                                                        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">Email</label>

                                                    <div class="col-md-8">
                                                        <input id="email" type="text" class="form-control" name="email" value="" required autofocus>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Password</label>

                                                    <div class="col-md-8">
                                                        <input id="password" type="password" class="form-control" name="password" value="" required autofocus>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-8 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Create Teacher
                                                        </button>

                                                        
                                                    </div>
                                                </div>
                                            </form>

                                         </div>
                                      </div> 
                                    </div> 

                                    <div class="bhoechie-tab-content">
                                      <div class="row">
                                        <div class="col-md-10">   
                                            <!-- Create a manager -->

                                            <form class="form-horizontal" role="form" method="POST" action="{{ route('unitadmin.store1') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label for="name" class="col-md-4 control-label">Manager Name</label>

                                                    <div class="col-md-8">
                                                        <input id="name" type="text" class="form-control" name="name" value="" required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <label for="email" class="col-md-4 control-label">Email</label>

                                                    <div class="col-md-8">
                                                        <input id="email" type="text" class="form-control" name="email" value="" required autofocus>

                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <label for="password" class="col-md-4 control-label">Password</label>

                                                    <div class="col-md-8">
                                                        <input id="password" type="password" class="form-control" name="password" value="" required autofocus>

                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-8 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Create Manager
                                                        </button>

                                                        
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                      </div>
                                    </div> 
                                  </div>     


                             </div> 
                         </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="height: 171px;"></div>
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
