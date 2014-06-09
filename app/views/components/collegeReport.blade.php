<?php
                $instructor_assessment_questions = AssessmentQuestion::where('question_id','like','b_%')
                                                    ->get();
                $total_questions = 0;
                $total_college_grade = 0;
                $grand_total_college_grade = 0;
                $grand_total_college_excellent_count = 0;
                $grand_total_college_very_good_count = 0;
                $grand_total_college_good_count = 0;
                $grand_total_college_satisfactory_count = 0;
                $grand_total_college_poor_count = 0;
                
                $total_course_assessment_count = 0;
                $question = array();
                $total_weeks = 0;
                ?>
                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    <?php
                    $total_questions++;
                    $college_departments = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                            ->join('departments','courses.department_id','=','departments.id')
                                                            ->where('departments.college_id',Session::get('college_report'))
                                                            ->select('departments.id')
                                                            ->get();
                    
//                    $college_departments = Department::select('id')
//                                                    ->where('college_id',Session::get('college_report'))
//                                                    ->get();
                    $overall_average_college_grade = 0;
                    $total_college_grade = 0;
                    $college_grade = 0;
                    $weeks = 0;
                    
                    $week_of_assessment = array();
                    for($week = 6; $week < 15; $week += 4){
                        $weeks++;
                        if($weeks > $total_weeks){
                            $total_weeks = $weeks;
                        }
                        $total_department_grade = 0;
                        
                        $course_department = array();
                        foreach($college_departments as $department){

                            $department_courses = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                            ->select('students_assessments.course_code')
                                                            ->where('courses.department_id',$department->id)
                                                            //->where('academic_year',$academic_year->academic_year)
                                                            ->groupBy('students_assessments.course_code')
                                                            ->get();
                            $total_course_grade = 0;
                            $department_grade = 0;
                            $course_assessment = array();
                            foreach($department_courses as $department_course){
                                
                                $course_excellent_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),5)
                                                                ->count();

                                $course_very_good_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),4)
                                                                ->count();

                                $course_good_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),3)
                                                                ->count();

                                $course_satisfactory_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),2)
                                                                ->count();

                                $course_poor_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                               ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),1)
                                                                ->count();

                                $total_course_assessment_count = $course_excellent_count + $course_very_good_count + $course_good_count + $course_satisfactory_count + $course_poor_count;

                                if($total_course_assessment_count != 0){
                                    $course_grade = (($course_excellent_count*5 + $course_very_good_count*4 + $course_good_count*3 + $course_satisfactory_count*2 + $course_poor_count*1)/$total_course_assessment_count);
                                    $total_course_grade += $course_grade;
                                    $course_assessment = array_add($course_assessment, $department_course->course_code, $course_grade);
                                }else{
                                    break;
                                }
                            }
                            
                            if(count($department_courses) != 0 && $total_course_assessment_count != 0){
                                $department_grade = $total_course_grade/count($department_courses);
                                $total_department_grade += $department_grade;
                                $course_assessment = array_add($course_assessment, $department->id, $department_grade);
                            }else{
                                if($total_questions > 1){
                                    $grand_average_college_grade = ($grand_total_college_grade/($total_questions-1));
                                    $question = array_add($question, Session::get('college_report'), $grand_average_college_grade);
                                    
                                    $all_college_departments = Department::where('college_id',Session::get('college_report'))
                                                                        ->get();
                                    ?>
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th colspan="13">{{College::find(Session::get('college_report'))->college_name}} Assessment Report</th>
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
                                            <td>{{$respective_course->course_code}}</td>
                                            <td>{{User::find($respective_course->lecturer_id)->title.' '.User::find($respective_course->lecturer_id)->first_name.' '.User::find($respective_course->lecturer_id)->last_name.' '.User::find($respective_course->lecturer_id)->middle_name}}</td>
                                            <?php 
                                            $questions = AssessmentQuestion::where('question_id','like','b_%')
                                                                            ->get();
                                            ?>
                                            @foreach($questions as $instructor_question)
                                            <?php 
                                            $grade_week_6 = array_get($question,$instructor_question->question_id.'.week6.'.$respective_department->id.'.'.$respective_course->course_code);
                                            $grade_week_10 = array_get($question,$instructor_question->question_id.'.week10.'.$respective_department->id.'.'.$respective_course->course_code);
                                            $grade_week_14 = array_get($question,$instructor_question->question_id.'.week14.'.$respective_department->id.'.'.$respective_course->course_code);
                                            $overall_grade = 0;
                                            if($total_weeks != 0){
                                                $overall_grade = ($grade_week_6 + $grade_week_10 + $grade_week_14)/$total_weeks;
                                            }
                                            ?>
                                                @if($overall_grade != 0)
                                                <td>{{round($overall_grade,1)}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <th colspan="2"><center>Total {{$respective_department->id}}</center></th>
                                            @foreach($questions as $instructor_question)
                                                <?php
                                                $dep_grade_week_6 = array_get($question,$instructor_question->question_id.'.week6.'.$respective_department->id.'.'.$respective_department->id);
                                                $dep_grade_week_10 = array_get($question,$instructor_question->question_id.'.week10.'.$respective_department->id.'.'.$respective_department->id);
                                                $dep_grade_week_14 = array_get($question,$instructor_question->question_id.'.week14.'.$respective_department->id.'.'.$respective_department->id);
                                                $overall_dep_grade = 0;
                                                if($total_weeks != 0){
                                                    $overall_dep_grade = ($dep_grade_week_6 + $dep_grade_week_10 + $dep_grade_week_14)/$total_weeks;
                                                }
                                                ?>
                                                @if($overall_dep_grade != 0)
                                                    <th>{{round($overall_dep_grade,1)}}</th>
                                                @else
                                                    <th></th>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <th colspan="2"><center>Total {{Session::get('college_report')}}</center></th>
                                            @foreach($questions as $instructor_question)
                                            <?php $col_grade = array_get($question,Session::get('college_report').'_'.$instructor_question->question_id);?>
                                                @if($col_grade != 0)
                                                <th>{{round($col_grade,1)}}</th>
                                                @else
                                                 <th>{{round(array_get($question,Session::get('college_report')),1)}}</th>
                                                @endif
                                            @endforeach
                                        </tr>
                                    </table>
                                    <?php
                                    break;
                                }
                            }
                            $course_department = array_add($course_department, $department->id, $course_assessment);
                        }
                        $week_of_assessment = array_add($week_of_assessment, 'week'.$week, $course_department);

                        if(count($college_departments) != 0 && $total_course_assessment_count != 0){
                            $college_grade = $total_department_grade/count($college_departments);
                            $total_college_grade += $college_grade;
                            
                        }else{
                            break;
                        }
                    }
                    $question = array_add($question, $instructor_assessment_question->question_id, $week_of_assessment);
                    
                    if($weeks !=0 && $total_course_assessment_count != 0){
                    $overall_average_college_grade = $total_college_grade/$weeks;
                    $grand_total_college_grade += $overall_average_college_grade;
                    $question = array_add($question, Session::get('college_report').'_'.$instructor_assessment_question->question_id, $overall_average_college_grade);
                    }else{
                        break;
                    }
                    ?>
                @endforeach