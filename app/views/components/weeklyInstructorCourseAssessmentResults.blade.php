<div class="alert alert-success">
    <small>Assessment Results done by <abbr title="{{$course->course}} Class">Students</abbr></small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course)}}_{{$week}}_collapseOne">
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
        <div id="{{str_replace(' ','',$course->course)}}_{{$week}}_collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <?php 
                $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                ->where('week',$week)
                                                                ->where('semister',$assessment_detail->semester)
                                                                ->where('academic_year',$academic_year->yr)
                                                                ->where('data_type','integer')
                                                                ->get();
                $assignment_id = LecturerCourseAssignment::where('course',$course->course)->where('semister',$assessment_detail->semester)->where('yr',$academic_year->yr)->pluck('id');
                
                $question_count = 0;
                $grade_total = 0;
                
                $total_excellent_count = 0;
                $total_very_good_count = 0;
                $total_good_count = 0;
                $total_satisfactory_count = 0;
                $total_poor_count = 0;
                $grand_total_count = 0;
                ?>

                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    @if($instructor_assessment_question->data_type == 'integer')
                        <?php
                        $question_count++;
                        $excellent_count = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question_id',$instructor_assessment_question->id)
                                            ->where('assessment_value',5)
                                            ->count();
                        $very_good_count = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question_id',$instructor_assessment_question->id)
                                            ->where('assessment_value',4)
                                            ->count();
                        $good_count = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question_id',$instructor_assessment_question->id)
                                            ->where('assessment_value',3)
                                            ->count();
                        $satisfactory_count = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question_id',$instructor_assessment_question->id)
                                            ->where('assessment_value',2)
                                            ->count();
                        $poor_count = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question_id',$instructor_assessment_question->id)
                                            ->where('assessment_value',1)
                                            ->count();

                        $total_assessment_count = $excellent_count + $very_good_count + $good_count + $satisfactory_count + $poor_count;
                        
                        $grade=0;
                        if($total_assessment_count !=0){
                            //Generating scale value
                            $grade = (($excellent_count*5 + $very_good_count*4 + $good_count*3 + $satisfactory_count*2 +$poor_count*1)/$total_assessment_count);
                            
                            Results::lecturerAssessment(str_replace('/','-',$academic_year->yr).'_'.$week.'_'.str_replace(' ','',$course->course).''.$instructor_assessment_question->id,$instructor_assessment_question->question,$grade);
                        }
                        
                        $grade_total += $grade;
                        ?>
                    @endif
                @endforeach
                
                <?php
                if($grade_total != 0){
                    //Generating grand scale value
                    $grand_grade = $grade_total/$question_count;
                    Results::lecturerAssessment(str_replace('/','-',$academic_year->yr).'_'.$week.'_'.str_replace(' ','',$course->course).'average','Average Instructor Assessment',$grand_grade);
                }else{ 
                    ?><div class="alert alert-danger" role="alert"><small><strong>No student assessed this course</strong></small></div><?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course)}}_{{$week}}_collapseTwo">
                    <small>Student's Regards</small>
                </a>
            </h4>
        </div>
        <div id="{{str_replace(' ','',$course->course)}}_{{$week}}_collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php
                $assessment_comments = AssessmentQuestion::where('section','A')
                                                    ->where('week',$week)
                                                    ->where('semister',$assessment_detail->semester)
                                                    ->where('academic_year',$academic_year->yr)
                                                    ->where('data_type','string')
                                                    ->get();
                $comment_count = 0;
                ?>
                @if(count($assessment_comments) > 0)
                    @foreach($assessment_comments as $assessment_comment)
                        <?php 
                        $student_regards = DB::table('instructor_assessment')
                                            ->join('student_course_enrollment','student_course_enrollment.id','=','instructor_assessment.student_enrollment_id')
                                            ->where('enrolled_course_id',$assignment_id)
                                            ->where('question_id',$assessment_comment->id)
                                            ->get();
                        ?>
                        @foreach($student_regards as $student_regard)
                            @if(strlen($student_regard->assessment_value) > 0)
                            <div class="alert alert-info">
                                <small>{{$student_regard->assessment_value}}</small>
                            </div>
                            <?php $comment_count++; ?>
                            @endif
                        @endforeach
                    @endforeach
                    @if($comment_count == 0)
                    <br>
                    <div class="alert alert-warning">
                        <small class="text-danger"><abbr title="{{$course->course}} Class">Students</abbr> left no comments</small>
                    </div>
                    @endif
                @else
                <br>
                <div class="alert alert-warning">
                    <small class="text-danger"><abbr title="{{$course->course}} Class">Comment</abbr> part was excluded</small>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>