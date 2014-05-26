<div class="alert alert-{{(count($errors) > 0)? 'danger':'info'}}">
    <small>
        <abbr title="Fill all the fields">Please take your time and carefully provide information on the various issues raised below.</abbr><br>
        5=Excellent; 4=Very Good; 3=Satisfactory; 2=Poor; 1=Very Poor
    </small>
</div>
<form class="table-responsive" method="post" action="assessClass">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-success">Assess Class</th>
                <th class="">5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
            </tr>
        </thead>
        <tr>
            <td class="text-info">
                Class’ preparedness on the subject matter
                @if($errors->has('A1') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A1') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A1" value="5" {{(Input::old('A1') && Session::get('global') == $course->course_code)? (Input::old('A1') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A1" value="4" {{(Input::old('A1') && Session::get('global') == $course->course_code)? (Input::old('A1') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A1" value="3" {{(Input::old('A1') && Session::get('global') == $course->course_code)? (Input::old('A1') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A1" value="2" {{(Input::old('A1') && Session::get('global') == $course->course_code)? (Input::old('A1') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A1" value="1" {{(Input::old('A1') && Session::get('global') == $course->course_code)? (Input::old('A1') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Class’ possession of up-to-date skills and knowledge in the subject matter
                @if($errors->has('A2') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A2') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A2" value="5" {{(Input::old('A2') && Session::get('global') == $course->course_code)? (Input::old('A2') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A2" value="4" {{(Input::old('A2') && Session::get('global') == $course->course_code)? (Input::old('A2') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A2" value="3" {{(Input::old('A2') && Session::get('global') == $course->course_code)? (Input::old('A2') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A2" value="2" {{(Input::old('A2') && Session::get('global') == $course->course_code)? (Input::old('A2') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A2" value="1" {{(Input::old('A2') && Session::get('global') == $course->course_code)? (Input::old('A2') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Class’ mode of interaction of the subject matter (techniques and styles)
                @if($errors->has('A3') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A3') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A3" value="5" {{(Input::old('A3') && Session::get('global') == $course->course_code)? (Input::old('A3') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A3" value="4" {{(Input::old('A3') && Session::get('global') == $course->course_code)? (Input::old('A3') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A3" value="3" {{(Input::old('A3') && Session::get('global') == $course->course_code)? (Input::old('A3') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A3" value="2" {{(Input::old('A3') && Session::get('global') == $course->course_code)? (Input::old('A3') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A3" value="1" {{(Input::old('A3') && Session::get('global') == $course->course_code)? (Input::old('A3') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Class’ attendance
                @if($errors->has('A4') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A4') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A4" value="5" {{(Input::old('A4') && Session::get('global') == $course->course_code)? (Input::old('A4') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A4" value="4" {{(Input::old('A4') && Session::get('global') == $course->course_code)? (Input::old('A4') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A4" value="3" {{(Input::old('A4') && Session::get('global') == $course->course_code)? (Input::old('A4') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A4" value="2" {{(Input::old('A4') && Session::get('global') == $course->course_code)? (Input::old('A4') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A4" value="1" {{(Input::old('A4') && Session::get('global') == $course->course_code)? (Input::old('A4') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Class’ capacity to provide timely feedback on assignments and tests
                @if($errors->has('A5') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A5') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A5" value="5" {{(Input::old('A5') && Session::get('global') == $course->course_code)? (Input::old('A5') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A5" value="4" {{(Input::old('A5') && Session::get('global') == $course->course_code)? (Input::old('A5') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A5" value="3" {{(Input::old('A5') && Session::get('global') == $course->course_code)? (Input::old('A5') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A5" value="2" {{(Input::old('A5') && Session::get('global') == $course->course_code)? (Input::old('A5') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A5" value="1" {{(Input::old('A5') && Session::get('global') == $course->course_code)? (Input::old('A5') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Class’ frequent consultations
                @if($errors->has('A6') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A6') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A6" value="5" {{(Input::old('A6') && Session::get('global') == $course->course_code)? (Input::old('A6') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A6" value="4" {{(Input::old('A6') && Session::get('global') == $course->course_code)? (Input::old('A6') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A6" value="3" {{(Input::old('A6') && Session::get('global') == $course->course_code)? (Input::old('A6') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A6" value="2" {{(Input::old('A6') && Session::get('global') == $course->course_code)? (Input::old('A6') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A6" value="1" {{(Input::old('A6') && Session::get('global') == $course->course_code)? (Input::old('A6') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Adequacy of Class’ using guidance on learning materials
                @if($errors->has('A7') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A7') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A7" value="5" {{(Input::old('A7') && Session::get('global') == $course->course_code)? (Input::old('A7') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A7" value="4" {{(Input::old('A7') && Session::get('global') == $course->course_code)? (Input::old('A7') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A7" value="3" {{(Input::old('A7') && Session::get('global') == $course->course_code)? (Input::old('A7') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A7" value="2" {{(Input::old('A7') && Session::get('global') == $course->course_code)? (Input::old('A7') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A7" value="1" {{(Input::old('A7') && Session::get('global') == $course->course_code)? (Input::old('A7') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Manner in which the Class interacts with Instructor
                @if($errors->has('A8') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A8') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A8" value="5" {{(Input::old('A8') && Session::get('global') == $course->course_code)? (Input::old('A8') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A8" value="4" {{(Input::old('A8') && Session::get('global') == $course->course_code)? (Input::old('A8') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A8" value="3" {{(Input::old('A8') && Session::get('global') == $course->course_code)? (Input::old('A8') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A8" value="2" {{(Input::old('A8') && Session::get('global') == $course->course_code)? (Input::old('A8') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A8" value="1" {{(Input::old('A8') && Session::get('global') == $course->course_code)? (Input::old('A8') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Extent to which the Class relates the course to the area of study
                @if($errors->has('A9') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A9') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A9" value="5" {{(Input::old('A9') && Session::get('global') == $course->course_code)? (Input::old('A9') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A9" value="4" {{(Input::old('A9') && Session::get('global') == $course->course_code)? (Input::old('A9') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A9" value="3" {{(Input::old('A9') && Session::get('global') == $course->course_code)? (Input::old('A9') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A9" value="2" {{(Input::old('A9') && Session::get('global') == $course->course_code)? (Input::old('A9') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A9" value="1" {{(Input::old('A9') && Session::get('global') == $course->course_code)? (Input::old('A9') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Extent to which the Class relates the course to the area of study
                @if($errors->has('A10') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('A10') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="A10" value="5" {{(Input::old('A10') && Session::get('global') == $course->course_code)? (Input::old('A10') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A10" value="4" {{(Input::old('A10') && Session::get('global') == $course->course_code)? (Input::old('A10') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A10" value="3" {{(Input::old('A10') && Session::get('global') == $course->course_code)? (Input::old('A10') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A10" value="2" {{(Input::old('A10') && Session::get('global') == $course->course_code)? (Input::old('A10') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="A10" value="1" {{(Input::old('A10') && Session::get('global') == $course->course_code)? (Input::old('A10') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td colspan="6" class="text-info">
                General Remarks
                <input class="form-control" type="text" name="A11" value="{{(Input::old('A11') && Session::get('global') == $course->course_code)? e(Input::old('A11')):''}}">
            </td>
        </tr>
        <tr>
            <td colspan="6" align="right"><button name="submit" type="submit" class="btn btn-primary btn-sm">Submit</button></td>
        </tr>
        <tr hidden>
            <td colspan="" align="center">
                <input class="pull-left" type="text" name="course_code" value="{{$course->course_code}}" >
                <input type="text" name="week" value="{{$week}}" >
                <input class="pull-right" type="text" name="academic_year" value="{{$academic_year->academic_year}}" ></td>
        </tr>
    </table>
</form>