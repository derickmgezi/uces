<div class="alert alert-success">
    <small>Assessment Results done by <abbr title="{{$college->id}}">Students</abbr></small>
</div>
<div class="panel-group" id="{{$college->id}}week{{$week}}accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{$college->id}}week{{$week}}accordion" href="#{{$college->id}}week{{$week}}collapse">
                    <small>Assessment Results</small>
                </a>
                <div class="pull-right">
                    <small>scale key</small>&nbsp;
                    <button class="btn btn-xs btn-success" title="Above 4">&nbsp;</button>
                    <button class="btn btn-xs btn-primary" title="Above 3">&nbsp;</button>
                    <button class="btn btn-xs btn-danger" title="Bellow 3">&nbsp;</button>
                    &nbsp;
                    <small>percentage key</small>&nbsp;
                    <button class="btn btn-xs btn-success" title="Excellent"><span class="hidden-sm hidden-xs">Excellent</span><span class="visible-sm visible-xs">&nbsp;</span></button>
                    <button class="btn btn-xs btn-primary" title="Very Good"><span class="hidden-sm hidden-xs">Very Good</span><span class="visible-sm visible-xs">&nbsp;</span></button>
                    <button class="btn btn-xs btn-info" title="Good"><span class="hidden-sm hidden-xs">Good</span><span class="visible-sm visible-xs">&nbsp;</span></button>
                    <button class="btn btn-xs btn-warning" title="Satisfactory"><span class="hidden-sm hidden-xs">Satisfactory</span><span class="visible-sm visible-xs">&nbsp;</span></button>
                    <button class="btn btn-xs btn-danger" title="Poor"><span class="hidden-sm hidden-xs">Poor</span><span class="visible-sm visible-xs">&nbsp;</span></button>
                </div>
            </h4>
        </div>
        <div id="{{$college->id}}week{{$week}}collapse" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php
                set_time_limit(300);
                $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                ->where('week',$week)
                                                                ->where('semister',$assessment_detail->semester)
                                                                ->where('academic_year',$academic_year->yr)
                                                                ->where('data_type','integer')
                                                                ->get();
                $total_questions = 0;
                $total_college_grade = 0;
                $overall_college_excellent_count = 0;
                $overall_college_very_good_count = 0;
                $overall_college_good_count = 0;
                $overall_college_satisfactory_count = 0;
                $overall_college_poor_count = 0;
                
                $college_departments = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                            ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                            ->join('departments','courses.department_id','=','departments.id')
                                            ->select('departments.id')
                                            ->where('departments.college_id',$college->id)
                                            ->groupBy('departments.id')
                                            ->get();
                ?>
                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    <?php
                    $total_questions++;
                    
                    if(count($college_departments) == 0){
                        ?> 
                        <div class="alert alert-danger text-info"> 
                            <small><strong>All {{$college->id}} courses were not assessed</strong></small>
                        </div>  
                        <?php
                        break;
                    }
                    $total_collage_grade = 0;
                    $college_grade = 0;
                    $total_department_grade = 0;
                    $average_college_excellent_count = 0;
                    $average_college_very_good_count = 0;
                    $average_college_good_count = 0;
                    $average_college_satisfactory_count = 0;
                    $average_college_poor_count = 0;
                    
                    $total_department_excellent_count = 0;
                    $total_department_very_good_count = 0;
                    $total_department_good_count = 0;
                    $total_department_satisfactory_count = 0;
                    $total_department_poor_count = 0;
                    $department_count = 0;
                    foreach($college_departments as $department){
                        $department_courses = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','instructor_assessment.student_enrollment_id','=','student_course_enrollment.id')
                                            ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                            ->join('courses','lecturer_course_assignment.course','=','courses.id')
                                            ->select('courses.id')
                                            ->where('courses.department_id',$department->id)
                                            ->groupBy('courses.id')
                                            ->get();
                        
                        $total_course_grade = 0;
                        $total_course_assessment_count = 0;
                        $total_course_excellent_count = 0;
                        $total_course_very_good_count = 0;
                        $total_course_good_count = 0;
                        $total_course_satisfactory_count = 0;
                        $total_course_poor_count = 0;
                        $department_grade = 0;
                        $course_count = 0;
                        foreach($department_courses as $department_course){
                            $course_excellent_count = DB::table('instructor_assessment')
                                                        ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                        ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                        ->where('lecturer_course_assignment.course',$department_course->id)
                                                        ->where('question_id',$instructor_assessment_question->id)
                                                        ->where('assessment_value',5)
                                                        ->count();
                            $total_course_excellent_count += $course_excellent_count;
                            
                            $course_very_good_count = DB::table('instructor_assessment')
                                                        ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                        ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                        ->where('lecturer_course_assignment.course',$department_course->id)
                                                        ->where('question_id',$instructor_assessment_question->id)
                                                        ->where('assessment_value',4)
                                                        ->count();
                            $total_course_very_good_count += $course_very_good_count;

                            $course_good_count = DB::table('instructor_assessment')
                                                        ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                        ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                        ->where('lecturer_course_assignment.course',$department_course->id)
                                                        ->where('question_id',$instructor_assessment_question->id)
                                                        ->where('assessment_value',3)
                                                        ->count();
                            $total_course_good_count += $course_good_count;

                            $course_satisfactory_count = DB::table('instructor_assessment')
                                                        ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                        ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                        ->where('lecturer_course_assignment.course',$department_course->id)
                                                        ->where('question_id',$instructor_assessment_question->id)
                                                        ->where('assessment_value',2)
                                                        ->count();
                            $total_course_satisfactory_count += $course_satisfactory_count;

                            $course_poor_count = DB::table('instructor_assessment')
                                                        ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                                        ->join('lecturer_course_assignment','student_course_enrollment.enrolled_course_id','=','lecturer_course_assignment.id')
                                                        ->where('lecturer_course_assignment.course',$department_course->id)
                                                        ->where('question_id',$instructor_assessment_question->id)
                                                        ->where('assessment_value',1)
                                                        ->count();
                            $total_course_poor_count += $course_poor_count;

                            $total_course_assessment_count = $course_excellent_count + $course_very_good_count + $course_good_count + $course_satisfactory_count + $course_poor_count;
                            
                            if($total_course_assessment_count != 0){
                                $course_count++;
                                $course_grade = (($course_excellent_count*5 + $course_very_good_count*4 + $course_good_count*3 + $course_satisfactory_count*2 + $course_poor_count*1)/$total_course_assessment_count);
                                $total_course_grade += $course_grade;
                            }
                        }
                    
                      if($course_count != 0){
                            $department_count++;
                            $department_grade = $total_course_grade/$course_count;
                            $total_department_grade += $department_grade;

                            $average_department_excellent_count = ($total_course_excellent_count/count($department_courses));;
                            $total_department_excellent_count += $average_department_excellent_count;

                            $average_department_very_good_count = ($total_course_very_good_count/count($department_courses));
                            $total_department_very_good_count += $average_department_very_good_count;

                            $average_department_good_count = ($total_course_good_count/count($department_courses));
                            $total_department_good_count += $average_department_good_count;

                            $average_department_satisfactory_count = ($total_course_satisfactory_count/count($department_courses));
                            $total_department_satisfactory_count += $average_department_satisfactory_count;

                            $average_department_poor_count = ($total_course_poor_count/count($department_courses));
                            $total_department_poor_count += $average_department_poor_count;

                        }  
                        
                    }
                    
                    
                    if($department_count != 0){
                        $college_grade = $total_department_grade/$department_count;
                        $total_college_grade += $college_grade;
                        
                        $average_college_excellent_count = ($total_department_excellent_count/count($college_departments));
                        $overall_college_excellent_count += $average_college_excellent_count;
                        
                        $average_college_very_good_count = ($total_department_very_good_count/count($college_departments));
                        $overall_college_very_good_count += $average_college_very_good_count;
                        
                        $average_college_good_count = ($total_department_good_count/count($college_departments));
                        $overall_college_good_count += $average_college_good_count;
                        
                        $average_college_satisfactory_count = ($total_department_satisfactory_count/count($college_departments));
                        $overall_college_satisfactory_count += $average_college_satisfactory_count;
                        
                        $average_college_poor_count = ($total_department_poor_count/count($college_departments));
                        $overall_college_poor_count += $average_college_poor_count;
                        
                        Results::instructorAssessments($week.'_'.$college->id.'_'.$instructor_assessment_question->id,$instructor_assessment_question->question,$average_college_excellent_count, $average_college_very_good_count, $average_college_good_count, $average_college_satisfactory_count, $average_college_poor_count, $college_grade);
                    }

                    ?>
                @endforeach
                
                @if($total_college_grade != 0)
                    <?php
                    $Overall_college_grade = $total_college_grade/$total_questions;
                    Results::lecturerAssessment($week.'_'.$college->id,'Average College Assessment',$Overall_college_grade);
                    ?>
                @elseif(count($college_departments) != 0)
                <div class="alert alert-danger">
                    <strong><small>No student assessed any of the courses from this collage</small></strong>
                </div>
                <?php break; ?>
                @endif
            </div>
        </div>
    </div>
</div>