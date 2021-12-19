<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Bridge Club</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/parsley.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <style type="text/css">
        @media (max-width: 991px) {
            .navbar-header {
                float: none;
            }
            .navbar-toggle {
                display: block;
            }
            .navbar-collapse {
                border-top: 1px solid transparent;
                box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
            }
            .navbar-collapse.collapse {
                display: none!important;
            }
            .navbar-nav {
                float: none!important;
                margin: 7.5px -15px;
            }
            .navbar-nav>li {
                float: none;
            }
            .navbar-nav>li>a {
                padding-top: 10px;
                padding-bottom: 10px;
            }

           .navbar-collapse.collapse.in {  /* NEW */
                display: block!important; 
            }
        }  
    </style>


</head>
<body style="font-family: 'Cinzel',serif!important;">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navbar-custom" style="margin-bottom: 0px;padding-bottom: 0px;padding-top: 0px;">
            <div class="container containmenu">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="fa fa-home navbar-brand" href="{{ url('/news') }}">
                        
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <!-- <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> -->
                        <ul class="nav navbar-nav navbar-right dropmenu" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                            <li class="page-scroll dropdown">
                                <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="#">Staff Login
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu menudrop1">
                                  <li><a href="/teacher/login">Teacher</a></li>
                                  <li><a href="/manager/login">Manager</a></li>
                                  <li><a href="/unitadmin/login">Unit Admin</a></li>
                                </ul>
                            </li> 
                        </ul>
                            <ul class="nav navbar-nav navbar-right mobile" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                                
                                  <li class="page-scroll"><a href="/teacher/login">Teacher</a></li>
                                  <li class="page-scroll"><a href="/manager/login">Manager</a></li>
                                  <li class="page-scroll"><a href="/unitadmin/login">Unit Admin</a></li>
                                
                            </ul>
                        @else
                            <ul class="nav navbar-nav navbar-right">
                              
                                <!-- <li class="page-scroll">
                                    <a href="{{ route('home') }}">Home</a>
                                </li> -->
                                 <li class="page-scroll">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#myModal">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                            </ul>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
       </div>
    
        
<div class="position-ref full-height">
            <header class="welcome">
                <div class="header-content">
                    <div class="header-content-inner">
                        <h1 id="homeHeading">Low Country</h1>
                        <h1 id="homeHeading">Bridge Connection</h1>
                        <h1 id="homeHeading">beaufort &amp; jasper counties SC</h1>
                        <hr style="width: 10%;">
                        <p style="text-transform: uppercase;">Quality bridge resources in the low country. Register today and enjoy useful resources about the latest bridge activities in your area. </p>
                    </div>
                </div>
            </header>
            <div class="full">
                <div class="container" style="text-align: center;">
                    <div class="img facebook">
                        <a href="https://www.facebook.com/Low-Country-Bridge-Connection-938219636278458/" target="_blank" rel="">
                            <img src="img/find-us-on-facebook.png" style="width:152px;height: 146px;margin-left: auto;margin-right: 10px;float: right;margin-top: -61px;">
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: -57px;">
                            <div class="today" style="margin-top: 45px;">
                                <h2>register Today!</h2>
                                <hr style="width: 10%;">
                                <p>The low country bridge connection is a not-for-profit website that provides relevant information to beaufort & jasper counties. Register and enjoy a variety of shared information about bridge classes, seminars, events, special games and tournaments.</p>
                            </div>
                           </div>
                    </div>

                </div>    
            </div>

            

            
                    <div class="container">
                        <div class="row" style="margin-bottom: 61px;margin-top: 61px;">
                            <div class="col-md-5">
                                <div class="panel panel-default">
                                    <div class="panel-heading heading1">Register New User Account</div>
                                    <div class="panel-body body1">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">First Name</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                                <label for="lastname" class="col-md-4 control-label">Last Name</label>

                                                <div class="col-md-6">
                                                    <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" required autofocus>

                                                    @if ($errors->has('lastname'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('lastname') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>                                           

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                                <div class="col-md-6">
                                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Register
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                        @if(Session::has('alert'))
                                        <div class="alert alert-success">
                                            {{ Session::get('alert') }}
                                            @php
                                            Session::forget('alert');
                                            @endphp
                                        </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 login">
                                <div class="panel panel-default">
                                    <div class="panel-heading heading1">Have an Account? Login Here</div>
                                    <div class="panel-body body1">
                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                                            {{ csrf_field() }}

                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Password</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" style="margin-left: -20px!important;" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-8 col-md-offset-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        Login
                                                    </button>

                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        Forgot Your Password?
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                        @if (!$errors->any())                                        
                                            @include('flash-message')
                                        @endif

                                    </div>
                                </div>
                            </div>





                        </div>
                    </div>

                    <footer class="text-center">
                        <div class="footer-below">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        Copyright © Lowcountry Bridge Connection 2017
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>

        </div>
        

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Logging Out</h4>
          </div>
          <div class="modal-body">
            <p>You have been logged out Successfully </p>
          </div>           
        </div>

      </div>
    </div>



    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->

    <script src="{{ asset('js/freelancer.js') }}"></script>
    <!-- <script src="{{ asset('js/parsley.min.js') }}"></script> -->
    <!-- Design by - Banditcodes -->
</body>
</html>


   