<div class="alert alert-success">
    <small>Overall Assessment Results done by <abbr title="{{$course->course}} Class">Students</abbr></small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course)}}_{{$week}}_collapseOne">
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
        <div id="{{str_replace(' ','',$course->course)}}_{{$week}}_collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php
                $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                ->where('semister',$assessment_detail->semester)
                                                                ->where('academic_year',$academic_year->yr)
                                                                ->where('data_type','integer')
                                                                ->groupBy('question')
                                                                ->orderBy('id','asc')
                                                                ->get();
                $assignment_id = LecturerCourseAssignment::where('course',$course->course)->where('semister',$assessment_detail->semester)->where('yr',$academic_year->yr)->pluck('id');
                
                $total_grand_average_grade = 0;
                $question_count = 0;
                $comments = array();
                ?>

                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    <?php 
                    $question_count++;
                    
                    $excellent_count_6 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',6)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',5)
                                            ->count();
                    
                    $very_good_count_6 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',6)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',4)
                                            ->count();
                    
                    $good_count_6 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',6)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',3)
                                            ->count();
                    
                    $satisfactory_count_6 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',6)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',2)
                                            ->count();
                    
                    $poor_count_6 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',6)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',1)
                                            ->count();
                    
                    $total_assessment_count_6 = $excellent_count_6 + $very_good_count_6 + $good_count_6 + $satisfactory_count_6 + $poor_count_6;  
                    
                    $grade_6 = 0;
                        if($total_assessment_count_6 !=0){
                            //Generating scale value
                            $grade_6 = (($excellent_count_6*5 + $very_good_count_6*4 + $good_count_6*3 + $satisfactory_count_6*2 +$poor_count_6*1)/$total_assessment_count_6);
                        }
                    
                    $excellent_count_10 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',10)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',5)
                                            ->count();
                    
                    $very_good_count_10 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',10)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',4)
                                            ->count();
                    
                    $good_count_10 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',10)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',3)
                                            ->count();
                    
                    $satisfactory_count_10 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',10)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',2)
                                            ->count();
                    
                    $poor_count_10 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',10)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',1)
                                            ->count();
                    
                    $total_assessment_count_10 = $excellent_count_10 + $very_good_count_10 + $good_count_10 + $satisfactory_count_10 + $poor_count_10;
                    
                    $grade_10 = 0;
                        if($total_assessment_count_10 !=0){
                            //Generating scale value
                            $grade_10 = (($excellent_count_10*5 + $very_good_count_10*4 + $good_count_10*3 + $satisfactory_count_10*2 +$poor_count_10*1)/$total_assessment_count_10);
                        }
                    
                    $excellent_count_14 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',14)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',5)
                                            ->count();
                    
                    $very_good_count_14 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',14)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',4)
                                            ->count();
                    
                    $good_count_14 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',14)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',3)
                                            ->count();
                     
                    $satisfactory_count_14 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',14)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',2)
                                            ->count();
                    
                    $poor_count_14 = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->join('assessment_questions','assessment_questions.id','=','instructor_assessment.question_id')
                                            ->where('week',14)
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question',$instructor_assessment_question->question)
                                            ->where('assessment_value',1)
                                            ->count();
                    
                    $total_assessment_count_14 = $excellent_count_14 + $very_good_count_14 + $good_count_14 + $satisfactory_count_14 + $poor_count_14;
                    
                    $grade_14 = 0;
                        if($total_assessment_count_14 !=0){
                            //Generating scale value
                            $grade_14 = (($excellent_count_14*5 + $very_good_count_14*4 + $good_count_14*3 + $satisfactory_count_14*2 +$poor_count_14*1)/$total_assessment_count_14);
                        }
                    
                    $grand_average_grade = 0;
                    if($total_assessment_count_6 != 0 && $total_assessment_count_10 != 0 && $total_assessment_count_14 != 0){
                        $grand_average_grade = ($grade_6 + $grade_10 + $grade_14)/3;
                        Results::lecturerAssessment(str_replace('/','-',$academic_year->yr).'_'.$week.'_'.str_replace(' ','',$course->course).''.$instructor_assessment_question->id,$instructor_assessment_question->question,$grand_average_grade);
                    }
                    
                    $total_grand_average_grade += $grand_average_grade;
                    
                    ?>
                @endforeach
                
                @if($total_grand_average_grade != 0)
                 <?php
                    $overall_average_grade = $total_grand_average_grade/$question_count;
                    Results::lecturerAssessment(str_replace('/','-',$academic_year->yr).'_'.$week.'_'.str_replace(' ','',$course->course).''.$instructor_assessment_question->id,'Overall Instructor Assessment',$overall_average_grade);
                 ?>
                @endif
            </div>
        </div>
    </div>
</div>