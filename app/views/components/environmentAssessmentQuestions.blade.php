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
        <tr>
            <td class="text-info">
                Adequacy of space in lecture room for teaching and learning
                @if($errors->has('D1') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('D1') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="D1" value="5" {{(Input::old('D1') && Session::get('global') == $course->course_code)? (Input::old('D1') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D1" value="4" {{(Input::old('D1') && Session::get('global') == $course->course_code)? (Input::old('D1') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D1" value="3" {{(Input::old('D1') && Session::get('global') == $course->course_code)? (Input::old('D1') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D1" value="2" {{(Input::old('D1') && Session::get('global') == $course->course_code)? (Input::old('D1') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D1" value="1" {{(Input::old('D1') && Session::get('global') == $course->course_code)? (Input::old('D1') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Quality of lecture room for teaching and learning
                @if($errors->has('D2') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('D2') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="D2" value="5" {{(Input::old('D2') && Session::get('global') == $course->course_code)? (Input::old('D2') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D2" value="4" {{(Input::old('D2') && Session::get('global') == $course->course_code)? (Input::old('D2') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D2" value="3" {{(Input::old('D2') && Session::get('global') == $course->course_code)? (Input::old('D2') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D2" value="2" {{(Input::old('D2') && Session::get('global') == $course->course_code)? (Input::old('D2') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D2" value="1" {{(Input::old('D2') && Session::get('global') == $course->course_code)? (Input::old('D2') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Adequacy of tables and chairs in classroom
                @if($errors->has('D3') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('D3') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="D3" value="5" {{(Input::old('D3') && Session::get('global') == $course->course_code)? (Input::old('D3') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D3" value="4" {{(Input::old('D3') && Session::get('global') == $course->course_code)? (Input::old('D3') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D3" value="3" {{(Input::old('D3') && Session::get('global') == $course->course_code)? (Input::old('D3') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D3" value="2" {{(Input::old('D3') && Session::get('global') == $course->course_code)? (Input::old('D3') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D3" value="1" {{(Input::old('D3') && Session::get('global') == $course->course_code)? (Input::old('D3') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Quality of tables and chairs in classroom
                @if($errors->has('D4') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('D4') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="D4" value="5" {{(Input::old('D4') && Session::get('global') == $course->course_code)? (Input::old('D4') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D4" value="4" {{(Input::old('D4') && Session::get('global') == $course->course_code)? (Input::old('D4') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D4" value="3" {{(Input::old('D4') && Session::get('global') == $course->course_code)? (Input::old('D4') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D4" value="2" {{(Input::old('D4') && Session::get('global') == $course->course_code)? (Input::old('D4') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D4" value="1" {{(Input::old('D4') && Session::get('global') == $course->course_code)? (Input::old('D4') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Physical conditions of blackboard/whiteboard in classroom
                Instructor’s capacity to provide timely feedback on assignments and tests
                @if($errors->has('D5') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('D5') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="D5" value="5" {{(Input::old('D5') && Session::get('global') == $course->course_code)? (Input::old('D5') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D5" value="4" {{(Input::old('D5') && Session::get('global') == $course->course_code)? (Input::old('D5') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D5" value="3" {{(Input::old('D5') && Session::get('global') == $course->course_code)? (Input::old('D5') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D5" value="2" {{(Input::old('D5') && Session::get('global') == $course->course_code)? (Input::old('D5') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D5" value="1" {{(Input::old('D5') && Session::get('global') == $course->course_code)? (Input::old('D5') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Adequacy of lighting in the classroom
                @if($errors->has('D6') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('D6') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="D6" value="5" {{(Input::old('D6') && Session::get('global') == $course->course_code)? (Input::old('D6') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D6" value="4" {{(Input::old('D6') && Session::get('global') == $course->course_code)? (Input::old('D6') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D6" value="3" {{(Input::old('D6') && Session::get('global') == $course->course_code)? (Input::old('D6') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D6" value="2" {{(Input::old('D6') && Session::get('global') == $course->course_code)? (Input::old('D6') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D6" value="1" {{(Input::old('D6') && Session::get('global') == $course->course_code)? (Input::old('D6') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Availability of books and journals related to the course
                @if($errors->has('D7') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('D7') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="D7" value="5" {{(Input::old('D7') && Session::get('global') == $course->course_code)? (Input::old('D7') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D7" value="4" {{(Input::old('D7') && Session::get('global') == $course->course_code)? (Input::old('D7') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D7" value="3" {{(Input::old('D7') && Session::get('global') == $course->course_code)? (Input::old('D7') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D7" value="2" {{(Input::old('D7') && Session::get('global') == $course->course_code)? (Input::old('D7') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="D7" value="1" {{(Input::old('D7') && Session::get('global') == $course->course_code)? (Input::old('D7') == '1')? 'checked':'' :''}}></td>
        </tr>
            <td colspan="6" class="text-info">
               Please give additional comments, if any, on the learning environment and facilities
               <input class="form-control" type="text" name='D8' value="{{(Input::old('D8') && Session::get('global') == $course->course_code)? e(Input::old('D8')):''}}">
            </td>
        </tr>
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