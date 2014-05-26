<div class="alert alert-success">
    <small>Assessment Results done by <abbr title="{{$course->course_code}} Class">Students</abbr></small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}courseaccordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}courseaccordion" href="#{{str_replace(' ','',$course->course_code)}}collapseOne">
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
        <div id="{{str_replace(' ','',$course->course_code)}}collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <?php 
                $instructor_assessment_questions = AssessmentQuestion::where('question_id','like','b_%')
                                                    ->get();
                $tota_count = 0;
                ?>

                @foreach($instructor_assessment_questions as $instructor_assessment_question)
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
                    ?>
                    @if($total_count != 0)
                        {{Results::lecturerAssessment(str_replace('/','-',$academic_year->academic_year).'_'.$week.'_'.str_replace(' ','',$course->course_code).''.$instructor_assessment_question->id,$instructor_assessment_question->question,$excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count)}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}courseaccordion" href="#{{str_replace(' ','',$course->course_code)}}collapseTwo">
                    <small>Student's Regards</small>
                </a>
            </h4>
        </div>
        <div id="{{str_replace(' ','',$course->course_code)}}collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <br>
                <?php
               // $student_regards = 
                ?>
                
                <div class="alert alert-info">
                    <small><abbr title="{{$course->course_code}} Class">Students</abbr> left no comment</small>
                </div>
            </div>
        </div>
    </div>
</div>