@extends('layouts.manager_app')

@section('content')

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{ route('unitmanager.index') }}"><button type="button" class="btn btn-lg btn-info">Back</button></a>            
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Edit Profile</div>
                <div class="panel-body">

                <div class="container" style="width: 100%;">
                    <div class="row" style="width: 100%;">
                        <div class="col-lg-12 bhoechie-tab-container" style="margin: 0;">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
                              <div class="list-group">
                                <a href="#" class="list-group-item active text-center">
                                  <h4 class="glyphicon glyphicon-user"></h4><br/>Change Username
                                </a>
                                <a href="#" class="list-group-item text-center">
                                  <h4 class="glyphicon glyphicon-lock"></h4><br/>Update Password
                                </a>
                               </div> 
                              </div>

                              <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                                <div class="bhoechie-tab-content active">
                                  <div class="row">
                                     <div class="col-md-10">
                                        <form class="form-horizontal" role="form" method="POST" action="{!! route('unitmanager.update', $manager->id) !!}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Manager Name</label>

                                                <div class="col-md-8">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old( 'name', $manager['name']) }}" required autofocus>

                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update
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
                                        <form class="form-horizontal" role="form" method="POST" action="{!! route('unitmanager.update', $manager->id) !!}">
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                            
                                            <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Enter Old Password</label>

                                                <div class="col-md-8">
                                                    <input id="old_password" type="password" class="form-control" name="old_password" value="" required autofocus>

                                                    @if ($errors->has('old_password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('old_password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                                <label for="new_password" class="col-md-4 control-label">New Password</label>

                                                <div class="col-md-8">
                                                    <input id="new_password" type="password" class="form-control" name="new_password" value="" required autofocus>

                                                    @if ($errors->has('new_password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('new_password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                                <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>

                                                <div class="col-md-8">
                                                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autofocus>

                                                    @if ($errors->has('password_confirmation'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Update
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
    <div class="row" style="height: 101px;"></div>
</div>
<!-- Footer -->

@endsection
