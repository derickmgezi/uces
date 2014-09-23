<div class="alert alert-success">
    <small>Overall Assessment Results done by the Lecturer</small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne">
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
        <div id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php 
                $class_assessment_questions = AssessmentQuestion::where('question_id','like','a_%')
                                                    ->get();
                $question_count = 0;
                $total_average_assessment_value = 0;
                ?>
                @foreach($class_assessment_questions as $class_assessment_question)
                    @if($class_assessment_question->data_type == 'integer')
                        <?php
                        $question_count++;
                        $assessment_value_week_6 = LecturerCourseAssessment::select(str_replace('_','6_',$class_assessment_question->question_id).' as value')
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->pluck('value');
                        $assessment_value_week_10 = LecturerCourseAssessment::select(str_replace('_','10_',$class_assessment_question->question_id).' as value')
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->pluck('value');
                        $assessment_value_week_14 = LecturerCourseAssessment::select(str_replace('_','14_',$class_assessment_question->question_id).' as value')
                                                        ->where('course_code',$course->course_code)
                                                        ->where('academic_year',$academic_year->academic_year)
                                                        ->pluck('value');
                        $average_assessment_value = ($assessment_value_week_6 + $assessment_value_week_10 +$assessment_value_week_14)/3;

                        $total_average_assessment_value += $average_assessment_value;
                        
                        Results::classAssessment($class_assessment_question->question, $average_assessment_value);
                        ?>
                    @endif
                @endforeach
                <?php
                    if($question_count !=0){
                    $overall_average_class_assessment = $total_average_assessment_value/$question_count;
                    Results::classAssessment('Overall Average Class Assessment',$overall_average_class_assessment);
                    }
                ?>
            </div>
        </div>
    </div>
</div>