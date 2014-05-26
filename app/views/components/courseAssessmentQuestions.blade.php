<div class="alert alert-{{(count($errors) > 0 && Session::get('global') == $course->course_code)? 'danger':'info'}}">
    <small>
        <abbr title="Fill all the fields">Please take your time and carefully provide information on the various issues raised below.</abbr><br>
        5=Excellent; 4=Very Good; 3=Satisfactory; 2=Poor; 1=Very Poor 
    </small>
</div>
<form class="table-responsive" method="post" action="assessCourse">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th class="text-success">Part B: The Course</th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
            </tr>
        </thead>
        <tr>
            <td class="text-info">
                How clear was the objective of the course?
                @if($errors->has('C1') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C1') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C1" value="5" {{(Input::old('C1') && Session::get('global') == $course->course_code)? (Input::old('C1') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C1" value="4" {{(Input::old('C1') && Session::get('global') == $course->course_code)? (Input::old('C1') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C1" value="3" {{(Input::old('C1') && Session::get('global') == $course->course_code)? (Input::old('C1') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C1" value="2" {{(Input::old('C1') && Session::get('global') == $course->course_code)? (Input::old('C1') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C1" value="1" {{(Input::old('C1') && Session::get('global') == $course->course_code)? (Input::old('C1') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                How well was the course content coverage?
                @if($errors->has('C2') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C2') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C2" value="5" {{(Input::old('C2') && Session::get('global') == $course->course_code)? (Input::old('C2') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C2" value="4" {{(Input::old('C2') && Session::get('global') == $course->course_code)? (Input::old('C2') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C2" value="3" {{(Input::old('C2') && Session::get('global') == $course->course_code)? (Input::old('C2') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C2" value="2" {{(Input::old('C2') && Session::get('global') == $course->course_code)? (Input::old('C2') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C2" value="1" {{(Input::old('C2') && Session::get('global') == $course->course_code)? (Input::old('C2') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td  class="text-info">
                How good was the mode of assessment?
                @if($errors->has('C3') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C3') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C3" value="5" {{(Input::old('C3') && Session::get('global') == $course->course_code)? (Input::old('C3') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C3" value="4" {{(Input::old('C3') && Session::get('global') == $course->course_code)? (Input::old('C3') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C3" value="3" {{(Input::old('C3') && Session::get('global') == $course->course_code)? (Input::old('C3') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C3" value="2" {{(Input::old('C3') && Session::get('global') == $course->course_code)? (Input::old('C3') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C3" value="1" {{(Input::old('C3') && Session::get('global') == $course->course_code)? (Input::old('C3') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                How useful were the teaching methods? (Class participation, demonstration, etc.)
                @if($errors->has('C4') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C4') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C4" value="5" {{(Input::old('C4') && Session::get('global') == $course->course_code)? (Input::old('C4') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C4" value="4" {{(Input::old('C4') && Session::get('global') == $course->course_code)? (Input::old('C4') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C4" value="3" {{(Input::old('C4') && Session::get('global') == $course->course_code)? (Input::old('C4') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C4" value="2" {{(Input::old('C4') && Session::get('global') == $course->course_code)? (Input::old('C4') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C4" value="1" {{(Input::old('C4') && Session::get('global') == $course->course_code)? (Input::old('C4') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                How useful were the lecture notes and handouts?
                @if($errors->has('C5') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C5') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C5" value="5" {{(Input::old('C5') && Session::get('global') == $course->course_code)? (Input::old('C5') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C5" value="4" {{(Input::old('C5') && Session::get('global') == $course->course_code)? (Input::old('C5') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C5" value="3" {{(Input::old('C5') && Session::get('global') == $course->course_code)? (Input::old('C5') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C5" value="2" {{(Input::old('C5') && Session::get('global') == $course->course_code)? (Input::old('C5') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C5" value="1" {{(Input::old('C5') && Session::get('global') == $course->course_code)? (Input::old('C5') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                How well did the course link theory and practice?
                @if($errors->has('C6') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C6') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C6" value="5" {{(Input::old('C6') && Session::get('global') == $course->course_code)? (Input::old('C6') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C6" value="4" {{(Input::old('C6') && Session::get('global') == $course->course_code)? (Input::old('C6') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C6" value="3" {{(Input::old('C6') && Session::get('global') == $course->course_code)? (Input::old('C6') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C6" value="2" {{(Input::old('C6') && Session::get('global') == $course->course_code)? (Input::old('C6') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C6" value="1" {{(Input::old('C6') && Session::get('global') == $course->course_code)? (Input::old('C6') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                How relevant was the course to the job market?
                @if($errors->has('C7') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C7') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C7" value="5" {{(Input::old('C7') && Session::get('global') == $course->course_code)? (Input::old('C7') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C7" value="4" {{(Input::old('C7') && Session::get('global') == $course->course_code)? (Input::old('C7') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C7" value="3" {{(Input::old('C7') && Session::get('global') == $course->course_code)? (Input::old('C7') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C7" value="2" {{(Input::old('C7') && Session::get('global') == $course->course_code)? (Input::old('C7') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C7" value="1" {{(Input::old('C7') && Session::get('global') == $course->course_code)? (Input::old('C7') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td class="text-info">
                How well did the course meet your expectations?
                @if($errors->has('C8') && Session::get('global') == $course->course_code)
                <div class="text-danger pull-right"><i title="required" class="glyphicon glyphicon-remove"></i></div>
                @elseif(Input::old('C8') && Session::get('global') == $course->course_code)
                <div class="text-success pull-right"><strong><i title="answered" class="glyphicon glyphicon-ok-sign"></i></strong></div>
                @endif
            </td>
            <td><input type="radio" name="C8" value="5" {{(Input::old('C8') && Session::get('global') == $course->course_code)? (Input::old('C8') == '5')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C8" value="4" {{(Input::old('C8') && Session::get('global') == $course->course_code)? (Input::old('C8') == '4')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C8" value="3" {{(Input::old('C8') && Session::get('global') == $course->course_code)? (Input::old('C8') == '3')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C8" value="2" {{(Input::old('C8') && Session::get('global') == $course->course_code)? (Input::old('C8') == '2')? 'checked':'' :''}}></td>
            <td><input type="radio" name="C8" value="1" {{(Input::old('C8') && Session::get('global') == $course->course_code)? (Input::old('C8') == '1')? 'checked':'' :''}}></td>
        </tr>
        <tr>
            <td colspan="6" class="text-info">
               Please suggest on how to improve on the delivery of the course
               <input class="form-control" name="C9" type="text" value="{{(Input::old('C9') && Session::get('global') == $course->course_code)? e(Input::old('C9')):''}}">
            </td>
        </tr>
		<tr>
            <td colspan="6" class="text-info">
               Please give additional comments, if any, on the course
               <input class="form-control"type="text" name="C10" value="{{(Input::old('C10') && Session::get('global') == $course->course_code)? e(Input::old('C10')):''}}">
            </td>
        </tr>
        <tr>
            <td colspan="6" align="right">
                <button name="course_assessment" type="submit" class="btn btn-primary btn-sm">Continue</button>
            </td>
        </tr>
        <tr hidden>
            <td colspan="" align="center"><input class="pull-left" type="text" name="course_code" value="{{$course->course_code}}" >
                <input type="text" name="week" value="{{$week}}" >
                <input class="pull-right" type="text" name="academic_year" value="{{$academic_year->academic_year}}" >
                <input type="text" name="reg_no" value="{{Auth::user()->id}}" >
            </td> 
        </tr>
    </table>
</form>