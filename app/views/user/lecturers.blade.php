@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-4 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="position-accordion">
        <?php
        $lecturer = HeadOfDepartment::select('lecturer_id')
                                        ->where('id',Auth::user()->id)
                                        ->first();
        $department = Lecturer::select('department_id')
                                ->where('id',$lecturer->lecturer_id)
                                ->first();
        $list_of_lecturers = LecturerCourseAssessment::join('lecturers','lecturers_courses_assessments.lecturer_id','=','lecturers.id')
                                    ->select('lecturers_courses_assessments.course_code','lecturers_courses_assessments.academic_year','lecturers_courses_assessments.lecturer_id','lecturers.position')
                                    ->where('lecturers.department_id',$department->department_id)
                                    ->whereNotIn('lecturers.id', array($lecturer->lecturer_id))
                                    ->groupBy('lecturers.id')
                                    ->get();
        
        $list_of_lecturer_positions = array();
        $position_count = 0;
        foreach($list_of_lecturers as $lecturer){
            if(!in_array($lecturer->position, $list_of_lecturer_positions)){
                    $list_of_lecturer_positions[$position_count] =  $lecturer->position;
                    $position_count++;
            }
        }
        $active_tab = 1;
        $active_content = 1;
        $current_week = AssessmentDetail::where('id',1)->pluck('current_week');
        ?>
        @if($current_week < 6)
            <div class="list-group panel" style="margin-bottom: 3px;">
                <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#manage_accordion" href="#assessment_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Manage</small></strong></button>
                <div id="assessment_collapse" class="collapse in">
                    <!-- Side Nav tabs -->
                    <div class="">
                        <button class="btn btn-info btn-block" href="#instructors" data-toggle="tab"><small><strong>Instructors</strong></small></button>
                        <button class="btn btn-info btn-block" href="#courses" data-toggle="tab"><small><strong>Courses</strong></small></button>
                    </div>
                </div>
            </div>
        @else
            @if(count($list_of_lecturers) == 0)
                <button href="#notification" data-toggle="tab" class="btn btn-danger btn-block list-group-item my-pull-right panel-title"><strong><small>Notification</small></strong></button>
            @else  
                @for($count = 0; $count < count($list_of_lecturer_positions); $count++)
                <div class="list-group panel" style="margin-bottom: 3px;">
                    <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#position-accordion" href="#{{str_replace(' ','',$list_of_lecturer_positions[$count])}}collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>{{$list_of_lecturer_positions[$count].'s'}}</small></strong></button>
                    <div id="{{str_replace(' ','',$list_of_lecturer_positions[$count])}}collapse" class="collapse {{($active_tab)? 'in':''}}" <?php $active_tab = 0; ?>>
                        <!-- Side Nav tabs -->
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($list_of_lecturers as $lecturer)
                                @if($lecturer->position == $list_of_lecturer_positions[$count])
                                <button class="btn btn-info btn-block" href="#{{$lecturer->lecturer_id}}" data-toggle="tab">{{User::find($lecturer->lecturer_id)->title.' '.User::find($lecturer->lecturer_id)->last_name}}</button>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endfor
            @endif   
        @endif
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-8 my-scroll-body" style="height: 557px; padding-top: 10px">
    <!-- Side Tab panes -->   
    <div class="tab-content">
        @if($current_week < 6)
        <?php
            $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
            $department = Lecturer::find(HeadOfDepartment::find(Auth::user()->id)->lecturer_id)->department_id;
        ?>
        <div class="tab-pane fade {{(!Session::has('global'))?'in active':(Session::get('global') == 'instructor')? 'in active':''}}" id="instructors">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <strong>Instructors</strong>
                        </a>
                    </h4>
                </div>
                <div class="panel-body" style="text-align: justify;">
                    <div class="alert alert-success">
                        <strong><small>
                                This section allows you to Add new Instructors, View, Edit and Remove Existing Instructors in your Department<br>
                                Using the Excel file you will be able to Edit Instructors Information by uploading the Excel file<br>
                                The Excel File that you will upload should be named <u>{{$department}} instructors</u>
                        </small></strong>
                    </div>
                    <div class="alert alert-warning">
                        <strong><small>
                                <i class="glyphicon glyphicon-warning-sign text-danger"></i> This section of Managing Instructors will be closed at the beginning of the Sixth Week of the Semester<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;So make sure that Instructors are Added within the first Five Weeks of the new Semester
                        </small></strong>
                    </div>
                    <a href="{{URL::to('user/headOfDepartmentExcelFile/instructor/')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Add Instructors</a>
                    <a href="{{URL::to('user/manageInstructors/'.$department)}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> Instructors</a>
                    @if(Session::get('instructorExcelFile') == 'instructor')
                        {{ Form::open(array('url'=>'user/headOfDepartmentExcelFile/instructor/'.$department,"enctype"=>"multipart/form-data",'class'=>'form-horizontal my-input-margin-bottom')) }}
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
                            <small><strong>Please upload valid Instructors Excel File</strong></small>
                        </div>
                        @else
                        <div class="alert alert-danger">
                            <small class="text-danger"><strong>{{Session::get('excelFileMessage')}}</strong></small>
                        </div>
                        @endif
                    @elseif(Session::has('instructors'))
                    <div class="alert alert-info"><strong><small>List of Instructors in the Department of <span class="text-warning">{{Department::find($department)->department_name}}</span></small></strong></div>
                    <table class="table table-striped table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                                <th>Full Name</th>
                                <th>Position</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        @foreach(Session::get('instructors') as $instructor)
                        <tr>
                            <td><small class="text-primary"><strong>{{$instructor->id}}</strong></small></td>
                            <td><small class="text-primary"><strong>{{User::find($instructor->id)->title}}</strong></small></td>
                            <td><small class="text-primary"><strong>{{User::find($instructor->id)->first_name.' '.User::find($instructor->id)->middle_name.' '.User::find($instructor->id)->last_name}}</strong></small></td>
                            <td><small class="text-primary"><strong>{{$instructor->position}}</strong></small></td>
                            <td>
                                @if($instructor->id != HeadOfDepartment::where('id',Auth::user()->id)->pluck('lecturer_id'))
                                <a href="{{URL::to('user/manageInstructors/'.$department.'/'.$instructor->id)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i> remove</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                </div>
            </div>
        </div>
        <div class="tab-pane fade {{(Session::get('global') == 'course')? 'in active':''}}" id="courses">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                            <strong>Courses</strong>
                        </a>
                    </h4>
                </div>
                <div class="panel-body" style="text-align: justify;">
                    <div class="alert alert-success">
                        <strong><small>
                            This section allows you to assign and view courses offered by your Department to Instructors<br>
                            You will be able to Assign Courses and Edit Course Assignments by uploading the Excel file that contains course assignment information<br>
                            The Excel File that you will upload that contain course assignment information should be named <u>{{$department}} course assignment {{str_replace('/','-',$current_academic_year)}}</u>
                        </small></strong>
                    </div>
                    <div class="alert alert-warning">
                        <strong><small>
                                <i class="glyphicon glyphicon-warning-sign text-danger"></i> This section of Assigning Courses to Instructors will be closed at the beginning of the Sixth Week of the Semester<br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;So make sure that Courses are Assigned to Instructors within the first Five Weeks of the new Semester
                        </small></strong>
                    </div>
                    <a href="{{URL::to('user/headOfDepartmentExcelFile/course')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Assign Courses</a>
                    <a href="{{URL::to('user/manageCourses/'.$department)}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> Assigned Courses</a>
                    @if(Session::get('instructorExcelFile') == 'course')
                        {{ Form::open(array('url'=>'user/headOfDepartmentExcelFile/course/'.$department.'/'.str_replace('/','-',$current_academic_year),"enctype"=>"multipart/form-data",'class'=>'form-horizontal my-input-margin-bottom')) }}
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
                            <small>
                                <strong>
                                    @if(Session::has('course'))
                                    Please assign an Instructor to <span class="text-danger">{{Session::get('course').' '.Course::find(Session::get('course'))->course_name}} Course</span> using the valid Excel File
                                    @else
                                        Please upload a valid Course Assignment Excel File
                                    @endif
                                </strong>
                            </small>
                        </div>
                        @else
                        <div class="alert alert-danger">
                            <small class="text-danger"><strong>{{Session::get('excelFileMessage')}}</strong></small>
                        </div>
                        @endif
                    @elseif(Session::has('courses'))
                        @if(count(Session::get('courses')) == 0)
                        <div class="alert alert-danger">
                            <strong>
                                <small>
                                    So far no courses have been registered in this Department for Assessment
                                    Please Report this case to the QAB Administration.
                                </small>
                            </strong>
                        </div>
                        @else
                        <div class="alert alert-info">
                            <strong>
                                <small>
                                    Courses provided by the Department of <span class="text-warning">{{Department::find($department)->department_name}}</span> with assigned Instructors in the academic year <span class="text-warning">{{$current_academic_year}}</span>
                                </small>
                            </strong>
                        </div>
                        <table class="table table-striped table-hover table-condensed">
                            <thead>
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Name</th>
                                    <th>Assigned to</th>
                                    <th>Manage</th>
                                </tr>
                            </thead>
                            @foreach(Session::get('courses') as $course)
                            <tr>
                                <td><small class="text-primary"><strong>{{$course->id}}</strong></small></td>
                                <td><small class="text-primary"><strong>{{$course->course_name}}</strong></small></td>
                                <td>
                                    <small class="text-primary">
                                        <strong>
                                            <?php
                                                $instructor_assigned_course = LecturerCourseAssessment::where('course_code',$course->id)
                                                                                                    ->where('academic_year',$current_academic_year)
                                                                                                    ->first();
                                            ?>
                                            @if($instructor_assigned_course)
                                                {{User::find($instructor_assigned_course->lecturer_id)->title.' '.User::find($instructor_assigned_course->lecturer_id)->first_name.' '.User::find($instructor_assigned_course->lecturer_id)->middle_name.' '.User::find($instructor_assigned_course->lecturer_id)->last_name}}
                                            @else
                                                Not Assigned
                                            @endif
                                        </strong>
                                    </small>
                                </td>
                                <td>
                                    <?php
                                        $instructor_assigned_course = LecturerCourseAssessment::where('course_code',$course->id)
                                                                                            ->where('academic_year',$current_academic_year)
                                                                                            ->first();
                                    ?>
                                    @if($instructor_assigned_course)
                                    <a href="{{URL::to('user/manageCourses/'.$department.'/'.$instructor_assigned_course->id)}}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove-sign"></i> unassign</a>    
                                    @else
                                    <a href="{{URL::to('user/headOfDepartmentExcelFile/course/'.$course->id)}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> assign</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @else
            @if(count($list_of_lecturers) == 0)
            <div class="tab-pane fade in active" id="notification">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <i class="glyphicon glyphicon-warning-sign"></i> <strong>Lecturer Notification</strong>
                            </a>
                        </h4>
                    </div>
                    <div class="panel-body text-danger" style="text-align: justify;">
                        <blockquote>
                            No Instructor was registered from this Department that would participate 
                            in course assessment procedures.
                        </blockquote>
                    </div>
                </div>
            </div>
            @else
                <?php
                $assessment_detail = AssessmentDetail::first();
                ?>
                @foreach($list_of_lecturers as $lecturer)
                <div class="tab-pane fade {{($active_content)? 'in active':''}} <?php $active_content = 0; ?>" id="{{$lecturer->lecturer_id}}">
                    <div class="panel-group" id="{{$lecturer->lecturer_id}}accordion">
                        <?php
                        $academic_years = LecturerCourseAssessment::select('academic_year')
                                                                ->where('lecturer_id',$lecturer->lecturer_id)
                                                                ->groupBy('academic_year')
                                                                ->get();
                        $active_year = 1;
                        ?>
                        @foreach($academic_years as $academic_year)
                        <?php 
                        $courses = LecturerCourseAssessment::where('academic_year',$academic_year->academic_year)
                                                            ->where('lecturer_id',$lecturer->lecturer_id)
                                                            ->get();

                        $course_count = 0;
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#{{$lecturer->lecturer_id}}accordion" href="#{{str_replace('/','-',$academic_year->academic_year).$lecturer->lecturer_id}}collapse">
                                        <small><i class="glyphicon glyphicon-time"></i></small> <strong>{{str_replace('/','-',$academic_year->academic_year)}}</strong>
                                    </a>
                                </h4>
                            </div>
                            <div id="{{str_replace('/','-',$academic_year->academic_year).$lecturer->lecturer_id}}collapse" class="panel-collapse collapse {{($active_year)? 'in':''}}">
                                <div class="panel-body ">
                                    @foreach($courses as $course)
                                    <?php $course_count++; ?>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs">
                                        @if($assessment_detail->current_week < 6)
                                        <li class="active"><a href="#{{str_replace(' ','',$course->course_code)}}Infor" data-toggle="tab">Infor</a></li>
                                        @else
                                            @for($week = 6; $week <= ($assessment_detail->current_week + 2); $week+=4)
                                                @if($week == 18)
                                                <li class="{{($week == ($assessment_detail->current_week + 2))? 'active':''}}"><a href="#{{str_replace(' ','',$course->course_code)}}Overall" data-toggle="tab">Overall</a></li>
                                                @else
                                                    @if($week <= $assessment_detail->current_week)
                                                    <li class="{{(($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2)) && $assessment_detail->current_week != 16)? 'active':''}}"><a href="#{{str_replace(' ','',$course->course_code)}}Week{{$week}}" data-toggle="tab"><small><i class="glyphicon glyphicon-time"></i></small> Week {{$week}}</a></li>
                                                    @endif
                                                @endif
                                            @endfor
                                        @endif
                                        <li class="pull-right" style="text-decoration: none;">
                                            <small><i class="glyphicon glyphicon-book"></i> <strong>{{$course->course_code}}</strong></small><strong class="text-primary"> {{Course::find($course->course_code)->course_name}}</strong><br>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content ">
                                        <?php
                                            $check_assessment_submition = LecturerCourseAssessment::select('a6_01','a10_01','a14_01')
                                                                                                    ->where('course_code',$course->course_code)
                                                                                                    ->where('academic_year',$academic_year->academic_year)
                                                                                                    ->first();
                                        ?>
                                        @if($assessment_detail->current_week < 6)
                                            <div class="tab-pane fade in active" id="{{str_replace(' ','',$course->course_code)}}Infor" style="padding-top: 5px">
                                                <br>
                                                    <div class="alert alert-info">
                                                        <small>
                                                            <strong>Assessments will Begin on the Sixth Week of the Semester</strong>
                                                        </small>
                                                    </div>
                                            </div>
                                        @else
                                            @for($week = 6; $week <= ($assessment_detail->current_week + 2); $week+=4)
                                                @if($week == 6)
                                                <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                @if($check_assessment_submition->a6_01 == 0)
                                                    <br>
                                                    <div class="alert alert-danger">
                                                        <small>
                                                            <strong>Lecturer has not assessed the class</strong>
                                                        </small>
                                                    </div>
                                                @else
                                                    @if($week == $assessment_detail->current_week)
                                                    <br>
                                                    <div class="alert alert-success">
                                                        <small>
                                                            <strong>Assessments results are being processed</strong>
                                                        </small>
                                                    </div>
                                                    @else
                                                        @include('components.weeklyInstructorCourseAssessmentResults')
                                                    @endif
                                                @endif
                                                </div>
                                                @elseif($week == 10)
                                                <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                @if($check_assessment_submition->a10_01 == 0)
                                                    <br>
                                                    <div class="alert alert-success">
                                                        <small>
                                                            <strong>Lecturer has not assessed the class yet</strong>
                                                        </small>
                                                    </div>
                                                @else
                                                    @if($week == $assessment_detail->current_week)
                                                    <br>
                                                    <div class="alert alert-success">
                                                        <small>
                                                            <strong>Your Assessments have been received</strong>
                                                        </small>
                                                    </div>
                                                    @else
                                                        @include('components.weeklyInstructorCourseAssessmentResults')
                                                    @endif
                                                @endif
                                                </div>
                                                @elseif($week == 14)
                                                <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                @if($check_assessment_submition->a14_01 == 0)
                                                    <br>
                                                    <div class="alert alert-success">
                                                        <small>
                                                            <strong>Lecturer has not assessed the class yet</strong>
                                                        </small>
                                                    </div>
                                                @else
                                                    @if($week == $assessment_detail->current_week)
                                                    <br>
                                                    <div class="alert alert-success">
                                                        <small>
                                                            <strong>Your Assessments have been received</strong>
                                                        </small>
                                                    </div>
                                                    @else
                                                        @include('components.weeklyInstructorCourseAssessmentResults')
                                                    @endif
                                                @endif
                                                </div>
                                                @elseif($week == 18)
                                                <div class="tab-pane fade {{($week == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Overall" style="padding-top: 5px">
                                                @if($check_assessment_submition->a14_01 == 0 || $check_assessment_submition->a10_01 == 0 || $check_assessment_submition->a6_01 == 0)
                                                    <br>
                                                    <div class="alert alert-info">
                                                        <small>
                                                            <strong>Instructor did not complete his assessments</strong>
                                                        </small>
                                                    </div> 
                                                @else
                                                    @include('components.overallInstructorCourseAssessmentResults')
                                                @endif
                                                </div>
                                                @endif
                                            @endfor
                                        @endif
                                    </div>
                                        @if(count($courses) != $course_count)
                                        <hr><br>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            @endif
        @endif
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style=" height: 557px">
    <a href="#" class="thumbnail btn btn-primary">
        {{ HTML::image('image/logo.png', 'University of Dar es salaam Logo', array('class' => 'thumb')) }}
    </a>
</div>
@include('frame.footer')