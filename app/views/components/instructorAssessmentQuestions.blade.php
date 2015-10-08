<div class="alert alert-{{(count($errors) > 0 && Session::get('global') == $course->course)? 'danger':'info'}}">
    <small>
        <abbr title="Fill all the fields"><strong>Please take your time and carefully provide your view by checking in all fields below.</strong></abbr><br>
        5=Excellent; 4=Very Good; 3=Satisfactory; 2=Poor; 1=Very Poor
    </small>
</div>
<form class="table-responsive" method="post" action="assessInstructor">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-success">Part A: The Instructor</th>
                <th class="text-success">5</th>
                <th class="text-primary">4</th>
                <th class="text-info">3</th>
                <th class="text-warning">2</th>
                <th class="text-danger">1</th>
            </tr>
        </thead>
        <?php 
        $list_of_questions = AssessmentQuestion::where('section','A')
                                                ->where('week',$week)
                                                ->where('semister',$assessment_detail->semester)
                                                ->where('academic_year',$academic_year->yr)
                                                ->orderBy('data_type')
                                                ->get();
        ?>
        @foreach($list_of_questions as $question)
        <?php 
        $question_id = 'A'.$question->id;
        ?>
            @if($question->data_type == 'integer')
                <tr>
                    <td class="text-info">
                        {{$question->question}}
                        @if($errors->has($question_id) && Session::get('global') == $course->course)
                        <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                        @elseif(Input::old($question_id) && Session::get('global') == $course->course)
                        <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                        @endif
                    </td>
                    <td><input type="radio" name="{{$question_id}}" value="5" {{(Input::old($question_id) && Session::get('global') == $course->course)? (Input::old($question_id) == '5')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="4" {{(Input::old($question_id) && Session::get('global') == $course->course)? (Input::old($question_id) == '4')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="3" {{(Input::old($question_id) && Session::get('global') == $course->course)? (Input::old($question_id) == '3')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="2" {{(Input::old($question_id) && Session::get('global') == $course->course)? (Input::old($question_id) == '2')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="1" {{(Input::old($question_id) && Session::get('global') == $course->course)? (Input::old($question_id) == '1')? 'checked':'' :''}}></td>
                </tr>
            @elseif($question->data_type == 'string')
                <tr>
                    <td colspan="6" class="text-info">
                        {{$question->question}}
                        <input class="form-control" type="text" name='{{$question_id}}' value="{{(Input::old($question_id) && Session::get('global') == $course->course)? e(Input::old($question_id)):''}}">
                    </td>
                </tr>
            @endif
        @endforeach
        <tr>
            <td colspan="6" align="right"><button name="instructor_assessment" type="submit" class="btn btn-primary btn-sm">Continue</button></td>
        </tr>
        <tr hidden>
            <td colspan="" align="center">
                <input class="pull-left" type="text" name="course_code" value="{{$course->course}}" >
                <input type="text" name="enrollment_id" value="{{$enrollment_id}}" >
                <input type="text" name="week" value="{{$week}}" >
                <input type="text" name="semister" value="{{$assessment_detail->semester}}" >
                <input class="pull-right" type="text" name="academic_year" value="{{$academic_year->yr}}" >
            </td>
        </tr>
    </table>
</form>