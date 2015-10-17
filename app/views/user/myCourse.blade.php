@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="course_inials_accordion">
        <?php
            $assessment_detail = AssessmentDetail::first();
            $list_of_courses = LecturerCourseAssignment::where("lecturer_id",Auth::user()->id)
                                                        ->where('semister',$assessment_detail->semester)
                                                        ->where('yr',$assessment_detail->academic_year)
                                                        ->get();
            $list_of_course_initials = array();
            $course_initial_count = 0;
        ?>
        @foreach($list_of_courses as $course)
            @if(!in_array(substr($course->course,0,2), $list_of_course_initials))
                <?php
                    $list_of_course_initials[$course_initial_count] =  substr($course->course,0,2);
                    $course_initial_count++;
                ?>
            @endif
        @endforeach
        
        @if(count($list_of_courses) == 0)
            <button href="#notification" data-toggle="tab" class="btn btn-danger btn-block list-group-item my-pull-right panel-title"><strong><small>Notification</small></strong></button>
        @else
            @for($count=0; $count < count($list_of_course_initials); $count++)
                <div class="list-group panel" style="margin-bottom: 3px;">
                    <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#course_inials_accordion" href="#{{$list_of_course_initials[$count]}}" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>{{$list_of_course_initials[$count]}} COURSE</small></strong></button>
                    <div id="{{$list_of_course_initials[$count]}}" class="collapse {{($count == 0)? 'in':''}}">
                            @foreach($list_of_courses as $course)
                                @if(substr($course->course,0,2) == $list_of_course_initials[$count])
                                    <button class="btn btn-info btn-block" href="#{{str_replace(' ','',$course->course)}}" data-toggle="tab">{{$course->course}}</button>
                                @endif
                            @endforeach
                    </div>
                </div>
            @endfor
        @endif
    </div>
</div>

<div class="col-lg-8 col-md-9 col-sm-9 my-scroll-body" style="height: 557px; padding-top: 10px;">
    <!-- Side Tab panes -->   
    <div class="tab-content">
        @if(count($list_of_courses) == 0)
        <div class="tab-pane fade in active" id="notification">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <i class="glyphicon glyphicon-warning-sign"></i> <strong>Course Enrollment</strong>
                        </a>
                    </h4>
                </div>
                <div class="panel-body text-danger" style="text-align: justify;">
                    <blockquote>
                        You have not been assigned  any of the courses 
                        this Semester, incase of any inconvenience please
                        report this issue to the Head of Department.
                    </blockquote>
                </div>
            </div>
        </div>
        @else
            <?php 
            $course_code = '';
            $active_course = 1;
            ?>
            @foreach($list_of_courses as $course)
                @if($course_code != $course->course)
                    <div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == $course->course)? 'in active':'' :($active_course)? 'in active':''}}" id="{{str_replace(' ','',$course->course)}}">
                        <div class="panel-group" id="{{str_replace(' ','',$course->course)}}yearaccordion">
                            <?php 
                                $academic_years = LecturerCourseAssignment::select('yr')
                                                                        ->where('course',$course->course)
                                                                        ->where('semister',$assessment_detail->semester)
                                                                        ->groupBy('yr')
                                                                        ->get();
                            ?>
                            @foreach($academic_years as $academic_year)
                                @if($academic_year->yr != $assessment_detail->academic_year)
                                    <?php $assessment_detail->current_week = 16; ?>
                                @endif
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course)}}yearaccordion" href="#{{str_replace(' ','',$course->course).str_replace('/','-',$academic_year->yr)}}collapse">
                                                <small><i class="glyphicon glyphicon-time"></i></small> <strong>{{$academic_year->yr}}</strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{str_replace(' ','',$course->course).str_replace('/','-',$academic_year->yr)}}collapse" class="panel-collapse collapse in">
                                        <div class="panel-body ">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs">
                                                @if($assessment_detail->current_week < 6)
                                                <li class="active"><a href="#{{str_replace(' ','',$course->course)}}Enroll_Students" data-toggle="tab">Enroll Students</a></li>
                                                @else
                                                    @for($week = 6; $week <= ($assessment_detail->current_week + 2); $week+=4)
                                                        @if($week == 18)
                                                        <li class="{{($week == ($assessment_detail->current_week + 2))? 'active':''}}"><a href="#{{str_replace(' ','',$course->course)}}Overall" data-toggle="tab">Overall</a></li>
                                                        @else
                                                            @if($week <= $assessment_detail->current_week)
                                                            <li class="{{(($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2)) && $assessment_detail->current_week != 16)? 'active':''}}"><a href="#{{str_replace(' ','',$course->course)}}Week{{$week}}" data-toggle="tab"><small><i class="glyphicon glyphicon-time"></i></small> Week {{$week}}</a></li>
                                                            @endif
                                                        @endif
                                                    @endfor
                                                @endif
                                                <li class="pull-right" style="text-decoration: none;"><small><i class="glyphicon glyphicon-book"></i> <strong>{{$course->course}}</strong></small><strong class="text-primary"> {{Course::find($course->course)->course_name}}</strong></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content ">
                                                <?php
                                                    $check_assessment_submition = LecturerCourseAssignment::where('course',$course->course_code)
                                                                                                            ->where('yr',$academic_year->academic_year)
                                                                                                            ->first();
                                                ?>
                                                @if($assessment_detail->current_week < 6)
                                                <div class="tab-pane fademin active" id="{{str_replace(' ','',$course->course)}}Enroll_Students" style="padding-top: 5px">
                                                    <br>
                                                        <div class="alert alert-success">
                                                            <small>
                                                                <strong>
                                                                    Students will be enrolled in this course only within the first five weeks of the new semester . On the sixth week student enrollment will be closed<br>
                                                                    Please make sure that the excel file is named <u>{{$course->course}} students {{str_replace('/','-',$academic_year->yr)}}</u> and it contains valid student enrollment information.
                                                                </strong>
                                                            </small>
                                                        </div>
                                                        <div class="alert alert-info">
                                                            <small>
                                                                <strong>Assessments will Begin on the Sixth Week of the Semester</strong>
                                                            </small>
                                                        </div>
                                                        <a href="{{URL::to('user/instructorEnrollStudents/'.$course->course)}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-upload"></i> Enroll Students</a>
                                                        <a href="{{URL::to('user/enrolledStudents/'.$course->course)}}" class="btn btn-warning btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> Enrolled Students</a>
                                                        <a href="{{URL::to('user/manageVenues/'.$course->course)}}" class="btn btn-primary btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-hand-up"></i> Select Venue(s)</a>
                                                        @if(Session::has('unenrolledStudentMessage') && Session::get('global') == $course->course)
                                                        <strong class="text-success pull-right">
                                                            <small>{{Session::get('unenrolledStudentMessage')}}</small>
                                                        </strong>
                                                        @endif
                                                        @if(Session::has('excelFile') && Session::get('global') == $course->course)
                                                            {{ Form::open(array('url'=>'user/instructorEnrollStudents/'.$course->course,"enctype"=>"multipart/form-data",'class'=>'form-horizontal my-input-margin-bottom')) }}
                                                                <div class="input-group" style="margin-bottom: 10px;">
                                                                    <span class="input-group-addon"><strong>FILE</strong></span>
                                                                    <input required="" type="file" name="excel_file" class="form-control input-sm">

                                                                    <span class="input-group-btn">
                                                                        <button type="submit" class="btn btn-primary btn-sm" type="button">Upload</button>
                                                                    </span>
                                                                </div><!-- /input-group -->

                                                            {{Form::close()}}

                                                            @if(Session::has('successExcelFileMessage'))
                                                            <div class="alert alert-success">
                                                                <small><strong>{{Session::get('successExcelFileMessage')}}</strong></small>
                                                            </div>
                                                            @elseif(!Session::has('excelFileMessage'))
                                                            <div class="alert alert-info">
                                                                <small><strong>Please upload valid Student Enrollment Excel File</strong></small>
                                                            </div>
                                                            @else
                                                            <div class="alert alert-danger">
                                                                <small class="text-danger"><strong>{{Session::get('excelFileMessage')}}</strong></small>
                                                            </div>
                                                            @endif
                                                        @elseif(Session::has('enrolledStudents') && Session::get('global') == $course->course)
                                                            @if(count(Session::get('enrolledStudents')) != 0)
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th width=40%>Full Name</th>
                                                                        <th>Registration Number</th>
                                                                        <th>Manage</th>
                                                                    </tr>
                                                                    <?php $count = 0 ?>
                                                                    @foreach(Session::get('enrolledStudents') as $enrolledStudent)
                                                                    <tr>
                                                                        <td><small class="text-primary"><strong><?php $count++; echo $count; ?></strong></small></td>
                                                                        <td><small class="text-primary"><strong>{{User::find($enrolledStudent->reg_no)->first_name.' '.User::find($enrolledStudent->reg_no)->middle_name.' '.User::find($enrolledStudent->reg_no)->last_name}}</strong></small></td>
                                                                        <td><small class="text-primary"><strong>{{$enrolledStudent->reg_no}}</strong></small></td>
                                                                        <td><a href="{{URL::to('user/unenrollStudent/'.$enrolledStudent->reg_no.'/'.$course->course)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> un-enroll</a></td>
                                                                    </tr>
                                                                    @endforeach
                                                                </thead>
                                                            </table>
                                                            @else
                                                            <div class="alert alert-danger">
                                                                <small><strong>No student has been enrolled in this course</strong></small>
                                                            </div>
                                                            @endif
                                                        @elseif(Session::has('venues') && Session::get('global') == $course->course)
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr class="row">
                                                                    <th class="col-sm-11">Venue Name</th>
                                                                    <th class="col-sm-1">Status</th>
                                                                </tr>
                                                                @foreach(Session::get('venues') as $venue)
                                                                <tr class="row">
                                                                    <td class="col-sm-11"><small class="text-primary"><strong>{{$venue->venue_name}}</strong></small></td>
                                                                    <?php 
                                                                        $assignment_id = LecturerCourseAssignment::where('course',$course->course)
                                                                                                                ->where('yr',$assessment_detail->academic_year)
                                                                                                                ->where('semister',$assessment_detail->semester)
                                                                                                                ->pluck('id');
                                                                    
                                                                        $venue_selected = VenueCoursePlacement::where('venue_id',$venue->id)->where('assignment_id',$assignment_id)->get();
                                                                    ?>
                                                                    @if(count($venue_selected) == 1)
                                                                    <td class="col-sm-1"><a href="{{URL::to('user/deSelectVenue/'.$venue->id.'/'.$course->course)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove-sign"></i> de-select</a></td>
                                                                    @else
                                                                    <td class="col-sm-1"><a href="{{URL::to('user/selectVenue/'.$venue->id.'/'.$course->course)}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-ok-sign"></i> select</a></td>
                                                                    @endif
                                                                </tr>
                                                                @endforeach
                                                            </thead>
                                                        </table>
                                                        @endif
                                                </div>
                                                @else
                                                <?php $assessment_is_uncompleted = 0 ?>
                                                    @for($week = 6; $week <= ($assessment_detail->current_week + 2); $week+=4)
                                                        @if($week == 6)
                                                        <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                            @if($check_assessment_submition->a6_01 == 0 && $assessment_detail->current_week > 6)
                                                            <?php $assessment_is_uncompleted = 1 ?>
                                                            <br>
                                                            <div class="alert alert-danger">
                                                                <strong><small>You did not assess the class</small></strong>
                                                            </div>
                                                            @elseif($check_assessment_submition->a6_01 == 0)
                                                                @include('components.classAssessmentQuestions')
                                                            @else
                                                                @if($week == $assessment_detail->current_week)
                                                                <br>
                                                                <div class="alert alert-success">
                                                                    <small>
                                                                        <strong>Your Assessments have been received</strong>
                                                                    </small>
                                                                </div>
                                                                @else
                                                                    @if($check_assessment_submition->auth_6)
                                                                        @include('components.weeklyInstructorCourseAssessmentResults')
                                                                    @else
                                                                    <br>
                                                                    <div class="alert alert-info">
                                                                        <strong><small>Your Head of Department has not Authorized the results yet</small></strong>
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @elseif($week == 10)
                                                        <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                            @if($check_assessment_submition->a10_01 == 0 && $assessment_detail->current_week > 10)
                                                            <?php $assessment_is_uncompleted = 1 ?>
                                                            <br>
                                                            <div class="alert alert-danger">
                                                                <strong><small>You did not assess the class</small></strong>
                                                            </div>
                                                            @elseif($check_assessment_submition->a10_01 == 0)
                                                                @include('components.classAssessmentQuestions')
                                                            @else
                                                                @if($week == $assessment_detail->current_week)
                                                                <br>
                                                                <div class="alert alert-success">
                                                                    <small>
                                                                        <strong>Your Assessments have been received</strong>
                                                                    </small>
                                                                </div>
                                                                @else
                                                                    @if($check_assessment_submition->auth_10)
                                                                        @include('components.weeklyInstructorCourseAssessmentResults')
                                                                    @else
                                                                    <br>
                                                                    <div class="alert alert-info">
                                                                        <strong><small>Your Head of Department has not Authorized the results yet</small></strong>
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @elseif($week == 14)
                                                        <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                            @if($check_assessment_submition->a14_01 == 0 && $assessment_detail->current_week > 14)
                                                            <?php $assessment_is_uncompleted = 1 ?>
                                                            <br>
                                                            <div class="alert alert-danger">
                                                                <strong><small>You did not assess the class</small></strong>
                                                            </div>
                                                            @elseif($check_assessment_submition->a14_01 == 0)
                                                                @include('components.classAssessmentQuestions')
                                                            @else
                                                                @if($week == $assessment_detail->current_week)
                                                                <br>
                                                                <div class="alert alert-success">
                                                                    <small>
                                                                        <strong>Your Assessments have been received</strong>
                                                                    </small>
                                                                </div>
                                                                @else
                                                                    @if($check_assessment_submition->auth_14)
                                                                        @include('components.weeklyInstructorCourseAssessmentResults')
                                                                    @else
                                                                    <br>
                                                                    <div class="alert alert-info">
                                                                        <strong><small>Your Head of Department has not Authorized the results yet</small></strong>
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @elseif($week == 18)
                                                        <div class="tab-pane fade {{($week == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Overall" style="padding-top: 5px">
                                                            @if($assessment_is_uncompleted)
                                                            <br>
                                                            <div class="alert alert-danger">
                                                                <small>
                                                                    <strong>You did not complete filling in all the weekly assessment forms</strong>
                                                                </small>
                                                            </div> 
                                                            @else
                                                                @if($check_assessment_submition->auth_overall)
                                                                   @include('components.overallInstructorCourseAssessmentResults')
                                                                @else
                                                                <br>
                                                                <div class="alert alert-info">
                                                                    <strong><small>Your Head of Department has not Authorized the overall results yet</small></strong>
                                                                </div>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @endif
                                                    @endfor
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <?php $course_code =  $course->course_code?>
                @endif
                <?php $active_course = 0; ?>
            @endforeach
        @endif
    </div>


</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
    <a href="#" class="thumbnail btn btn-primary">
        {{ HTML::image('image/logo.png', 'University of Dar es salaam Logo', array('class' => 'thumb')) }}
    </a>
</div>
@include('frame.footer')