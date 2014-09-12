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

        $question = array();
        $total_weeks = 0;
        ?>
        @foreach($instructor_assessment_questions as $instructor_assessment_question)
            <?php
            $total_questions++;
            if(Session::has('department_report')){
                $college_departments = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->where('departments.id',Session::get('department_report'))
                                                    ->where('academic_year','2013/14')
                                                    ->select('departments.id')
                                                    ->groupBy('departments.id')
                                                    ->get();
            }elseif(Session::has('college_report')){
                $college_departments = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                        ->join('departments','courses.department_id','=','departments.id')
                                                        ->where('departments.college_id',Session::get('college_report'))
                                                        ->where('academic_year','2013/14')
                                                        ->select('departments.id')
                                                        ->groupBy('departments.id')
                                                        ->get();
            }elseif(Session::has('course_report')){
                $college_departments = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                        ->join('departments','courses.department_id','=','departments.id')
                                                        ->where('students_assessments.course_code',Session::get('course_report'))
                                                        ->where('academic_year','2013/14')
                                                        ->select('departments.id')
                                                        ->groupBy('departments.id')
                                                        ->get();
            }
            if(count($college_departments) == 0 ){
                ?>
                <div class="alert alert-danger text-info">
                    <small>
                        <strong>
                            @if(Session::has('college_report'))
                                {{Session::get('college_report')}} has no assessed courses this year
                            @elseif(Session::has('department_report'))
                                {{Department::find(Session::get('department_report'))->department_name}} department has no assessed courses this year
                            @elseif(Session::has('course_report'))
                                {{Course::find(Session::get('course_report'))->course_name}} has not been assessed this year
                            @endif
                        </strong>
                    </small>
                </div>
                <?php
                break;
            }else{
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
                    $college_count = 0;
                    foreach($college_departments as $department){
                        if(Session::has('course_report')){
                            $department_courses = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                            ->select('students_assessments.course_code')
                                                            ->where('students_assessments.course_code',Session::get('course_report'))
                                                            //->where('academic_year',$academic_year->academic_year)
                                                            ->groupBy('students_assessments.course_code')
                                                            ->get();
                        }else{
                            $department_courses = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                            ->select('students_assessments.course_code')
                                                            ->where('courses.department_id',$department->id)
                                                            //->where('academic_year',$academic_year->academic_year)
                                                            ->groupBy('students_assessments.course_code')
                                                            ->get();
                        }
                        $total_course_grade = 0;
                        $department_grade = 0;
                        $course_assessment = array();
                        $total_course_assessment_count = 0;
                        $course_count = 0;
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
                                $course_count++;
                                $course_grade = (($course_excellent_count*5 + $course_very_good_count*4 + $course_good_count*3 + $course_satisfactory_count*2 + $course_poor_count*1)/$total_course_assessment_count);
                                $total_course_grade += $course_grade;
                                $course_assessment = array_add($course_assessment, $department_course->course_code, $course_grade);
                            }
                        }

                        if($course_count != 0){
                            $college_count++;
                            $department_grade = $total_course_grade/$course_count;
                            $total_department_grade += $department_grade;
                            $course_assessment = array_add($course_assessment, $department->id, $department_grade);
                        }else{
                            if($total_questions == 11){
                                ?>
                                @include('components.instructorReportTable')
                                <?php
                                break;
                            }
                        }
                        $course_department = array_add($course_department, $department->id, $course_assessment);
                    }
                    $week_of_assessment = array_add($week_of_assessment, 'week'.$week, $course_department);

                    if($college_count == 0){
                        break;
                    }
                }
                $question = array_add($question, $instructor_assessment_question->question_id, $week_of_assessment);

                if($weeks == 0){
                    break;
                }
            }
            ?>
        @endforeach