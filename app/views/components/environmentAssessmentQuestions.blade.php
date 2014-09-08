<div class="alert alert-{{(count($errors) > 0 && Session::get('global') == $course->course_code)? 'danger':'info'}}">
    <small>
        <abbr title="Fill all the fields">Please take your time and carefully provide information on the various issues raised below.</abbr><br>
        5=Excellent; 4=Very Good; 3=Satisfactory; 2=Poor; 1=Very Poor
    </small>
</div>
<form class="table-responsive" method="post" action="assessEnvironment">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-success">Part C: The Learning Environment and Facilities</th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
            </tr>
        </thead>
        <?php 
        $list_of_questions = AssessmentQuestion::where('question_id','like','d_%')
                                                ->get();
        ?>
        @foreach($list_of_questions as $question)
        <?php 
        $question_id = str_replace('_0', '', $question->question_id);
        $question_id = strtoupper (str_replace('_', '', $question_id));
        ?>
            @if($question->data_type == 'integer')
                <tr>
                    <td class="text-info">
                        {{$question->question}}
                        @if($errors->has($question_id) && Session::get('global') == $course->course_code)
                        <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                        @elseif(Input::old($question_id) && Session::get('global') == $course->course_code)
                        <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                        @endif
                    </td>
                    <td><input type="radio" name="{{$question_id}}" value="5" {{(Input::old($question_id) && Session::get('global') == $course->course_code)? (Input::old($question_id) == '5')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="4" {{(Input::old($question_id) && Session::get('global') == $course->course_code)? (Input::old($question_id) == '4')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="3" {{(Input::old($question_id) && Session::get('global') == $course->course_code)? (Input::old($question_id) == '3')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="2" {{(Input::old($question_id) && Session::get('global') == $course->course_code)? (Input::old($question_id) == '2')? 'checked':'' :''}}></td>
                    <td><input type="radio" name="{{$question_id}}" value="1" {{(Input::old($question_id) && Session::get('global') == $course->course_code)? (Input::old($question_id) == '1')? 'checked':'' :''}}></td>
                </tr>
            @elseif($question->data_type == 'string')
                <tr>
                    <td colspan="6" class="text-info">
                        {{$question->question}}
                        <input class="form-control" type="text" name='{{$question_id}}' value="{{(Input::old($question_id) && Session::get('global') == $course->course_code)? e(Input::old($question_id)):''}}">
                    </td>
                </tr>
            @endif
        @endforeach
        <tr>
            <td colspan="6" align="right">
                <button name="environment_assessment" type="submit" class="btn btn-primary btn-sm">Finish</button>
            </td>
        </tr>
        <tr hidden>
            <td colspan="" align="center">
                <input class="pull-left" type="text" name="course_code" value="{{$course->course_code}}" >
                <input type="text" name="week" value="{{$week}}" >
                <input class="pull-right" type="text" name="academic_year" value="{{$academic_year->academic_year}}" >
            </td>
        </tr>
    </table>
</form>