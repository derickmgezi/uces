<div class="alert alert-success">
    <small>Assessment Results done by <abbr title="{{$course->course_code}} Class">Students</abbr></small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne">
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
        <div id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <?php 
                $instructor_assessment_questions = AssessmentQuestion::where('question_id','like','b_%')
                                                    ->get();
                $total_excellent_count = 0;
                $total_very_good_count = 0;
                $total_good_count = 0;
                $total_satisfactory_count = 0;
                $total_poor_count = 0;
                $grand_total_count = 0;
                
                $comments = array();
                ?>

                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    @if($instructor_assessment_question->data_type == 'integer')
                        <?php 
                        $excellent_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),5)
                                                        ->count();
                        $very_good_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),4)
                                                        ->count();
                        $good_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),3)
                                                        ->count();
                        $satisfactory_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),2)
                                                        ->count();
                        $poor_count = StudentAssessment::select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),1)
                                                        ->count();

                        $total_count = $excellent_count + $very_good_count + $good_count + $satisfactory_count + $poor_count;

                        $total_excellent_count += $excellent_count;
                        $total_very_good_count += $very_good_count;
                        $total_good_count += $good_count;
                        $total_satisfactory_count += $satisfactory_count;
                        $total_poor_count += $poor_count;
                        
                        if($total_count != 0){
                            Results::lecturerAssessment(str_replace('/','-',$academic_year->academic_year).'_'.$week.'_'.str_replace(' ','',$course->course_code).''.$instructor_assessment_question->id,$instructor_assessment_question->question,$excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count);
                        }
                        ?>
                    @elseif($instructor_assessment_question->data_type == 'string')
                        <?php
                        $grand_total_count = $total_excellent_count + $total_very_good_count + $total_good_count + $total_satisfactory_count + $total_poor_count;
                        if($grand_total_count != 0){
                            Results::lecturerAssessment(str_replace('/','-',$academic_year->academic_year).'_'.$week.'_'.str_replace(' ','',$course->course_code).''.$instructor_assessment_question->id,'Average Instructor Assessment',$total_excellent_count, $total_very_good_count, $total_good_count, $total_satisfactory_count, $total_poor_count);
                            break;
                        }else{ 
                            ?><div class="alert alert-danger" role="alert"><small><strong>No student assessed this course</strong></small></div><?php
                            break;
                        }
                        ?>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <?php
    $student_regards = StudentAssessment::select(DB::raw(str_replace('_',$week.'_',$instructor_assessment_question->question_id)." as comment"))
                                        ->where('course_code',$course->course_code)
                                        ->where('academic_year',$academic_year->academic_year)
                                        ->get();
    $comment_count = 0;
    foreach($student_regards as $student_regard){

        if(strlen($student_regard->comment) > 0){
            $comments[$comment_count] = $student_regard->comment;
            $comment_count++;
        }
    }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseTwo">
                    <small>Student's Regards</small>
                </a>
            </h4>
        </div>
        <div id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                @if(count($comments) > 0)
                    @for($count = 0; $count < count($comments); $count++)
                    <div class="alert alert-info">
                        <small>{{$comments[$count]}}</small>
                    </div>
                    @endfor
                @else
                <br>
                <div class="alert alert-warning">
                    <small class="text-danger"><abbr title="{{$course->course_code}} Class">Students</abbr> left no comment</small>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>