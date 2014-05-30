<div class="alert alert-success">
    <small>Assessment Results done by <abbr title="{{$college->id}}">Students</abbr></small>
</div>
<div class="panel-group" id="{{$college->id}}accordion">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#{{$college->id}}accordion" href="#{{$college->id}}collapse">
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
        <div id="{{$college->id}}_{{$week}}_collapse" class="panel-collapse collapse in">
            <div class="panel-body">
                <?php 
                $instructor_assessment_questions = AssessmentQuestion::where('question_id','like','b_%')
                                                    ->get();
                $total_count = 0;
                $total_excellent_count = 0;
                $total_very_good_count = 0;
                $total_good_count = 0;
                $total_satisfactory_count = 0;
                $total_poor_count = 0;
                ?>
                @foreach($instructor_assessment_questions as $instructor_assessment_question)
                    <?php 
                    $excellent_count = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                    ->where('departments.college_id',$college->id)
                                                    ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),5)
                                                    ->count();
                    $very_good_count = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                    ->where('departments.college_id',$college->id)
                                                    ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),4)
                                                    ->count();
                    $good_count = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                    ->where('departments.college_id',$college->id)
                                                    ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),3)
                                                    ->count();
                    $satisfactory_count = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                    ->where('departments.college_id',$college->id)
                                                    ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),2)
                                                    ->count();
                    $poor_count = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->select(str_replace('_',$week.'_',$instructor_assessment_question->question_id))
                                                    ->where('departments.college_id',$college->id)
                                                    ->where(str_replace('_',$week.'_',$instructor_assessment_question->question_id),1)
                                                    ->count();
                    $course_count = StudentAssessment::join('courses','students_assessments.course_code','=','courses.id')
                                                    ->join('departments','courses.department_id','=','departments.id')
                                                    ->select('students_assessments.course_code','students_assessments.academic_year')
                                                    ->where('departments.college_id',$college->id)
                                                    ->groupBy('students_assessments.course_code')
                                                    ->groupBy('students_assessments.academic_year')
                                                    ->count();
                    
                    if($course_count != 0){
                        $excellent_count = ($excellent_count/$course_count);
                        $very_good_count = ($very_good_count/$course_count);
                        $good_count = ($good_count/$course_count);
                        $satisfactory_count = ($satisfactory_count/$course_count);
                        $poor_count = ($poor_count/$course_count);

                        $total_count = $excellent_count + $very_good_count + $good_count + $satisfactory_count + $poor_count;

                        $total_excellent_count += $excellent_count;
                        $total_very_good_count += $very_good_count;
                        $total_good_count += $good_count;
                        $total_satisfactory_count += $satisfactory_count;
                        $total_poor_count += $poor_count;
                    }
                    
                    ?>
                    @if($total_count != 0)
                        {{Results::lecturerAssessment($week.'_'.$college->id.'_'.$instructor_assessment_question->id,$instructor_assessment_question->question,$excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count)}}
                    @else
                        {{Results::lecturerAssessment($week.'_'.$college->id.'_'.$instructor_assessment_question->id,'Average Collage Assessment',$total_excellent_count, $total_very_good_count, $total_good_count, $total_satisfactory_count, $total_poor_count)}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>