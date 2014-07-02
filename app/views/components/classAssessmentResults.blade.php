<div class="alert alert-success">
    <small>Class Assessment Results done by the <abbr title="">Lecturer</abbr></small>
</div>
<div class="panel-group" id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne">
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
        <div id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseOne" class="panel-collapse collapse">
            <div class="panel-body">
                <?php 
                $class_assessment_questions = AssessmentQuestion::where('question_id','like','a_%')
                                                    ->get();
                $total_assessments = 0;
                $lecture_regards = '';
                $check_assessment = 1;
                ?>
                
                @foreach($class_assessment_questions as $class_assessment_question)
                    <?php 
                    $assessment_value = LecturerCourseAssessment::select(DB::raw(str_replace('_',$week.'_',$class_assessment_question->question_id)." as value"))
                                                    ->where('course_code',$course->course_code)
                                                    ->where('academic_year',$academic_year->academic_year)
                                                    ->first();
                    $value=$assessment_value->value;
                    
                    ?>
                    @if($value >= 1 && $value <=5)
                        <?php $check_assessment = 0; ?>
                        {{Results::classAssessment($class_assessment_question->question,$value)}}
                    @else
                        <?php $lecture_regards = $value; ?>
                    @endif
                @endforeach
                
                @if($check_assessment)
                <div class="alert alert-danger">
                    <small><strong><abbr title="">Lecturer</abbr> has not assessed this course</strong></small>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_accordion" href="#{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseTwo">
                    <small><strong>Lecturer's Regards</strong></small>
                </a>
            </h4>
        </div>
        <div id="{{str_replace(' ','',$course->course_code)}}_{{$week}}_collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <br>
                @if(strlen($lecture_regards) > 0)
                <div class="alert alert-info">
                    <small>{{$lecture_regards}}</small>
                </div>
                @else
                <div class="alert alert-info">
                    <small><abbr title="">Lecturer</abbr> left no comment</small>
                </div>
                @endif
                
            </div>
        </div>
    </div>
</div>