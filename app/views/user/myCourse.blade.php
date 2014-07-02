@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="course_inials_accordion">
        <?php 
            $list_of_courses = LecturerCourseAssessment::where("lecturer_id",Auth::user()->id)
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
    </div>
</div>

<div class="col-lg-8 col-md-9 col-sm-9 my-scroll-body" style="height: 557px; padding-top: 10px;">
    <!-- Side Tab panes -->   
    <div class="tab-content">
        <?php 
        $course_code = '';
        $active_course = 1;
        $assessment_detail = AssessmentDetail::first();
        ?>
        @foreach($list_of_courses as $course)
            @if($course_code != $course->course_code)
                <div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == $course->course_code)? 'in active':'' :($active_course)? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}">
                    <div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}yearaccordion">
                        <?php 
                            $academic_years = LecturerCourseAssessment::select('academic_year')->where('course_code',$course->course_code)->get();
                        ?>
                        @foreach($academic_years as $academic_year)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}yearaccordion" href="#{{$academic_year->academic_year}}collapse">
                                            <strong>{{$academic_year->academic_year}}</strong>
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$academic_year->academic_year}}collapse" class="panel-collapse collapse in">
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
                                                        <li class="{{(($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2)) && $assessment_detail->current_week != 16)? 'active':''}}"><a href="#{{str_replace(' ','',$course->course_code)}}Week{{$week}}" data-toggle="tab">Week {{$week}}</a></li>
                                                        @endif
                                                    @endif
                                                @endfor
                                            @endif
                                            <li class="pull-right" style="text-decoration: none;"><small>{{$course->course_code}}</small><strong class="text-primary"> {{Course::find($course->course_code)->course_name}}</strong></li>
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
                                                            @include('components.weeklyInstructorCourseAssessmentResults')
                                                        @endif
                                                    @endif
                                                    </div>
                                                    @elseif($week == 10)
                                                    <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2) || $week+4 == ($assessment_detail->current_week + 2) || $week+5 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                    @if($check_assessment_submition->a10_01 == 0)
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
                                                            @include('components.weeklyInstructorCourseAssessmentResults')
                                                        @endif
                                                    @endif
                                                    </div>
                                                    @elseif($week == 14)
                                                    <div class="tab-pane fade {{($week+2 == ($assessment_detail->current_week + 2) || $week+3 == ($assessment_detail->current_week + 2))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                    @if($check_assessment_submition->a14_01 == 0)
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
                                                            @include('components.weeklyInstructorCourseAssessmentResults')
                                                        @endif
                                                    @endif
                                                    </div>
                                                    @elseif($week == 18)
                                                    <div class="tab-pane fade {{($week < (20-1))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Overall" style="padding-top: 5px">
                                                    @if($check_assessment_submition->a14_01 == 0 || $check_assessment_submition->a10_01 == 0 || $check_assessment_submition->a6_01 == 0)
                                                        <br>
                                                        <div class="alert alert-info">
                                                            <small>
                                                                <strong>Please make sure that you fill in all the weekly assessment forms</strong>
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
    </div>


</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
</div>
@include('frame.footer')