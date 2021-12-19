<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Bridge Club</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">    
    <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet">
    <!-- <link href="<?php echo e(asset('css/parsley.css')); ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <!--  <link href="https://file.myfontastic.com/L5n9XdpeNwyXo2NCa5zchX/icons.css" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta/js/bootstrap.js"></script>
    
    <!-- Scripts -->
    
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
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
                    <a class="fa fa-home navbar-brand" href="<?php echo e(url('/news')); ?>">
                        
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
                        <?php if(Auth::guest()): ?>
                            <!-- <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li> -->
                            <!-- <li class="page-scroll dropdown">
                                <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="">Staff Login
                                <span class="caret"></span></a>
                                <ul class="dropdown-menu menudrop1">
                                  <li><a href="/teacher/login">Teacher</a></li>
                                  <li><a href="/manager/login">Manager</a></li>
                                  <li><a href="/unitadmin/login">Unit Admin</a></li>
                                </ul>
                            </li> -->
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
                        <?php else: ?>
                            <ul class="nav navbar-nav navbar-right dropmenu" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                              <li class="hidden">
                                    <!-- <a href="#page-top"></a> -->
                                </li>
                                 <li class="page-scroll">
                                    <a href="<?php echo e(route('profile')); ?>">Profile</a>
                                </li> 
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('news')); ?>">Clubs</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('classlist')); ?>">CLASSES</a>
                                </li>                                
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('gamelist')); ?>">GAMES</a>
                                </li>
                                 
                                <!-- <li class="page-scroll">
                                    <a href="<?php echo e(route('profile')); ?>">PROFILE</a>
                                </li> -->
                                <li class="page-scroll">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="javascript:void(0)">Your Enrollment
                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu menudrop1">
                                    <li><a href="<?php echo e(route('seriesenroll')); ?>">Your Series Enrollment</a></li>
                                    <li><a href="<?php echo e(route('class_enrollment.index')); ?>">Your Class Enrollment</a></li>           
                                    <li><a href="<?php echo e(route('game_enrollment.index')); ?>">Your Game Enrollment</a></li>
                                    <li><a href="<?php echo e(route('waitlist')); ?>">Your waitlist</a></li>
                                  </ul>

                                    
                                </li>
                                
                               
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('contact')); ?>">Contact</a>
                                </li> <li class="page-scroll">
                                    <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#myModal">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                </li>                                 
                                <!-- <li class="page-scroll">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href=""><?php echo e(Auth::user()->name); ?>

                                  <span class="caret"></span></a>
                                  <ul class="dropdown-menu menudrop1">
                                    <li><a href="<?php echo e(route('profile')); ?>">Profile</a></li>
                                    <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#myModal">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                  </ul>
                              </li> -->

                            </ul>
                            <ul class="nav navbar-nav navbar-right mobile" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('profile')); ?>">Profile</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('news')); ?>">Clubs</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('classlist')); ?>">CLASSES</a>
                                </li>                                
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('gamelist')); ?>">GAMES</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('seriesenroll')); ?>">Your Series Enrollment</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('class_enrollment.index')); ?>">Your Class Enrollment</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('game_enrollment.index')); ?>">Your Game Enrollment</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('waitlist')); ?>">Your waitlist</a>
                                </li>                                
                                
                                
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('contact')); ?>">Contact</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="modal" data-target="#myModal">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                </li>
                            </ul>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php echo $__env->make('flash-message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>       

        <?php echo $__env->yieldContent('content'); ?>

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
        <!-- Design by - Banditcodes -->
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
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->

     <script src="<?php echo e(asset('js/freelancer.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('js/parsley.min.js')); ?>"></script> --> 
</body>
</html>
