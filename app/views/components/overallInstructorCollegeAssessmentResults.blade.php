<div class="alert alert-success">
    <small>Overall Assessment Results done by <abbr title="{{$college->id}}">Students</abbr></small>
</div>
<div class="panel-group" id="{{$college->id}}accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{$college->id}}accordion" href="#{{$college->id}}collapse">
                    <small>Overall Assessment Results</small>
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
        <div id="{{$college->id}}collapse" class="panel-collapse collapse in">
            <div class="panel-body">
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
                ?>
                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    <?php
                    $total_questions++;
                    $college_departments = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->where('departments.college_id',$college->id)
                                                    //->where('academic_year','2013/14')
                                                    ->select('departments.id')
                                                    ->groupBy('departments.id')
                                                    ->get();
                    if(count($college_departments) == 0){
                        ?> 
                        <div class="alert alert-danger text-info"> 
                            <small><strong>All {{$college->id}} courses were not assessed</strong></small>
                        </div>  
                        <?php
                        break;
                    }
                    $overall_average_college_grade = 0;
                    $average_overall_college_excellent_count = 0;
                    $average_overall_college_very_good_count = 0;
                    $average_overall_college_good_count = 0;
                    $average_overall_college_satisfactory_count = 0;
                    $average_overall_college_poor_count = 0;
                    
                    $total_college_grade = 0;
                    $college_grade = 0;
                    
                    $overall_college_excellent_count = 0;
                    $overall_college_very_good_count = 0;
                    $overall_college_good_count = 0;
                    $overall_college_satisfactory_count = 0;
                    $overall_college_poor_count = 0;
                    
                    for($week = 6; $week < 15; $week += 4){
                        $average_college_excellent_count = 0;
                        $average_college_very_good_count = 0;
                        $average_college_good_count = 0;
                        $average_college_satisfactory_count = 0;
                        $average_college_poor_count = 0;
                        
                        $total_department_grade = 0;
                        $total_department_excellent_count = 0;
                        $total_department_very_good_count = 0;
                        $total_department_good_count = 0;
                        $total_department_satisfactory_count = 0;
                        $total_department_poor_count = 0;
                        $department_count = 0;
                        foreach($college_departments as $department){

                            $department_courses = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                            ->select('students_assessments.course_code')
                                                            ->where('courses.department_id',$department->id)
                                                            //->where('academic_year',$academic_year->academic_year)
                                                            ->groupBy('students_assessments.course_code')
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

                                $course_excellent_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),5)
                                                                ->count();
                                $total_course_excellent_count += $course_excellent_count;

                                $course_very_good_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),4)
                                                                ->count();
                                $total_course_very_good_count += $course_very_good_count;

                                $course_good_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),3)
                                                                ->count();
                                $total_course_good_count += $course_good_count;

                                $course_satisfactory_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                                ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),2)
                                                                ->count();
                                $total_course_satisfactory_count += $course_satisfactory_count;

                                $course_poor_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                               ->where('course_code',$department_course->course_code)
                                                                //->where('academic_year',$academic_year->academic_year)
                                                                ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),1)
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
                        }
                        
                    }
                    
                    $overall_average_college_grade = $total_college_grade/3;
                    $grand_total_college_grade += $overall_average_college_grade;
                    
                    $average_overall_college_excellent_count = $overall_college_excellent_count/3;
                    $grand_total_college_excellent_count += $average_overall_college_excellent_count;
                    
                    $average_overall_college_very_good_count = $overall_college_very_good_count/3;
                    $grand_total_college_very_good_count += $average_overall_college_very_good_count;
                    
                    $average_overall_college_good_count = $overall_college_good_count/3;
                    $grand_total_college_good_count += $average_overall_college_good_count;
                    
                    $average_overall_college_satisfactory_count = $overall_college_excellent_count/3;
                    $grand_total_college_satisfactory_count += $average_overall_college_satisfactory_count;
                    
                    $average_overall_college_poor_count = $overall_college_poor_count/3;
                    $grand_total_college_poor_count += $average_overall_college_poor_count;
                    ?>
                    @if($overall_average_college_grade != 0)
                        {{Results::instructorAssessments($week.'_'.$college->id.'_'.$instructor_assessment_question->id,$instructor_assessment_question->question,$average_overall_college_excellent_count, $average_overall_college_very_good_count, $average_overall_college_good_count, $average_overall_college_satisfactory_count, $average_overall_college_poor_count, $overall_average_college_grade)}}
                    @else
                        <?php
                        $grand_average_college_grade = 0;
                        if($total_questions > 1){
                        $grand_average_college_grade = ($grand_total_college_grade/($total_questions-1));
                        }
                        ?>
                        {{Results::instructorAssessments($week.'_'.$college->id.'_'.$instructor_assessment_question->id,'Overall College Assessment', $grand_total_college_excellent_count, $grand_total_college_very_good_count, $grand_total_college_good_count, $grand_total_college_satisfactory_count, $grand_total_college_poor_count, $grand_average_college_grade)}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>