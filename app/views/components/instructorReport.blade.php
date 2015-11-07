<?php
        $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
        $current_week = AssessmentDetail::where('id',1)->pluck('current_week');
        $current_semister = AssessmentDetail::where('id',1)->pluck('semester');
        
        $instructor_assessment_questions = array();
        if($current_week <= 6){
            ?>
            <div class="alert alert-info text-info">
                    <small>
                        <strong>
                            Assessment reports will be provided after the Seventh week of the semester.
                        </strong>
                    </small>
                </div>
                <?php
        }elseif($current_week >= 7 && $current_week < 10){
            $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                ->where('semister',$current_semister)
                                                                ->where('academic_year',$current_academic_year)
                                                                ->where('week',6)
                                                                ->where('data_type','integer')
                                                                ->groupBy('question')
                                                                ->orderBy('id')
                                                                ->get();
        }elseif($current_week >= 10 && $current_week < 14){
            $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                ->where('semister',$current_semister)
                                                                ->where('academic_year',$current_academic_year)
                                                                ->where('week',10)
                                                                ->where('data_type','integer')
                                                                ->groupBy('question')
                                                                ->orderBy('id')
                                                                ->get();
        }elseif($current_week >= 14 && $current_week < 16){
            $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                ->where('semister',$current_semister)
                                                                ->where('academic_year',$current_academic_year)
                                                                ->where('week',14)
                                                                ->where('data_type','integer')
                                                                ->groupBy('question')
                                                                ->orderBy('id')
                                                                ->get();    
        }elseif($current_week == 16){
            $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                ->where('semister',$current_semister)
                                                                ->where('academic_year',$current_academic_year)
                                                                ->where('data_type','integer')
                                                                ->groupBy('question')
                                                                ->orderBy('id')
                                                                ->get();
        }
          
        $total_questions = 0;
        $total_college_grade = 0;
        $grand_total_college_grade = 0;
        $grand_total_college_excellent_count = 0;
        $grand_total_college_very_good_count = 0;
        $grand_total_college_good_count = 0;
        $grand_total_college_satisfactory_count = 0;
        $grand_total_college_poor_count = 0;
        $course_count = 0;

        $question = array();
        $total_weeks = 0;
        ?>
        @if($current_week > 6)
            @foreach($instructor_assessment_questions as $instructor_assessment_question)
                <?php
                $total_questions++;
                if(Session::has('department_report')){
                    $college_departments = DB::table('instructor_assessment')
                                                ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                                ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                                ->join('departments','courses.department_id','=','departments.id')
                                                ->select('departments.id')
                                                ->where('departments.id',Session::get('department_report'))
                                                ->groupBy('departments.id')
                                                ->get();
                }elseif(Session::has('college_report')){
                    $college_departments = DB::table('instructor_assessment')
                                                ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                                ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                                ->join('departments','courses.department_id','=','departments.id')
                                                ->select('departments.id')
                                                ->where('departments.college_id',Session::get('college_report'))
                                                ->groupBy('departments.id')
                                                ->get();
                }elseif(Session::has('course_report')){
                    $college_departments = DB::table('instructor_assessment')
                                                ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                                ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                                ->join('departments','courses.department_id','=','departments.id')
                                                ->select('departments.id')
                                                ->where('courses.id',Session::get('course_report'))
                                                ->groupBy('departments.id')
                                                ->get();
                }
                if(count($college_departments) == 0 ){
                    ?>
                    <div class="alert alert-danger text-info">
                        <small>
                            <strong>
                                @if(Session::has('college_report'))
                                    All courses offered by {{Session::get('college_report')}} have not been assessed
                                @elseif(Session::has('department_report'))
                                    All courses offered by {{Department::find(Session::get('department_report'))->department_name}} department have not assessed
                                @elseif(Session::has('course_report'))
                                    {{Course::find(Session::get('course_report'))->course_name}} has not been assessed
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
                    for($week = 6; $week < $current_week; $week += 4){
                        $weeks++;
                        if($weeks > $total_weeks){
                            $total_weeks = $weeks;
                        }
                        $total_department_grade = 0;

                        $course_department = array();
                        $college_count = 0;
                        foreach($college_departments as $department){
                            if(Session::has('course_report')){
                                $department_courses = DB::table('instructor_assessment')
                                                ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                                ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                                ->select('courses.id')
                                                ->where('courses.id',Session::get('course_report'))
                                                ->groupBy('courses.id')
                                                ->get();
                            }else{
                                $department_courses = DB::table('instructor_assessment')
                                                ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                                ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                                ->select('courses.id')
                                                ->where('courses.department_id',$department->id)
                                                ->groupBy('courses.id')
                                                ->get();
                            }
                            $total_course_grade = 0;
                            $department_grade = 0;
                            $course_assessment = array();
                            $total_course_assessment_count = 0;
                            $course_count = 0;
                            foreach($department_courses as $department_course){
                                $course_excellent_count = DB::table('instructor_assessment')
                                                            ->join('assessment_questions','instructor_assessment.question_id','=','assessment_questions.id')
                                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                            ->where('lecturer_course_assignment.course',$department_course->id)
                                                            ->where('assessment_questions.question',$instructor_assessment_question->question)
                                                            ->where('assessment_questions.week',$week)
                                                            ->where('assessment_value',5)
                                                            ->count();

                                $course_very_good_count = DB::table('instructor_assessment')
                                                            ->join('assessment_questions','instructor_assessment.question_id','=','assessment_questions.id')
                                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                            ->where('lecturer_course_assignment.course',$department_course->id)
                                                            ->where('assessment_questions.question',$instructor_assessment_question->question)
                                                            ->where('assessment_questions.week',$week)
                                                            ->where('assessment_value',4)
                                                            ->count();

                                $course_good_count = DB::table('instructor_assessment')
                                                            ->join('assessment_questions','instructor_assessment.question_id','=','assessment_questions.id')
                                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                            ->where('lecturer_course_assignment.course',$department_course->id)
                                                            ->where('assessment_questions.question',$instructor_assessment_question->question)
                                                            ->where('assessment_questions.week',$week)
                                                            ->where('assessment_value',3)
                                                            ->count();

                                $course_satisfactory_count = DB::table('instructor_assessment')
                                                            ->join('assessment_questions','instructor_assessment.question_id','=','assessment_questions.id')
                                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                            ->where('lecturer_course_assignment.course',$department_course->id)
                                                            ->where('assessment_questions.question',$instructor_assessment_question->question)
                                                            ->where('assessment_questions.week',$week)
                                                            ->where('assessment_value',2)
                                                            ->count();

                                $course_poor_count = DB::table('instructor_assessment')
                                                            ->join('assessment_questions','instructor_assessment.question_id','=','assessment_questions.id')
                                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                            ->where('lecturer_course_assignment.course',$department_course->id)
                                                            ->where('assessment_questions.question',$instructor_assessment_question->question)
                                                            ->where('assessment_questions.week',$week)
                                                            ->where('assessment_value',1)
                                                            ->count();

                                $total_course_assessment_count = $course_excellent_count + $course_very_good_count + $course_good_count + $course_satisfactory_count + $course_poor_count;
                                
                                if($total_course_assessment_count != 0){
                                    $course_count++;
                                    $course_grade = (($course_excellent_count*5 + $course_very_good_count*4 + $course_good_count*3 + $course_satisfactory_count*2 + $course_poor_count*1)/$total_course_assessment_count);
                                    $total_course_grade += $course_grade;
                                    $course_assessment = array_add($course_assessment, $department_course->id, $course_grade);
                                    
                                }
                            }

                            if($course_count != 0){
                                $college_count++;
                                $department_grade = $total_course_grade/$course_count;
                                $total_department_grade += $department_grade;
                                $course_assessment = array_add($course_assessment, $department->id, $department_grade);
                            }
                            $course_department = array_add($course_department, $department->id, $course_assessment);
                        }
                        $week_of_assessment = array_add($week_of_assessment, 'week'.$week, $course_department);

                        if($college_count == 0){
                            break;
                        }
                    }
                    $question = array_add($question, $instructor_assessment_question->question, $week_of_assessment);

                    if($weeks == 0){
                        break;
                    }
                }
                ?>
            @endforeach

            @if($course_count != 0)
                @include('components.instructorReportTable')
            @endif
        @endif