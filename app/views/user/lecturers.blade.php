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
                                    ->get();
        
        $list_of_lecturer_positions = array();
        $position = "";
        $position_count = 0;
        foreach($list_of_lecturers as $lecturer){
            if($lecturer->position != $position){
                    $list_of_lecturer_positions[$position_count] =  $lecturer->position;
                    $position = $lecturer->position;
                    $position_count++;
            }
        }
        $active_tab = 1;
        $active_content = 1;
        ?>
        @for($count = 0; $count < count($list_of_lecturer_positions); $count++)
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#position-accordion" href="#{{str_replace(' ','',$list_of_lecturer_positions[$count])}}collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>{{$list_of_lecturer_positions[$count]}}</small></strong></button>
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
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-8 my-scroll-body" style="height: 557px; padding-top: 10px">
    <!-- Side Tab panes -->   
    <div class="tab-content">
        @foreach($list_of_lecturers as $lecturer)
        <div class="tab-pane fade {{($active_content)? 'in active':''}} <?php $active_content = 0; ?>" id="{{$lecturer->lecturer_id}}">
            <div class="panel-group" id="{{$lecturer->lecturer_id}}accordion">
                <?php
                $academic_years = LecturerCourseAssessment::select('academic_year')->where('lecturer_id',$lecturer->lecturer_id)->get();
                $active_year = 1;
                ?>
                @foreach($academic_years as $academic_year)
                <?php 
                $course = LecturerCourseAssessment::where('academic_year',$academic_year->academic_year)
                                                    ->where('lecturer_id',$lecturer->lecturer_id)
                                                    ->first();
                ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#{{$lecturer->lecturer_id}}accordion" href="#{{str_replace('/','-',$academic_year->academic_year).$lecturer->lecturer_id}}collapse">
                                <strong>{{str_replace('/','-',$academic_year->academic_year)}}</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="{{str_replace('/','-',$academic_year->academic_year).$lecturer->lecturer_id}}collapse" class="panel-collapse collapse {{($active_year)? 'in':''}}">
                        <div class="panel-body ">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                @for($week = 6; $week <= 18; $week+=4)
                                    @if($week == 18)
                                    <li class="{{($week == (18))? 'active': ($week == (18-1))? 'active': ($week == (18-2))? 'active': ($week == (18-3))? 'active':''}}"><a href="#{{str_replace(' ','',$course->course_code)}}Overall" data-toggle="tab">Overall</a></li>
                                    @else
                                    <li class="{{($week == (18))? 'active': ($week == (18-1))? 'active': ($week == (18-2))? 'active': ($week == (18-3))? 'active':''}}"><a href="#{{str_replace(' ','',$course->course_code)}}Week{{$week}}" data-toggle="tab">Week {{$week}}</a></li>
                                    @endif
                                @endfor
                                <li class="pull-right" style="text-decoration: none;">
                                    <small>{{$course->course_code}}</small><strong class="text-primary"> {{Course::find($course->course_code)->course_name}}</strong><br>
                                    
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
                                @for($week = 6; $week <= 18; $week+=4)
                                    @if($week == 6)
                                    <div class="tab-pane fade {{($week == (18))? 'in active': ($week == (18-1))? 'in active': ($week == (18-2))? 'in active': ($week == (18-3))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                    @if($check_assessment_submition->a6_01 == 0)
                                        <br>
                                        <div class="alert alert-success">
                                            <small>
                                                <strong>Lecturer has not assessed the class yet</strong>
                                            </small>
                                        </div>
                                    @else
                                        @if($week == (18-1))
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
                                    <div class="tab-pane fade {{($week == (18))? 'in active': ($week == (18-1))? 'in active': ($week == (18-2))? 'in active': ($week == (18-3))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                    @if($check_assessment_submition->a10_01 == 0)
                                        <br>
                                        <div class="alert alert-success">
                                            <small>
                                                <strong>Lecturer has not assessed the class yet</strong>
                                            </small>
                                        </div>
                                    @else
                                        @if($week == (18-1))
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
                                    <div class="tab-pane fade {{($week == (18))? 'in active': ($week == (18-1))? 'in active': ($week == (18-2))? 'in active': ($week == (18-3))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Week{{$week}}" style="padding-top: 5px">
                                    @if($check_assessment_submition->a14_01 == 0)
                                        <br>
                                        <div class="alert alert-success">
                                            <small>
                                                <strong>Lecturer has not assessed the class yet</strong>
                                            </small>
                                        </div>
                                    @else
                                        @if($week == (18-1))
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
                                    <div class="tab-pane fade {{($week == (18))? 'in active': ($week == (18-1))? 'in active': ($week == (18-2))? 'in active': ($week == (18-3))? 'in active':''}}" id="{{str_replace(' ','',$course->course_code)}}Overall" style="padding-top: 5px">
                                    @if($check_assessment_submition->a14_01 == 0 || $check_assessment_submition->a10_01 == 0 || $check_assessment_submition->a6_01 == 0)
                                        <br>
                                        <div class="alert alert-info">
                                            <small>
                                                <strong>Please make sure that you fill in all the weekly assessment forms</strong>
                                            </small>
                                        </div> 
                                    @else
                                        @if($week == (18-1))
                                        <br>
                                        <div class="alert alert-success">
                                            <small>
                                                <strong>Your Assessments have been received</strong>
                                            </small>
                                        </div>   
                                        @else
                                            @include('components.overallInstructorCourseAssessmentResults')
                                        @endif
                                    @endif
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
        @endforeach
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style=" height: 557px">
</div>
@include('frame.footer')