@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-4 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="evaluation_accordion">
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#evaluation_accordion" href="#evaluation_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Evaluation</small></strong></button>
            <div id="evaluation_collapse" class="collapse in">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-info btn-block" href="#questions" data-toggle="tab"><small><strong>Questions</strong></small></button>
                    <button class="btn btn-info btn-block" href="#Abdil" data-toggle="tab"><small><strong>Procedures</strong></small></button>
                </div>
            </div>
        </div>
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#evaluation_accordion" href="#UDSM_evaluation_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>UDSM Evaluations</small></strong></button>
            <div id="UDSM_evaluation_collapse" class="collapse">
                <!-- Side Nav tabs -->
                <div class="">
                    <?php 
                    $colleges = College::all();
                    ?>
                    @foreach($colleges as $college)
                    <button class="btn btn-info btn-block" href="#{{strtolower($college->id)}}" data-toggle="tab" title="{{$college->college_name}}"><small><strong>{{$college->id}}</strong></small></button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-8 my-scroll-body" style="height: 557px;padding-top: 10px">  
    <div class="tab-content">
        <div class="tab-pane fade in active" id="questions">
            @include('components.manageAssessmentQuestions')
        </div>
        @foreach($colleges as $college)
        <div class="tab-pane fade" id="{{strtolower($college->id)}}">
            <div class="panel-group" id="{{$college->id}}_academic_year_accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#{{$college->id}}_academic_year_accordion" href="#{{$college->id}}_academic_year_collapse">
                                <strong>2014-2015</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="{{$college->id}}_academic_year_collapse" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="panel-group" id="{{$college->id}}_college_accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a style="text-decoration: none;" data-toggle="collapse" data-parent="#{{$college->id}}_college_accordion" href="#{{$college->id}}collapseOne">
                                                <small><strong>Overall <span class="text-primary"><abbr title="{{$college->college_name}}">{{$college->id}}</abbr></span> Assessment</strong></small>
                                            </a>
                                            <div class="pull-right"><button class="btn btn-xs btn-primary">by students</button>&nbsp;<button class="btn btn-xs btn-warning">by lectures</button></div>
                                        </h4>
                                    </div>
                                    <div id="{{$college->id}}collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body ">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                <li class="active"><a href="#IS333Week4" data-toggle="tab">Week 6</a></li>
                                                <li><a href="#IS333Week8" data-toggle="tab">Week 10</a></li>
                                                <li><a href="#IS333Week12" data-toggle="tab">Week 14</a></li>
                                                <li><a href="#IS333Week16" data-toggle="tab">Overall</a></li>
                                                <li class="pull-right" style="text-decoration: none;"><strong class="text-primary">{{$college->college_name}}</strong></li>
                                            </ul>

                                            <!-- Tab panes -->
                                            <div class="tab-content ">
                                                <div class="tab-pane fade in active" id="IS333Week4" style="padding-top: 5px">
                                                    <div class="alert alert-success">
                                                        <small>Your Assessment Results done by your <abbr title="IS 333 Class">Students</abbr></small>
                                                    </div>

                                                    <div class="panel-group" id="{{$college->id}}_result_accordion">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#{{$college->id}}_result_accordion" href="#{{$college->id}}_result_collapse">
                                                                        <small>Assessment Results</small>
                                                                    </a>
                                                                    <div class="pull-right">
                                                                        KEY&nbsp;
                                                                        <button class="btn btn-xs btn-success">Excellent</button>
                                                                        <button class="btn btn-xs btn-primary">Very Good</button>
                                                                        <button class="btn btn-xs btn-info">Good</button>
                                                                        <button class="btn btn-xs btn-warning">Satisfactory</button>
                                                                        <button class="btn btn-xs btn-danger">Poor</button>
                                                                    </div>
                                                                </h4>
                                                            </div>
                                                            <div id="{{$college->id}}_result_collapse" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="IS333Week8" style="padding-top: 5px">
                                                    <div class="alert alert-success">
                                                        <small>Your Assessment Results done by your <abbr title="IS 333 Class">Students</abbr></small>
                                                    </div>
                                                    <div class="panel-group" id="IS333Week8accordion">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseOne">
                                                                        <small>Assessment Results</small>
                                                                    </a>
                                                                    <div class="pull-right">
                                                                        KEY&nbsp;
                                                                        <button class="btn btn-xs btn-success">Above 4</button>
                                                                        <button class="btn btn-xs btn-primary">Above 3</button>
                                                                        <button class="btn btn-xs btn-danger">Bellow 3</button>
                                                                    </div>

                                                                </h4>
                                                            </div>
                                                            <div id="IS333Week8collapseOne" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseTwo">
                                                                        Students' Regards
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="IS333Week8collapseTwo" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    No comment
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane fade" id="IS333Week12" style="padding-top: 5px">
                                                    <div class="alert alert-info">
                                                        <small>
                                                            Results will be populated soon at the end of this week<br>                                       
                                                        </small>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="IS333Week16" style="padding-top: 5px">
                                                    <div class="alert alert-warning">
                                                        <a href="#" class="alert-link">
                                                            <small>
                                                                Overall assessment results will be provided at the end of the 15th week
                                                                after all assessment results have been returned.
                                                            </small>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#{{$college->id}}_college_accordion" href="#{{$college->id}}_dep_collapse">
                                                <small><strong>Overall Department Assessment</strong></small>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{$college->id}}_dep_collapse" class="panel-collapse collapse in">
                                        <div class="panel-body row list">
                                            <!--Department nav pill side bars-->
                                            <div class="col-lg-1">
                                                <ul class="nav nav-pills">
                                                    <?php 
                                                    $departments = Department::where('college_id',$college->id)
                                                                            ->get();
                                                    $active_tab = 1;
                                                    $active_content = 1;
                                                    ?>
                                                    @foreach($departments as $department)
                                                    <li style="padding-bottom: 5px" title="{{$department->department_name}}" class="{{($active_tab)? 'active':''}}<?php $active_tab = 0; ?>"><a href="#{{strtolower($department->id)}}" data-toggle="tab"><small><strong>{{$department->id}}</strong></small></a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="col-lg-11">
                                                <div class="tab-content">
                                                    @foreach($departments as $department)
                                                    <div class="tab-pane fade {{($active_content)? 'in active':''}}<?php $active_content = 0; ?>" id="{{strtolower($department->id)}}">
                                                        <!-- Nav tabs -->
                                                        <ul class="nav nav-tabs">
                                                            @for($week = 6; $week < 20; $week+=4)
                                                                @if($week == 18)
                                                                <li class="{{($week < (20-1))? 'active':''}}"><a href="#{{strtolower($department->id)}}Overall" data-toggle="tab">Overall</a></li>
                                                                @else
                                                                <li class="{{($week == (20-1))? 'active':''}}"><a href="#{{strtolower($department->id)}}Week{{$week}}" data-toggle="tab">Week {{$week}}</a></li>
                                                                @endif
                                                            @endfor
                                                            <li class="pull-right" style="text-decoration: none;"><strong class="text-primary">{{$department->department_name}}</strong></li>
                                                        </ul>
                                                        <!-- Tab panes -->
                                                        <div class="tab-content ">
                                                            @for($week = 6; $week < 20; $week+=4)
                                                                @if($week == 6)
                                                                <div class="tab-pane fade {{($week == (20-1))? 'in active':''}}" id="{{strtolower($department->id)}}Week{{$week}}" style="padding-top: 5px">
                                                                    @include('components.weeklyInstructorDepartmentAssessmentResults')
                                                                </div>
                                                                @endif
                                                                @if($week == 10)
                                                                <div class="tab-pane fade {{($week == (20-1))? 'in active':''}}" id="{{strtolower($department->id)}}Week{{$week}}" style="padding-top: 5px">
                                                                    @include('components.weeklyInstructorDepartmentAssessmentResults')
                                                                </div>
                                                                @endif
                                                                @if($week == 14)
                                                                <div class="tab-pane fade {{($week == (20-1))? 'in active':''}}" id="{{strtolower($department->id)}}Week{{$week}}" style="padding-top: 5px">
                                                                    @include('components.weeklyInstructorDepartmentAssessmentResults')
                                                                </div>
                                                                @endif
                                                                @if($week == 18)
                                                                <div class="tab-pane fade {{($week < (20-1))? 'in active':''}}" id="{{strtolower($department->id)}}Overall" style="padding-top: 5px">
                                                                    @include('components.overallInstructorDepartmentAssessmentResults')
                                                                </div>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#{{$college->id}}_academic_year_accordion" href="#{{$college->id}}_academic_year_collapse">
                                <strong>2013-2014</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="{{$college->id}}_academic_year_collapse" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="alert alert-info">
                                This functionality allows the Head of Department to view the problems reported to him by the student of
                                his/her department concerning a lecturer of his/her department also.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
</div>
@include('frame.footer')