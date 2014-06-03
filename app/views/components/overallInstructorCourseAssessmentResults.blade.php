<div class="alert alert-success">
    <small>Overall Assessment Results done by <abbr title="{{$course->course_code}} Class">Students</abbr></small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne">
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
        <div id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php 
                $instructor_assessment_questions = AssessmentQuestion::where('question_id','like','b_%')
                                                    ->get();
                $total_average_excellent_count = 0;
                $total_average_very_good_count = 0;
                $total_average_good_count = 0;
                $total_average_satisfactory_count = 0;
                $total_average_poor_count = 0;
                
                $comments = array();
                ?>

                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    <?php 
                    $excellent_count_6 = StudentAssessment::select(str_replace('_','6_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','6_',$instructor_assessment_question->question_id),5)
                                                    ->count();
                    $excellent_count_10 = StudentAssessment::select(str_replace('_','10_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','10_',$instructor_assessment_question->question_id),5)
                                                    ->count();
                    $excellent_count_14 = StudentAssessment::select(str_replace('_','14_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','14_',$instructor_assessment_question->question_id),5)
                                                    ->count();
                    $average_excellent_count = ($excellent_count_6 + $excellent_count_10 +$excellent_count_14)/3;
                    
                    $very_good_count_6 = StudentAssessment::select(str_replace('_','6_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','6_',$instructor_assessment_question->question_id),4)
                                                    ->count();
                    $very_good_count_10 = StudentAssessment::select(str_replace('_','10_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','10_',$instructor_assessment_question->question_id),4)
                                                    ->count();
                    $very_good_count_14 = StudentAssessment::select(str_replace('_','14_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','14_',$instructor_assessment_question->question_id),4)
                                                    ->count();
                    $average_very_good_count = ($very_good_count_6 + $very_good_count_10 + $very_good_count_14)/3;
                    
                    $good_count_6 = StudentAssessment::select(str_replace('_','6_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','6_',$instructor_assessment_question->question_id),3)
                                                    ->count();
                    $good_count_10 = StudentAssessment::select(str_replace('_','10_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','10_',$instructor_assessment_question->question_id),3)
                                                    ->count();
                    $good_count_14 = StudentAssessment::select(str_replace('_','14_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','14_',$instructor_assessment_question->question_id),3)
                                                    ->count();
                    $average_good_count = ($good_count_6 + $good_count_10 + $good_count_14)/3;
                    
                    $satisfactory_count_6 = StudentAssessment::select(str_replace('_','6_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','6_',$instructor_assessment_question->question_id),2)
                                                    ->count();
                    $satisfactory_count_10 = StudentAssessment::select(str_replace('_','10_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','10_',$instructor_assessment_question->question_id),2)
                                                    ->count();
                    $satisfactory_count_14 = StudentAssessment::select(str_replace('_','14_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','14_',$instructor_assessment_question->question_id),2)
                                                    ->count();
                    $average_satisfactory_count = ($satisfactory_count_6 + $satisfactory_count_10 + $satisfactory_count_14)/3;
                    
                    $poor_count_6 = StudentAssessment::select(str_replace('_','6_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','6_',$instructor_assessment_question->question_id),1)
                                                    ->count();
                    $poor_count_10 = StudentAssessment::select(str_replace('_','10_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','10_',$instructor_assessment_question->question_id),1)
                                                    ->count();
                    $poor_count_14 = StudentAssessment::select(str_replace('_','14_',$instructor_assessment_question->question_id))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->where(str_replace('_','14_',$instructor_assessment_question->question_id),1)
                                                    ->count();
                    $average_poor_count = ($poor_count_6 + $poor_count_10 + $poor_count_14)/3;
                    
                    $total_average_count = $average_excellent_count + $average_very_good_count + $average_good_count + $average_satisfactory_count + $average_poor_count;
                    
                    $total_average_excellent_count += $average_excellent_count;
                    $total_average_very_good_count += $average_very_good_count;
                    $total_average_good_count += $average_good_count;
                    $total_average_satisfactory_count += $average_satisfactory_count;
                    $total_average_poor_count += $average_poor_count;
                    ?>
                    @if($total_average_count != 0)
                        {{Results::lecturerAssessment(str_replace('/','-',$academic_year->academic_year).'_'.$week.'_'.str_replace(' ','',$course->course_code).''.$instructor_assessment_question->id,$instructor_assessment_question->question,$average_excellent_count, $average_very_good_count, $average_good_count, $average_satisfactory_count, $average_poor_count)}}
                    @else
                        {{Results::lecturerAssessment(str_replace('/','-',$academic_year->academic_year).'_'.$week.'_'.str_replace(' ','',$course->course_code).''.$instructor_assessment_question->id,'Overall Instructor Assessment',$total_average_excellent_count, $total_average_very_good_count, $total_average_good_count, $total_average_satisfactory_count, $total_average_poor_count)}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>