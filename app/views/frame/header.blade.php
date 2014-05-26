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
                <a class="navbar-brand visible-lg" href="#">UDSM Course Evaluation System</a>
                <a class="navbar-brand hidden-lg" href="#">UCES</a>
                </div>
                </div>
                <div class="col-lg-5 col-md-10 col-md-8 col-sm-8">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            @if(Auth::check())
                            <li class="active"><a href="{{URL::to('/user/home')}}">Home</a></li>
                            @endif
                            @if(Session::get('user_type') == 'Student')
                                <li><a href="{{URL::to('/user/coursesPage')}}">Courses</a></li>
                            @endif
                            @if(Session::get('user_type') == 'QAB Staff')
                                <li><a href="{{URL::to('/user/evaluationsPage')}}">Evaluations</a></li>
                            @endif
                            @if(Session::get('user_type') == 'Lecturer')
                                <li><a href="{{URL::to('/user/myCoursePage')}}">myCourse</a></li>
                            @endif
                            @if(Session::get('user_type') == 'Head of Department')
                                <li><a href="{{URL::to('/user/lecturersPage')}}">Lecturers</a></li>
                            @endif
<!--                            <li><a href="{{URL::to('/user/myProblemPage')}}">myProblem</a></li>-->
<!--                            <li><a href="{{URL::to('/user/problemsPage')}}">Problems</a></li>-->
                            @if(Auth::check())
                            <li><a href="#" data-toggle="dropdown" data-toggle="dropdown">{{Session::get('user_name')}}<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                                    <li><a href="{{URL::to('/user/settingsPage')}}">Account Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="{{URL::to('/user/logout')}}">Logout</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
                <div class="col-sm-2 col-lg-3 visible-lg">
                    <a class="navbar-brand" href="#"><small>Logged in as <strong>{{Session::get('user_type')}}</strong></small></a>
                </div>
            </div>   
        </div>
    
        <div class="my-jumbotron">
            <div class="row">
                <div class="col-sm-12" style="height: 495px">
                    <div class="row list-group scroll">