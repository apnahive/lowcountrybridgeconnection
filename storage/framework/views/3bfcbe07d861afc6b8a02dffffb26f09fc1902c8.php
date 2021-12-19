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
    
    
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
     <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>;
        $(document).ready(function() {
              $('#class_type').on('change.series', function() {
                $("#series").toggle($(this).val() == 'Existing Series');
              }).trigger('change.series');
            });
         $(document).ready(function() {
              $('#class_type').on('change.news_eries', function() {
                $("#new_series").toggle($(this).val() == 'New Series');
              }).trigger('change.new_series');
            });
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
                    <a class="fa fa-home navbar-brand" href="<?php echo e(url('/unitadmins')); ?>">
                    
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
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
                        <?php else: ?>
                            <ul class="nav navbar-nav navbar-right dropmenu" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                              <li class="hidden">
                                    <a href="#page-top"></a>
                                </li>  
                                <li class="page-scroll dropdown">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="">Classes & Games
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu menudrop1">
                                      <li><a href="<?php echo e(route('clubs.index')); ?>">Manage Clubs</a></li>
                                      <li><a href="<?php echo e(route('unitclass.index')); ?>">Manage Classes</a></li>
                                      <li><a href="<?php echo e(route('unitseries.index')); ?>">Manage Series</a></li>                                      
                                      <li><a href="<?php echo e(route('unittournament.index')); ?>">Manage tournaments</a></li>
                                      <li><a href="<?php echo e(route('unitspecial_game.index')); ?>">Manage Special Games</a></li>
                                      <li><a href="<?php echo e(route('unitgame.index')); ?>">Manage Games</a></li>
                                    </ul>
                                </li>
                                <li class="page-scroll dropdown">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="">Enrollments
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu menudrop1">
                                      <li><a href="<?php echo e(route('unitclass_subscription.index')); ?>">For Classes</a></li>
                                      <li><a href="<?php echo e(route('unitgame_subscription.index')); ?>">For Games</a></li>
                                    </ul>
                                </li>
                                <li class="page-scroll dropdown">
                                    <a class="dropdown-toggle menudrop" data-toggle="dropdown" href="">Manage Users
                                    <span class="caret"></span></a>
                                    <ul class="dropdown-menu menudrop1">
                                      <!-- <li><a href="<?php echo e(route('member.index')); ?>">Registered Users</a></li> -->
                                      <li><a href="<?php echo e(route('playerunits.index')); ?>">Manage Students/Players</a></li>
                                      <li><a href="<?php echo e(route('userlists.index')); ?>">Manage Teachers</a></li>
                                      <li><a href="<?php echo e(route('unitmanagers.index')); ?>">Manage Managers</a></li>
                                    </ul>
                                </li>
                                <li class="page-scroll"><a href="<?php echo e(route('playerunit.show', 'upload-record')); ?>">File Upload</a></li>
                                <li class="page-scroll"><a href="<?php echo e(route('unitadmins.show', 'reports')); ?>">Reports</a></li>
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

                            <ul class="nav navbar-nav navbar-right mobile" style="border: 2px white solid;border-bottom-width: 0;border-top-width: 0;">
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('clubs.index')); ?>">Manage Clubs</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unitclass.index')); ?>">Manage Classes</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unitseries.index')); ?>">Manage Series</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unittournament.index')); ?>">Manage tournaments</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unitspecial_game.index')); ?>">Manage Special Games</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unitgame.index')); ?>">Manage Games</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unitclass_subscription.index')); ?>">Enrollments For Classes</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unitgame_subscription.index')); ?>">Enrollments For Games</a>
                                </li>
                                <!-- <li class="page-scroll">
                                    <a href="<?php echo e(route('member.index')); ?>">Registered Users</a>
                                </li> -->
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('playerunits.index')); ?>">Manage Students/Players</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('userlists.index')); ?>">Manage Teachers</a>
                                </li>
                                <li class="page-scroll">
                                    <a href="<?php echo e(route('unitmanagers.index')); ?>">Manage Managers</a>
                                </li>
                                <li class="page-scroll"><a href="<?php echo e(route('playerunit.show', 'upload-record')); ?>">File Upload</a></li>
                                <li class="page-scroll"><a href="<?php echo e(route('unitadmins.show', 'reports')); ?>">Reports</a></li>
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
    <script src="<?php echo e(asset('js/custom-file-input.js')); ?>"></script>
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->

    <script src="<?php echo e(asset('js/freelancer.js')); ?>"></script>
    <!-- <script src="<?php echo e(asset('js/parsley.min.js')); ?>"></script> -->
</body>
</html>
