@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="accordion">
        <?php 
            $list_of_courses = StudentAssessment::where("reg_no",Auth::user()->id)
                                                                ->get();
            $list_of_course_initials = array();
            $course_initials = "";
        ?>
        @foreach($list_of_courses as $course)
            @if(substr($course->course_code,0,2) != $course_initials)
                <?php
                    $list_of_course_initials =  substr($course->course_code,0,2);
                    $course_initials = substr($course->course_code,0,2);
                ?>
            @endif
        @endforeach
        
        @for($count=0; $count < count($list_of_course_initials); $count++)
            <div class="list-group panel">
                <button style="margin-bottom: 5px;" data-toggle="collapse" data-parent="#course_inials" href="#{{$list_of_course_initials}}" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>{{$list_of_course_initials}} COURSE</small></strong></button>
                <div id="{{$list_of_course_initials}}" class="collapse in">
                        @foreach($list_of_courses as $course)
                            @if(substr($course->course_code,0,2) == $list_of_course_initials)
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
        ?>
        @foreach($list_of_courses as $course)
            @if($course_code != $course->course_code)
                <div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == $course->course_code)? 'in active':'' :($active_course)? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}">
                    <div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}yearaccordion">
                        <?php 
                            $academic_years = StudentAssessment::select('academic_year')->where('course_code',$course->course_code)->get();
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
                                            @for($week = 6; $week < 11; $week+=4)
                                                @if($week == 18)
                                                <li class="{{($week == (11-1))? 'active':''}}"><a href="#{{str_replace(' ','',$course->course_code)}}Overall" data-toggle="tab">Overall</a></li>
                                                @else
                                                <li class="{{($week == (11-1))? 'active':''}}"><a href="#{{str_replace(' ','',$course->course_code)}}Week{{$week}}" data-toggle="tab">Week {{$week}}</a></li>
                                                @endif
                                            @endfor
                                            <li class="pull-right" style="text-decoration: none;"><small>{{$course->course_code}}</small><strong class="text-primary"> {{Course::find($course->course_code)->course_name}}</strong></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content ">
                                            <?php
                                                $check_assessment_submition = StudentAssessment::select('b6_01','c6_01','d6_01','b10_01','c10_01','d10_01','b14_01','c14_01','d14_01')
                                                                                                        ->where('course_code',$course->course_code)
                                                                                                        ->where('academic_year',$academic_year->academic_year)
                                                                                                        ->first();
                                            ?>
                                            @for($week = 6; $week < 11; $week+=4)
                                                @if($week == 6)
                                                <div class="tab-pane fade {{($week == (11-1))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                    @if($check_assessment_submition->b6_01 == 0)
                                                        @include('components.instructorAssessmentQuestions')
                                                    @elseif($check_assessment_submition->c6_01 == 0)
                                                        @include('components.courseAssessmentQuestions')
                                                    @elseif($check_assessment_submition->d6_01 == 0)
                                                        @include('components.environmentAssessmentQuestions')
                                                    @else
                                                        @if($week == (11-1))
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
                                                <div class="tab-pane fade {{($week == (11-1))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                    @if($check_assessment_submition->b10_01 == 0)
                                                        @include('components.instructorAssessmentQuestions')
                                                    @elseif($check_assessment_submition->c10_01 == 0)
                                                        @include('components.courseAssessmentQuestions')
                                                    @elseif($check_assessment_submition->d10_01 == 0)
                                                        @include('components.environmentAssessmentQuestions')
                                                    @else
                                                        @if($week == (11-1))
                                                        <br>
                                                        <div class="alert alert-success">
                                                            <small>
                                                                <strong>Your Assessments have been received</strong>
                                                            </small>
                                                        </div>
                                                        @else
                                                        
                                                        @endif
                                                    @endif
                                                </div>
                                                @elseif($week == 14)
                                                <div class="tab-pane fade {{($week == (11-1))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                                    @if($check_assessment_submition->b14_01 == 0)
                                                        @include('components.instructorAssessmentQuestions')
                                                    @elseif($check_assessment_submition->c14_01 == 0)
                                                        @include('components.courseAssessmentQuestions')
                                                    @elseif($check_assessment_submition->d14_01 == 0)
                                                        @include('components.environmentAssessmentQuestions')
                                                    @else
                                                        @if($week == (11-1))
                                                        <br>
                                                        <div class="alert alert-success">
                                                            <small>
                                                                <strong>Your Assessments have been received</strong>
                                                            </small>
                                                        </div>
                                                        @else
                                                        
                                                        @endif
                                                    @endif
                                                </div>
                                                @elseif($week == 18)
                                                <div class="tab-pane fade {{($week == (11-1))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Overall" style="padding-top: 5px">
                                                    
                                                </div>
                                                @endif
                                            @endfor
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