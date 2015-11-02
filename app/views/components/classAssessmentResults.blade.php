<div class="alert alert-success">
    <small>Class Assessment Results done by the <abbr title="">Lecturer</abbr></small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course)}}_{{$week}}_collapseOne">
                    <small><strong>Assessment Results</strong></small>
                </a>
                <div class="pull-right">
                    <small>KEY</small>&nbsp;
                    <button class="btn btn-xs btn-success" title="Excellent"><span class="hidden-xs">Excellent</span><span class="visible-xs">&nbsp</span></button>
                    <button class="btn btn-xs btn-primary" title="Very Good"><span class="hidden-xs">Very Good</span><span class="visible-xs">&nbsp</span></button>
                    <button class="btn btn-xs btn-info" title="Good"><span class="hidden-xs">Good</span><span class="visible-xs">&nbsp</span></button>
                    <button class="btn btn-xs btn-warning" title="Satisfactory"><span class="hidden-xs">Satisfactory</span><span class="visible-xs">&nbsp</span></button>
                    <button class="btn btn-xs btn-danger" title="Poor"><span class="hidden-xs">Poor</span><span class="visible-xs">&nbsp</span></button>
                </div>
            </h4>
        </div>
        <div id="{{str_replace(' ','',$course->course)}}_{{$week}}_collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <?php 
                $class_assessment_questions = AssessmentQuestion::where('section','D')
                                                                ->where('week',$week)
                                                                ->where('semister',$assessment_detail->semester)
                                                                ->where('academic_year',$academic_year->yr)
                                                                ->get();
                $assignment_id = LecturerCourseAssignment::where('course',$course->course)->where('semister',$assessment_detail->semester)->where('yr',$academic_year->yr)->pluck('id');
                $lecture_regards = '';
                $question_count = 0;
                $total_value = 0;
                ?>
                
                @foreach($class_assessment_questions as $class_assessment_question)
                    <?php
                    if($class_assessment_question->data_type == 'integer'){
                        $question_count++;
                        $assessment_value = ClassAssessment::where('question_id',$class_assessment_question->id)
                                                            ->where('assignment_id',$assignment_id)
                                                            ->pluck('assessment_value');
                        if($assessment_value >= 1 && $assessment_value <=5){
                            $total_value += $assessment_value;
                            Results::classAssessment($class_assessment_question->question,$assessment_value);
                        }else{
                            ?>
                                <div class="alert alert-danger">
                                    <small><strong><abbr title="">Lecturer</abbr> has not assessed this course</strong></small>
                                </div>
                            <?php
                            break;
                        }
                    }?>
                @endforeach
                
                @if($question_count != 0)
                    <?php
                    $average_value = $total_value/$question_count;
                    Results::classAssessment('Average Class Assessment',$average_value);
                    ?>
                @endif
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course)}}_{{$week}}_collapseTwo">
                    <small><strong>Lecturer's Regards</strong></small>
                </a>
            </h4>
        </div>
        <div id="{{str_replace(' ','',$course->course)}}_{{$week}}_collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <br>
                <?php $comment_count = 0; ?>
                @foreach($class_assessment_questions as $class_assessment_question)
                    @if($class_assessment_question->data_type == 'string')
                    <?php $lecture_regards = ClassAssessment::where('question_id',$class_assessment_question->id)->where('assignment_id',$assignment_id)->pluck('assessment_value'); ?>
                        @if(strlen($lecture_regards) > 0)
                            <?php $comment_count++; ?>
                            <div class="alert alert-info">
                                <small>{{$lecture_regards}}</small>
                            </div>
                        @endif
                    @endif
                @endforeach
                
                @if($comment_count == 0)
                <div class="alert alert-danger">
                    <small><abbr title="">Lecturer</abbr> left no comment</small>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>