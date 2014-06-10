<?php
$all_college_departments = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                        ->join('departments','courses.department_id','=','departments.id')
                        ->where('departments.college_id',Session::get('college_report'))
                        ->where('academic_year','2013/14')
                        ->select('departments.id')
                        ->groupBy('departments.id')
                        ->get();
?>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th colspan="13" class="text-success"><small><strong>{{College::find(Session::get('college_report'))->college_name}} Assessment Report</strong></small></th>
        </tr>
    </thead>
    <tr>
        <th>Course Code</th>
        <th>Instructor</th>
        <th>B1</th>
        <th>B2</th>
        <th>B3</th>
        <th>B4</th>
        <th>B5</th>
        <th>B6</th>
        <th>B7</th>
        <th>B8</th>
        <th>B9</th>
        <th>B10</th>
        <th>Average</th>
    </tr>
    @foreach($all_college_departments as $respective_department)
        <?php
        $all_courses_in_dep = LecturerCourseAssessment::join('courses','course_code','=','courses.id')
                                                    ->where('academic_year','2013/14')
                                                    ->where('department_id',$respective_department->id)
                                                    ->get();
        ?>
        @foreach($all_courses_in_dep as $respective_course)
        <tr>
            <td class="text-primary"><small>{{$respective_course->course_code}}</small></td>
            <td class="text-primary"><small>{{User::find($respective_course->lecturer_id)->title.' '.User::find($respective_course->lecturer_id)->first_name.' '.User::find($respective_course->lecturer_id)->last_name.' '.User::find($respective_course->lecturer_id)->middle_name}}</small></td>
            <?php 
            $questions = AssessmentQuestion::where('question_id','like','b_%')
                                            ->get();
            $total_respective_course_grade = 0;
            ?>
            @foreach($questions as $instructor_question)
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
                <td class="text-primary"><small>{{round($overall_grade,1)}}</small></td>
                @else
                <?php
                $respective_course_grade = $total_respective_course_grade/($total_questions-1);
                ?>
                <td class="text-primary"><small>{{round($respective_course_grade,1)}}</small></td>
                @endif
            @endforeach
        </tr>
        @endforeach
        <tr>
            <th colspan="2" class="text-primary"><center><small>Total {{$respective_department->id}}</small></center></th>
            <?php $total_respective_department_grade = 0; ?>
            @foreach($questions as $instructor_question)
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
                <th class="text-primary"><small>{{round($overall_dep_grade,1)}}</small></th>
                @else
                    <?php
                    $respective_department_grade = $total_respective_department_grade/($total_questions-1);
                    $question = array_add($question,$respective_department->id.'_'.$instructor_question->question_id,$respective_department_grade);
                    ?>
                <th class="text-primary"><small>{{round($respective_department_grade,1)}}</small></th>
                @endif
            @endforeach
        </tr>
    @endforeach
    <tr>
        <th colspan="2" class="text-info"><center>Total {{Session::get('college_report')}}</center></th>
        <?php $total_col_grade = 0; ?>
        @foreach($questions as $instructor_question)
            <?php
            $total_dep_grade = 0;
            $dep_count = 0;
            $col_grade = 0;
            foreach($all_college_departments as $respective_department){
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
            <th class="text-info">{{round($col_grade,1)}}</th>
            @else
            <?php $respective_col_grade =  $total_col_grade/($total_questions-1) ?>
            <th class="text-info">{{round($respective_col_grade,1)}}</th>
            @endif
        @endforeach
    </tr>
</table>
<?php