<div class="alert alert-success">
    <small>Overall Assessment Results done by the Lecturer</small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course)}}_{{$week}}_collapseOne">
                    <small>Overall Assessment Results</small>
                </a>
                <div class="pull-right">
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
                $class_assessment_questions = AssessmentQuestion::where('section','D')
                                                                ->where('semister',$assessment_detail->semester)
                                                                ->where('academic_year',$academic_year->yr)
                                                                ->groupBy('question')
                                                                ->orderBy('id')
                                                                ->get();
                $assignment_id = LecturerCourseAssignment::where('course',$course->course)->where('semister',$assessment_detail->semester)->where('yr',$academic_year->yr)->pluck('id');
                
                $question_count = 0;
                $total_average_assessment_value = 0;
                ?>
                @foreach($class_assessment_questions as $class_assessment_question)
                    @if($class_assessment_question->data_type == 'integer')
                        <?php
                        $question_count++;
                        $assessment_value_week_6 = ClassAssessment::join('assessment_questions','assessment_questions.id','=','class_assessment.question_id')
                                                                ->where('assessment_questions.question',$class_assessment_question->question)
                                                                ->where('class_assessment.assignment_id',$assignment_id)
                                                                ->where('assessment_questions.week',6)
                                                                ->pluck('assessment_value');
                        
                        $assessment_value_week_10 = ClassAssessment::join('assessment_questions','assessment_questions.id','=','class_assessment.question_id')
                                                                ->where('assessment_questions.question',$class_assessment_question->question)
                                                                ->where('class_assessment.assignment_id',$assignment_id)
                                                                ->where('assessment_questions.week',10)
                                                                ->pluck('assessment_value');
                        
                        $assessment_value_week_14 = ClassAssessment::join('assessment_questions','assessment_questions.id','=','class_assessment.question_id')
                                                                ->where('assessment_questions.question',$class_assessment_question->question)
                                                                ->where('class_assessment.assignment_id',$assignment_id)
                                                                ->where('assessment_questions.week',14)
                                                                ->pluck('assessment_value');
                        
                        $average_assessment_value = ($assessment_value_week_6 + $assessment_value_week_10 +$assessment_value_week_14)/3;

                        $total_average_assessment_value += $average_assessment_value;
                        
                        Results::classAssessment($class_assessment_question->question, $average_assessment_value);
                        ?>
                    @endif
                @endforeach
                
                @if($total_average_assessment_value !=0)
                <?php   
                    $overall_average_class_assessment = $total_average_assessment_value/$question_count;
                    Results::classAssessment('Overall Class Assessment',$overall_average_class_assessment);
                ?>
                @else
                    <div class="alert alert-danger">
                        <small class="text-danger"><strong>This Class was never assessed by the Lecturer</strong></small>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>