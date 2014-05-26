<div class="alert alert-{{(count($errors) > 0 && Session::get('global') == $course->course_code)? 'danger':'info'}}">
    <small>
        <abbr title="Fill all the fields">Please take your time and carefully provide information on the various issues raised below.</abbr><br>
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
        <tr>
            <td class="text-info">
                Instructor’s preparedness on the subject matter
                @if($errors->has('B1') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B1') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B1" value="5" {{(Input::old('B1') && Session::get('global') == $course->course_code)? (Input::old('B1') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B1" value="4" {{(Input::old('B1') && Session::get('global') == $course->course_code)? (Input::old('B1') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B1" value="3" {{(Input::old('B1') && Session::get('global') == $course->course_code)? (Input::old('B1') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B1" value="2" {{(Input::old('B1') && Session::get('global') == $course->course_code)? (Input::old('B1') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B1" value="1" {{(Input::old('B1') && Session::get('global') == $course->course_code)? (Input::old('B1') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Instructor’s possession of up-to-date skills and knowledge in the subject matter
                @if($errors->has('B2') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B2') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B2" value="5" {{(Input::old('B2') && Session::get('global') == $course->course_code)? (Input::old('B2') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B2" value="4" {{(Input::old('B2') && Session::get('global') == $course->course_code)? (Input::old('B2') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B2" value="3" {{(Input::old('B2') && Session::get('global') == $course->course_code)? (Input::old('B2') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B2" value="2" {{(Input::old('B2') && Session::get('global') == $course->course_code)? (Input::old('B2') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B2" value="1" {{(Input::old('B2') && Session::get('global') == $course->course_code)? (Input::old('B2') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Instructor’s mode of delivery of the subject matter (techniques and styles)
                @if($errors->has('B3') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B3') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B3" value="5" {{(Input::old('B3') && Session::get('global') == $course->course_code)? (Input::old('B3') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B3" value="4" {{(Input::old('B3') && Session::get('global') == $course->course_code)? (Input::old('B3') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B3" value="3" {{(Input::old('B3') && Session::get('global') == $course->course_code)? (Input::old('B3') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B3" value="2" {{(Input::old('B3') && Session::get('global') == $course->course_code)? (Input::old('B3') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B3" value="1" {{(Input::old('B3') && Session::get('global') == $course->course_code)? (Input::old('B3') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Instructor’s fairness in grading of assignments and tests against marking scheme
                @if($errors->has('B4') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B4') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B4" value="5" {{(Input::old('B4') && Session::get('global') == $course->course_code)? (Input::old('B4') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B4" value="4" {{(Input::old('B4') && Session::get('global') == $course->course_code)? (Input::old('B4') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B4" value="3" {{(Input::old('B4') && Session::get('global') == $course->course_code)? (Input::old('B4') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B4" value="2" {{(Input::old('B4') && Session::get('global') == $course->course_code)? (Input::old('B4') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B4" value="1" {{(Input::old('B4') && Session::get('global') == $course->course_code)? (Input::old('B4') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Instructor’s capacity to provide timely feedback on assignments and tests
                @if($errors->has('B5') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B5') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B5" value="5" {{(Input::old('B5') && Session::get('global') == $course->course_code)? (Input::old('B5') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B5" value="4" {{(Input::old('B5') && Session::get('global') == $course->course_code)? (Input::old('B5') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B5" value="3" {{(Input::old('B5') && Session::get('global') == $course->course_code)? (Input::old('B5') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B5" value="2" {{(Input::old('B5') && Session::get('global') == $course->course_code)? (Input::old('B5') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B5" value="1" {{(Input::old('B5') && Session::get('global') == $course->course_code)? (Input::old('B5') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Instructor’s attendance in the class
                @if($errors->has('B6') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B6') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B6" value="5" {{(Input::old('B6') && Session::get('global') == $course->course_code)? (Input::old('B6') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B6" value="4" {{(Input::old('B6') && Session::get('global') == $course->course_code)? (Input::old('B6') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B6" value="3" {{(Input::old('B6') && Session::get('global') == $course->course_code)? (Input::old('B6') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B6" value="2" {{(Input::old('B6') && Session::get('global') == $course->course_code)? (Input::old('B6') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B6" value="1" {{(Input::old('B6') && Session::get('global') == $course->course_code)? (Input::old('B6') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Instructor’s availability for consultations
                @if($errors->has('B7') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B7') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B7" value="5" {{(Input::old('B7') && Session::get('global') == $course->course_code)? (Input::old('B7') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B7" value="4" {{(Input::old('B7') && Session::get('global') == $course->course_code)? (Input::old('B7') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B7" value="3" {{(Input::old('B7') && Session::get('global') == $course->course_code)? (Input::old('B7') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B7" value="2" {{(Input::old('B7') && Session::get('global') == $course->course_code)? (Input::old('B7') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B7" value="1" {{(Input::old('B7') && Session::get('global') == $course->course_code)? (Input::old('B7') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Manner in which the Instructor interacts with students
                @if($errors->has('B8') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B8') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B8" value="5" {{(Input::old('B8') && Session::get('global') == $course->course_code)? (Input::old('B8') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B8" value="4" {{(Input::old('B8') && Session::get('global') == $course->course_code)? (Input::old('B8') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B8" value="3" {{(Input::old('B8') && Session::get('global') == $course->course_code)? (Input::old('B8') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B8" value="2" {{(Input::old('B8') && Session::get('global') == $course->course_code)? (Input::old('B8') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B8" value="1" {{(Input::old('B8') && Session::get('global') == $course->course_code)? (Input::old('B8') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Bdequacy of Instructor’s guidance on learning materials
                @if($errors->has('B9') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B9') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B9" value="5" {{(Input::old('B9') && Session::get('global') == $course->course_code)? (Input::old('B9') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B9" value="4" {{(Input::old('B9') && Session::get('global') == $course->course_code)? (Input::old('B9') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B9" value="3" {{(Input::old('B9') && Session::get('global') == $course->course_code)? (Input::old('B9') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B9" value="2" {{(Input::old('B9') && Session::get('global') == $course->course_code)? (Input::old('B9') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B9" value="1" {{(Input::old('B9') && Session::get('global') == $course->course_code)? (Input::old('B9') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                Extent to which the Instructor relates the course to your area of study
                @if($errors->has('B10') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('B10') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="B10" value="5" {{(Input::old('B10') && Session::get('global') == $course->course_code)? (Input::old('B10') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B10" value="4" {{(Input::old('B10') && Session::get('global') == $course->course_code)? (Input::old('B10') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B10" value="3" {{(Input::old('B10') && Session::get('global') == $course->course_code)? (Input::old('B10') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B10" value="2" {{(Input::old('B10') && Session::get('global') == $course->course_code)? (Input::old('B10') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="B10" value="1" {{(Input::old('B10') && Session::get('global') == $course->course_code)? (Input::old('B10') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td colspan="6" class="text-info">
                Please give additional comments, if any, on the Instructor
                <input class="form-control" type="text" name='B11' value="{{(Input::old('B11') && Session::get('global') == $course->course_code)? e(Input::old('B11')):''}}">
            </td>
        </tr>
        <tr>
            <td colspan="6" align="right"><button name="instructor_assessment" type="submit" class="btn btn-primary btn-sm">Continue</button></td>
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