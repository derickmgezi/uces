<div class="table-responsive" id="print_results">
    <table class="table table-bordered table-hover table-striped table-condensed">
        <thead>
            <tr>
                <th colspan="12">
                    <h5>
                        <strong class="text-success">
                            @if(Session::has('college_report'))
                                <?php Session::flash('category', College::find(Session::get('college_report'))->college_name.' Assessment Report'); ?>{{College::find(Session::get('college_report'))->college_name}} Assessment Report
                            @elseif(Session::has('department_report'))
                                <?php Session::flash('category', Department::find(Session::get('department_report'))->department_name.' Assessment Report'); ?>{{Department::find(Session::get('department_report'))->department_name}} Assessment Report
                            @elseif(Session::has('course_report'))
                                <?php Session::flash('category', Course::find(Session::get('course_report'))->course_name.' Assessment Report'); ?>{{Course::find(Session::get('course_report'))->course_name}} Assessment Report
                            @endif
                        </strong>
                        <?php
                        $assessment_detail = AssessmentDetail::first();
                        ?>
                        <small class="pull-right text-primary"><strong>Semester {{$assessment_detail->semester.' '.$assessment_detail->academic_year}}</strong></small>
                    </h5>
                </th>
                <th>
                    <center>
                        @if(Session::has('college_report'))
                            <a href="{{URL::to('/user/excelReport/college/'.Session::get('college_report'))}}" class="btn btn-sm btn-info">report</a>
                        @elseif(Session::has('department_report'))
                            <a href="{{URL::to('/user/excelReport/department/'.Session::get('department_report'))}}" class="btn btn-sm btn-info">report</a>
                        @elseif(Session::has('course_report'))
                            <a href="{{URL::to('/user/excelReport/course/'.Session::get('course_report'))}}" class="btn btn-sm btn-info">report</a>
                        @endif
                    </center>
                </th>
            </tr>
        </thead>
        <tr>
            <th><center><?php Session::flash('header.course', 'Course Code'); ?>Course Code</center></th>
            <th><?php Session::flash('header.instructor', 'Instructor');?>Instructor</th>
            <?php $qn_count = 0; ?>
            @foreach($instructor_assessment_questions as $instructor_question)
                <th><?php Session::flash('header.'.'A'.$instructor_question->id, 'A'.$instructor_question->id); ?><button title="{{$instructor_question->question}}" type="button" class='btn btn-xs btn-default'>{{'A'.$instructor_question->id}}</button></th>
            @endforeach
            <th><?php Session::flash('header.average', 'Average'); ?><button type="button" class='btn btn-xs btn-default'>Average</button></th>
        </tr>
        <?php 
            $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year'); 
            $respective_department_grade = array();
        ?>
        @foreach($college_departments as $respective_department)
            <?php
            if(Session::has('course_report')){
                $all_courses_in_dep = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                            ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                            ->where('courses.department_id',$respective_department->id)
                                            ->where('courses.id',Session::get('course_report'))
                                            ->where('lecturer_course_assignment.yr',$current_academic_year)
                                            ->where('lecturer_course_assignment.semister',$current_semister)
                                            ->groupBy('courses.id')
                                            ->get();
            }else{
                $all_courses_in_dep = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                            ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                            ->where('courses.department_id',$respective_department->id)
                                            ->where('lecturer_course_assignment.yr',$current_academic_year)
                                            ->where('lecturer_course_assignment.semister',$current_semister)
                                            ->groupBy('courses.id')
                                            ->get();
            }
            ?>
            @foreach($all_courses_in_dep as $respective_course)
            <tr>
                <td class="text-primary"><center><small><strong><?php Session::flash('results.'.$respective_department->id.'.'.$respective_course->course.'.course_name', $respective_course->course); ?>{{$respective_course->course}}</strong></small></center></td>
                <td class="text-primary"><small><strong><?php Session::flash('results.'.$respective_department->id.'.'.$respective_course->course.'.instructor', User::find($respective_course->lecturer_id)->title.' '.User::find($respective_course->lecturer_id)->first_name.' '.User::find($respective_course->lecturer_id)->last_name.' '.User::find($respective_course->lecturer_id)->middle_name); ?>{{User::find($respective_course->lecturer_id)->title.' '.User::find($respective_course->lecturer_id)->first_name.' '.User::find($respective_course->lecturer_id)->last_name.' '.User::find($respective_course->lecturer_id)->middle_name}}</strong></small></td>
                <?php
                $total_respective_course_grade = 0;
                ?>
                @foreach($instructor_assessment_questions as $instructor_question)
                <?php 
                $total_grade = 0;
                for($report_week = 6; $report_week < $current_week; $report_week+=4){
                $total_grade += array_get($question,$instructor_question->question.'.week'.$report_week.'.'.$respective_department->id.'.'.$respective_course->course);
                }
                $overall_grade = 0;
                if($total_weeks != 0){
                    $overall_grade = $total_grade/$total_weeks;
                    $total_respective_course_grade += $overall_grade;
                }
                ?>
                    @if($overall_grade != 0)
                    <td class="text-primary" style="{{(round($overall_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small><?php Session::flash('results.'.$respective_department->id.'.'.$respective_course->course.'.'.'A'.$instructor_question->id, round($overall_grade,1)); ?>{{round($overall_grade,1)}}</small></center></td>
                    @endif
                @endforeach
                
                <?php
                    $respective_course_grade = $total_respective_course_grade/$total_questions;
                ?>
                @if($respective_course_grade != 0)
                    <td class="text-primary" style="{{(round($respective_course_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small><?php Session::flash('results.'.$respective_department->id.'.'.$respective_course->course.'.average', round($respective_course_grade,1)); ?>{{round($respective_course_grade,1)}}</small></center></td>
                @endif
            </tr>
            @endforeach
            @if(!Session::has('course_report'))
            <tr>
                <th colspan="2" class="text-info"><center><small><?php Session::flash('results.'.$respective_department->id.'.'.$respective_department->id.'.department_name', $respective_department->id);Session::flash('results.'.$respective_department->id.'.'.$respective_department->id.'.empty', ''); ?>Total {{$respective_department->id}}</small></center></th>
                <?php $total_respective_department_grade = 0; ?>
                @foreach($instructor_assessment_questions as $instructor_question)
                    <?php
                    $total_dep_grade_week = 0;
                    for($report_week = 6; $report_week < $current_week; $report_week+=4){
                    $total_dep_grade_week += array_get($question,$instructor_question->question.'.week'.$report_week.'.'.$respective_department->id.'.'.$respective_department->id);
                    }

                    $overall_dep_grade = 0;
                    if($total_weeks != 0){
                        $overall_dep_grade = $total_dep_grade_week/$total_weeks;
                        $total_respective_department_grade += $overall_dep_grade;
                        $question = array_add($question,$respective_department->id.'_'.$instructor_question->question,$overall_dep_grade);
                    }
                    ?>
                    @if($overall_dep_grade != 0)
                    <th class="text-info" style="{{(round($overall_dep_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small><?php Session::flash('results.'.$respective_department->id.'.'.$respective_department->id.'.'.'A'.$instructor_question->id, round($overall_dep_grade,1)); ?>{{round($overall_dep_grade,1)}}</small></center></th>
                    @endif
                @endforeach
                <?php
                    $respective_department_grade = $total_respective_department_grade/$total_questions;
                    $question = array_add($question,$respective_department->id.'_'.$instructor_question->question,$respective_department_grade);
                ?>
                <th class="text-info" style="{{(round($respective_department_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small><?php Session::flash('results.'.$respective_department->id.'.'.$respective_department->id.'.overall', round($respective_department_grade,1)); ?>{{round($respective_department_grade,1)}}</small></center></th>
            </tr>
            @endif
        @endforeach
        @if(Session::has('college_report'))
        <tr>
            <th colspan="2" class="text-info"><center><?php Session::flash('results.'.Session::get('college_report').'.'.Session::get('college_report').'.college_name', Session::get('college_report'));Session::flash('results.'.Session::get('college_report').'.'.Session::get('college_report').'.empty', ''); ?>Total {{Session::get('college_report')}}</center></th>
            <?php $total_col_grade = 0; ?>
            @foreach($instructor_assessment_questions as $instructor_question)
                <?php
                $total_dep_grade = 0;
                $dep_count = 0;
                $col_grade = 0;
                foreach($college_departments as $respective_department){
                    $dep_grade = array_get($question,$respective_department->id.'_'.$instructor_question->question,$respective_department_grade);
                    if($dep_grade != 0){
                        $dep_count++;
                        $total_dep_grade += $dep_grade;
                    }
                }
                if($dep_count != 0){
                $col_grade = $total_dep_grade/$dep_count;
                }
                $total_col_grade += $col_grade;
                ?>   
                @if($col_grade != 0)
                <th class="text-info" style="{{(round($col_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><?php Session::flash('results.'.Session::get('college_report').'.'.Session::get('college_report').'.'.'A'.$instructor_question->id, round($col_grade,1)); ?>{{round($col_grade,1)}}</center></th>
                @endif
            @endforeach
            <?php $respective_col_grade =  $total_col_grade/$total_questions; ?>
            <th class="text-info" style="{{(round($respective_col_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><?php Session::flash('results.'.Session::get('college_report').'.'.Session::get('college_report').'.overall', round($respective_col_grade,1)); ?>{{round($respective_col_grade,1)}}</center></th>
        </tr>
        @endif
    </table>
</div>