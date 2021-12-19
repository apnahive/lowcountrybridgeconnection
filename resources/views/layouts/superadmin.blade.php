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
    
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top navbar-custom" style="padding-bottom: 0px;padding-top: 0px;">
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
                    <a class="fa fa-home navbar-brand" href="{{ url('/superadmins') }}">
                    
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
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <ul class="nav navbar-nav navbar-right dropmenu" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                              <li class="hidden">
                                    <a href="#page-top"></a>
                                </li>  
                                <li class="page-scroll dropdown">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="">Classes & Games
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu menudrop1">  
                                      <li><a href="{{ route('superclass.index') }}">Manage Classes</a></li>
                                      <li><a href="{{ route('superseries.index') }}">Manage Series</a></li>                                      
                                      <li><a href="{{ route('supertournament.index') }}">Manage tournaments</a></li>
                                      <li><a href="{{ route('superspecialgame.index') }}">Manage Special Games</a></li>
                                      <li><a href="{{ route('supergame.index') }}">Manage Games</a></li>
                                    </ul>
                                </li>
                                <li class="page-scroll dropdown">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="">Enrollments
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu menudrop1">
                                      <li><a href="{{ route('superclass_subscription.index') }}">For Classes</a></li>
                                      <li><a href="{{ route('supergame_subscription.index') }}">For Games</a></li>
                                    </ul>
                                </li>
                                <li class="page-scroll dropdown">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="">Manage Users
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu menudrop1">
                                      <!-- <li><a href="{{ route('member.index') }}">Registered Users</a></li> -->
                                      <li><a href="{{ route('superplayers.index') }}">Manage Students/Players</a></li>
                                      <li><a href="{{ route('superteacher.index') }}">Manage Teachers</a></li>
                                      <li><a href="{{ route('supermanager.index') }}">Manage Managers</a></li>
                                      <li><a href="{{ route('superunit.index') }}">Manage Unitadmins</a></li>
                                    </ul>
                                </li>
                                <li class="page-scroll"><a href="{{ route('superplayers.show', 'upload-record') }}">File Upload</a></li>
                                <li class="page-scroll"><a href="{{ route('superadmins.show', 'reports') }}">Reports</a></li>
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

                            <ul class="nav navbar-nav navbar-right mobile" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                                
                                <li class="page-scroll">
                                    <a href="{{ route('superclass.index') }}">Manage Classes</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('superseries.index') }}">Manage Series</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('supertournament.index') }}">Manage tournaments</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('superspecialgame.index') }}">Manage Special Games</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('supergame.index') }}">Manage Games</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('superclass_subscription.index') }}">Enrollments For Classes</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('supergame_subscription.index') }}">Enrollments For Games</a>
                                </li>
                                <!-- <li class="page-scroll">
                                    <a href="{{ route('member.index') }}">Registered Users</a>
                                </li> -->
                                <li class="page-scroll">
                                    <a href="{{ route('superplayers.index') }}">Manage Students/Players</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('superteacher.index') }}">Manage Teachers</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('supermanager.index') }}">Manage Managers</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="{{ route('superunit.index') }}">Manage Unitadmins</a>
                                </li>
                                <li class="page-scroll"><a href="{{ route('superplayers.show', 'upload-record') }}">File Upload</a></li>
                                <li class="page-scroll"><a href="{{ route('superadmins.show', 'reports') }}">Reports</a></li>
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
        @include('flash-message')       
        @yield('content')
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
    <script src="{{ asset('js/custom-file-input.js') }}"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->

    <script src="{{ asset('js/freelancer.js') }}"></script>
<!--     <script src="{{ asset('js/parsley.min.js') }}"></script> -->
</body>
</html>
