<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from getbootstrap.com/examples/sticky-footer/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 12 Dec 2013 12:15:07 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="University of Dar es salaam Course Evaluation System">
    <meta name="author" content="UCES Team">
<!--    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">-->

    <title>Home Page</title>
    
    <!-- Derick's core CSS -->
    {{HTML::style("css/my-css.css")}}

    <!-- Bootstrap core CSS -->
    {{HTML::style("css/bootstrap.css")}}

    <!-- Custom styles for this template -->
    {{HTML::style("css/sticky-footer.css")}}
    
     <!-- Custom styles for this template -->
     {{HTML::style("css/starter-template.css")}}

</head>

<body>
    <div id="wrap">
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="row">
                <div class="col-sm-4 col-md-2 col-lg-4 col-xs-offset-1 col-lg-offset-0 col-md-offset-0 col-sm-offset-0">
                    <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                <a class="navbar-brand visible-lg" href="account">UDSM Course Evaluation System</a>
                <a class="navbar-brand hidden-lg" href="#">UCES</a>
                </div>
                </div>
                @if(Auth::check())
                <div class="col-lg-5 col-md-10 col-md-8 col-sm-8">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="{{(Session::get('location') == 'home')? 'active':''}}"><a href="{{URL::to('/user/home')}}"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                                @if(Session::get('user_type') == 'Administrator')
                                <li class="{{(Session::get('location') == 'manage')? 'active':''}}"><a href="{{URL::to('/user/managePage')}}"><i class="glyphicon glyphicon-wrench"></i> Manage</a></li>
                                @endif
                                @if(Session::get('user_type') == 'Student')
                                <li class="{{(Session::get('location') == 'courses')? 'active':''}}"><a href="{{URL::to('/user/coursesPage')}}"><i class="glyphicon glyphicon-book"></i> Courses</a></li>
                                @endif
                                @if(Session::get('user_type') == 'QAB Staff')
                                <li class="{{(Session::get('location') == 'evaluations')? 'active':''}}"><a href="{{URL::to('/user/evaluationsPage')}}"><i class="glyphicon glyphicon-tasks"></i> Evaluations</a></li>
                                <li class="{{(Session::get('location') == 'reports')? 'active':''}}"><a href="{{URL::to('/user/reportsPage')}}"><i class="glyphicon glyphicon-print"></i> Reports</a></li>
                                @endif
                                @if(Session::get('user_type') == 'Instructor')
                                <li class="{{(Session::get('location') == 'myCourse')? 'active':''}}"><a href="{{URL::to('/user/myCoursePage')}}"><i class="glyphicon glyphicon-book"></i> myCourse</a></li>
                                @endif
                                @if(Session::get('user_type') == 'Head of Department')
                                <li class="{{(Session::get('location') == 'lecturers')? 'active':''}}"><a href="{{URL::to('/user/lecturersPage')}}"><i class="glyphicon glyphicon-eye-open"></i> Lecturers</a></li>
                                @endif
<!--                            <li><a href="{{URL::to('/user/myProblemPage')}}">myProblem</a></li>-->
<!--                            <li><a href="{{URL::to('/user/problemsPage')}}">Problems</a></li>-->
                            <li><a href="#" data-toggle="dropdown" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{Session::get('user_name')}}<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a href="{{URL::to('/user/settingsPage')}}"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{URL::to('/user/logout')}}"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
                <div class="col-sm-2 col-lg-3 visible-lg">
                    <a class="navbar-brand" href="#"><small>Logged in as <strong>{{Session::get('user_type')}}</strong></small></a>
                </div>
                @endif
            </div>   
        </div>
    
        <div class="my-jumbotron">
            <div class="row">
                <div class="col-sm-12" style="height: 495px">
                    <div class="row list-group scroll">