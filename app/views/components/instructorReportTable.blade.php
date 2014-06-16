<div class="table-responsive" id="print_results">
    <table class="table table-bordered table-hover table-striped table-condensed">
        <thead>
            <tr>
                <th colspan="12">
                    <h5>
                        <strong class="text-success">
                            @if(Session::has('college_report'))
                                {{College::find(Session::get('college_report'))->college_name}} Assessment Report
                            @elseif(Session::has('department_report'))
                                {{Department::find(Session::get('department_report'))->department_name}} Assessment Report
                            @elseif(Session::has('course_report'))
                                {{Course::find(Session::get('course_report'))->course_name}} Assessment Report
                            @endif
                        </strong>
                    </h5>
                </th>
                <th><center><button onclick="javascript:printDiv('print_results')" class="btn btn-sm btn-info">print</button></center></th>
            </tr>
        </thead>
        <tr>
            <th><center>Course Code</center></th>
            <th>Instructor</th>
            <?php $qn_count = 0; ?>
            @foreach($instructor_assessment_questions as $instructor_question)
                <?php $qn_count++; ?>
                @if($qn_count == 11)
                <th><button type="button" class='btn btn-xs btn-default'>Average</button></th>
                @else
                <th><button title="{{$instructor_question->question}}" type="button" class='btn btn-xs btn-default'>{{str_replace('b_','B',$instructor_question->question_id)}}</button></th>
                @endif
            @endforeach
        </tr>
        @foreach($college_departments as $respective_department)
            <?php
            if(Session::has('course_report')){
                $all_courses_in_dep = LecturerCourseAssessment::join('courses','course_code','=','courses.id')
                                                            ->where('academic_year','2013/14')
                                                            ->where('course_code',Session::get('course_report'))
                                                            ->where('department_id',$respective_department->id)
                                                            ->get();
            }else{
                $all_courses_in_dep = LecturerCourseAssessment::join('courses','course_code','=','courses.id')
                                                            ->where('academic_year','2013/14')
                                                            ->where('department_id',$respective_department->id)
                                                            ->get();
            }
            ?>
            @foreach($all_courses_in_dep as $respective_course)
            <tr>
                <td class="text-primary"><center><small><strong>{{$respective_course->course_code}}</strong></small></center></td>
                <td class="text-primary"><small><strong>{{User::find($respective_course->lecturer_id)->title.' '.User::find($respective_course->lecturer_id)->first_name.' '.User::find($respective_course->lecturer_id)->last_name.' '.User::find($respective_course->lecturer_id)->middle_name}}</strong></small></td>
                <?php
                $total_respective_course_grade = 0;
                ?>
                @foreach($instructor_assessment_questions as $instructor_question)
                <?php 
                $total_grade = 0;
                for($report_week = 6; $report_week < 15; $report_week+=4){
                $total_grade += array_get($question,$instructor_question->question_id.'.week'.$report_week.'.'.$respective_department->id.'.'.$respective_course->course_code);
                }
                $overall_grade = 0;
                if($total_weeks != 0){
                    $overall_grade = $total_grade/$total_weeks;
                    $total_respective_course_grade += $overall_grade;
                }
                ?>
                    @if($overall_grade != 0)
                    <td class="text-primary" style="{{(round($overall_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small>{{round($overall_grade,1)}}</small></center></td>
                    @else
                    <?php
                    $respective_course_grade = $total_respective_course_grade/($total_questions-1);
                    ?>
                        @if($respective_course_grade != 0)
                        <td class="text-primary" style="{{(round($respective_course_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small>{{round($respective_course_grade,1)}}</small></center></td>
                        @endif
                    @endif
                @endforeach
            </tr>
            @endforeach
            @if(!Session::has('course_report'))
            <tr>
                <th colspan="2" class="text-info"><center><small>Total {{$respective_department->id}}</small></center></th>
                <?php $total_respective_department_grade = 0; ?>
                @foreach($instructor_assessment_questions as $instructor_question)
                    <?php
                    $total_dep_grade_week = 0;
                    for($report_week = 6; $report_week < 15; $report_week+=4){
                    $total_dep_grade_week += array_get($question,$instructor_question->question_id.'.week'.$report_week.'.'.$respective_department->id.'.'.$respective_department->id);
                    }

                    $overall_dep_grade = 0;
                    if($total_weeks != 0){
                        $overall_dep_grade = $total_dep_grade_week/$total_weeks;
                        $total_respective_department_grade += $overall_dep_grade;
                        $question = array_add($question,$respective_department->id.'_'.$instructor_question->question_id,$overall_dep_grade);
                    }
                    ?>
                    @if($overall_dep_grade != 0)
                    <th class="text-info" style="{{(round($overall_dep_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small>{{round($overall_dep_grade,1)}}</small></center></th>
                    @else
                        <?php
                        $respective_department_grade = $total_respective_department_grade/($total_questions-1);
                        $question = array_add($question,$respective_department->id.'_'.$instructor_question->question_id,$respective_department_grade);
                        ?>
                    <th class="text-info" style="{{(round($respective_department_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center><small>{{round($respective_department_grade,1)}}</small></center></th>
                    @endif
                @endforeach
            </tr>
            @endif
        @endforeach
        @if(Session::has('college_report'))
        <tr>
            <th colspan="2" class="text-info"><center>Total {{Session::get('college_report')}}</center></th>
            <?php $total_col_grade = 0; ?>
            @foreach($instructor_assessment_questions as $instructor_question)
                <?php
                $total_dep_grade = 0;
                $dep_count = 0;
                $col_grade = 0;
                foreach($college_departments as $respective_department){
                    $dep_grade = array_get($question,$respective_department->id.'_'.$instructor_question->question_id,$respective_department_grade);
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
                <th class="text-info" style="{{(round($col_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center>{{round($col_grade,1)}}</center></th>
                @else
                <?php $respective_col_grade =  $total_col_grade/($total_questions-1) ?>
                <th class="text-info" style="{{(round($respective_col_grade,1) < 3)? 'background: #d9434f;color: white;':''}}"><center>{{round($respective_col_grade,1)}}</center></th>
                @endif
            @endforeach
        </tr>
        @endif
    </table>
</div>