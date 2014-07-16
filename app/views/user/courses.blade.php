@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="course_inials_accordion">
        <?php 
            $list_of_courses = StudentAssessment::where("reg_no",Auth::user()->id)
                                                ->get();
            $list_of_course_initials = array();
            $course_initials = "";
            $course_initial_count = 0;
        ?>
        @foreach($list_of_courses as $course)
            @if(substr($course->course_code,0,2) != $course_initials)
                <?php
                    $list_of_course_initials[$course_initial_count] =  substr($course->course_code,0,2);
                    $course_initials = substr($course->course_code,0,2);
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
                                @if(substr($course->course_code,0,2) == $list_of_course_initials[$count])
                                    <button class="btn btn-info btn-block" href="#{{str_replace(' ','',$course->course_code)}}" data-toggle="tab">{{$course->course_code}}</button>
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
                    <blockquote>You have not been enrolled in any of the courses 
                    this Semester, make sure you enroll your self or you wont be 
                    able to evaluate courses that you expect to study.</blockquote>
                </div>
            </div>
        </div>
        @else
            <?php 
            $course_code = '';
            $active_course = 1;
            ?>
            @foreach($list_of_courses as $course)
                @if($course_code != $course->course_code)
                    <div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == $course->course_code)? 'in active':'' :($active_course)? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}">
                        <div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}yearaccordion">
                            <?php 
                                $academic_years = StudentAssessment::select('academic_year')
                                                                    ->where('course_code',$course->course_code)
                                                                    ->where('reg_no',Auth::user()->id)
                                                                    ->groupBy('academic_year')
                                                                    ->get();
                            ?>
                            @foreach($academic_years as $academic_year)
                                <?php $assessment_detail = AssessmentDetail::first(); ?>
                                @if($academic_year->academic_year != ($assessment_detail->academic_year))
                                    <?php $assessment_detail->current_week = 16; ?>
                                @endif
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}yearaccordion" href="#{{str_replace('/','-',$academic_year->academic_year)}}collapse">
                                                <small><i class="glyphicon glyphicon-time"></i></small> <strong>{{$academic_year->academic_year}}</strong>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="{{str_replace('/','-',$academic_year->academic_year)}}collapse" class="panel-collapse collapse in">
                                        <div class="panel-body ">
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
                                                <li class="pull-right" style="text-decoration: none;"><small><i class="glyphicon glyphicon-book"></i> <strong>{{$course->course_code}}</strong></small><strong class="text-primary"> {{Course::find($course->course_code)->course_name}}</strong></li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content ">
                                                <?php
                                                    $check_assessment_submition = StudentAssessment::select('b6_01','c6_01','d6_01','b10_01','c10_01','d10_01','b14_01','c14_01','d14_01')
                                                                                                            ->where('course_code',$course->course_code)
                                                                                                            ->where('academic_year',$academic_year->academic_year)
                                                                                                            ->where('reg_no',Auth::user()->id)
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
                                                            @if($check_assessment_submition->b6_01 == 0)
                                                                @include('components.instructorAssessmentQuestions')
                                                            @elseif($check_assessment_submition->c6_01 == 0)
                                                                @include('components.courseAssessmentQuestions')
                                                            @elseif($check_assessment_submition->d6_01 == 0)
                                                                @include('components.environmentAssessmentQuestions')
                                                            @else
                                                                @if($week == $assessment_detail->current_week)
                                                                <br>
                                                                <div class="alert alert-success">
                                                                    <small>
                                                                        <strong>Your Assessments have been received</strong>
                                                                    </small>
                                                                </div>
                                                                @else
                                                                <?php 
                                                                    $lecturer_id = LecturerCourseAssessment::select('lecturer_id')
                                                                                                            ->where('course_code',$course->course_code)
                                                                                                            ->where('academic_year',$academic_year->academic_year)
                                                                                                            ->first();
                                                                    $lecturer_info = User::find($lecturer_id);
                                                                ?>
                                                                <br>
                                                                    @include('components.classAssessmentResults')
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @elseif($week == 10)
                                                        <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                            @if($check_assessment_submition->b10_01 == 0)
                                                                @include('components.instructorAssessmentQuestions')
                                                            @elseif($check_assessment_submition->c10_01 == 0)
                                                                @include('components.courseAssessmentQuestions')
                                                            @elseif($check_assessment_submition->d10_01 == 0)
                                                                @include('components.environmentAssessmentQuestions')
                                                            @else
                                                                @if($week == $assessment_detail->current_week)
                                                                <br>
                                                                <div class="alert alert-success">
                                                                    <small>
                                                                        <strong>Your Assessments have been received</strong>
                                                                    </small>
                                                                </div>
                                                                @else
                                                                <br>
                                                                    @include('components.classAssessmentResults')
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @elseif($week == 14)
                                                        <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                            @if($check_assessment_submition->b14_01 == 0)
                                                                @include('components.instructorAssessmentQuestions')
                                                            @elseif($check_assessment_submition->c14_01 == 0)
                                                                @include('components.courseAssessmentQuestions')
                                                            @elseif($check_assessment_submition->d14_01 == 0)
                                                                @include('components.environmentAssessmentQuestions')
                                                            @else
                                                                @if($week == $assessment_detail->current_week)
                                                                <br>
                                                                <div class="alert alert-success">
                                                                    <small>
                                                                        <strong>Your Assessments have been received</strong>
                                                                    </small>
                                                                </div>
                                                                @else
                                                                <br>
                                                                    @include('components.classAssessmentResults')
                                                                @endif
                                                            @endif
                                                        </div>
                                                        @elseif($week == 18)
                                                        <div class="tab-pane fade {{($week == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Overall" style="padding-top: 5px">

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