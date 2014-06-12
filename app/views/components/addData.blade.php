<div class="alert alert-info">
    <small><strong>Please make sure that you fill in all required field</strong></small>
</div>
<a href="{{URL::to('user/addCollege')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Add College</a>
<a href="{{URL::to('user/addDepartment')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Add Department</a>
<a href="{{URL::to('user/addVenue')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Add Venue</a>
<a href="{{URL::to('user/addCourse')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Add Course</a>
<a href="{{URL::to('user/enrollStudents')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Enroll Students</a>

@if(Session::has('college'))
    {{ Form::open(array('route'=>'addCollege','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>ID</strong></span>
            <input required="" type="text" name="college_id" value="{{(Input::old('college_id'))? e(Input::old('college_id')):''}}" class="form-control input-sm" placeholder="Enter College Short Form">

            <span class="input-group-addon"><strong>College</strong></span>
            <input required="" type="text" name="college_name" value="{{(Input::old('college_name'))? e(Input::old('college_name')):''}}" class="form-control input-sm" placeholder="Enter College Name">

            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
            </span>
        </div><!-- /input-group -->

    {{Form::close()}}

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @if($errors->has('college_id'))
        <small class="text-danger">A college with code <strong class="text-info">{{e(Input::old('college_id'))}}</strong> exists</small><br>
        @endif
        @if($errors->has('college_name'))
        <small class="text-danger">A College with name <strong class="text-info">{{e(Input::old('college_name'))}}</strong> exists</small><br>
        @endif
    </div>
    @endif
@elseif(Session::has('venue'))
    {{ Form::open(array('route'=>'addVenue','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>ID</strong></span>
            <input required="" type="text" name="venue_id" value="{{(Input::old('venue_id'))? e(Input::old('venue_id')):''}}" class="form-control input-sm" placeholder="Enter Venue ID">

            <span class="input-group-addon"><strong>N</strong></span>
            <input required="" type="text" name="venue_name" value="{{(Input::old('venue_name'))? e(Input::old('venue_name')):''}}" class="form-control input-sm" placeholder="Venue Name">

            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
            </span>
        </div><!-- /input-group -->

    {{Form::close()}}

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @if($errors->has('venue_id'))
        <small class="text-danger">A Venue with code <strong class="text-info">{{e(Input::old('venue_id'))}}</strong> exists</small><br>
        @endif
        @if($errors->has('venue_name'))
        <small class="text-danger">A Venue with name <strong class="text-info">{{e(Input::old('venue_name'))}}</strong> exists</small><br>
        @endif
    </div>
    @endif
@elseif(Session::has('department'))
    {{ Form::open(array('route'=>'addDepartment','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>D</strong></span>
            <input required="" type="text" name="department_name" value="{{(Input::old('department_name'))? e(Input::old('department_name')):''}}" class="form-control input-sm" placeholder="Department Name">

            <span class="input-group-addon"><strong>ID</strong></span>
            <input required="" type="text" name="department_id" value="{{(Input::old('department_id'))? e(Input::old('department_id')):''}}" class="form-control input-sm" placeholder="Department code">

            <span class="input-group-addon"><strong>C</strong></span>
            <select name="college" class="form-control input-sm">
                <option value="">Select College</option>
                <?php $colleges = College::all();?>
                @foreach($colleges as $college)
                <option {{(Session::get('department') == $college->id)? 'selected':''}} title="{{$college->college_name}}" value="{{$college->id}}" {{((Input::old('college')) == $college->id)? 'selected=""':''}}>{{$college->id}}</option>
                @endforeach
            </select>

            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
            </span>
        </div><!-- /input-group -->
    {{Form::close()}}

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @if($errors->has('college'))
        <small class="text-danger">Please select a <strong class="text-info">college</strong></small><br>
        @endif
        @if($errors->has('department_id'))
        <small class="text-danger">A Department with code <strong class="text-info">{{e(Input::old('department_id'))}}</strong> exists</small><br>
        @endif
        @if($errors->has('department_name'))
        <small class="text-danger">A Department with name <strong class="text-info">{{e(Input::old('department_name'))}}</strong> exists</small><br>
        @endif
    </div>
    @endif
@elseif(Session::has('course'))
    {{ Form::open(array('route'=>'addCourse','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>ID</strong></span>
            <input required="" type="text" name="course_id" value="{{(Input::old('course_id'))? e(Input::old('course_id')):''}}" class="form-control input-sm" placeholder="Course Initial">

            <span class="input-group-addon"><strong>N</strong></span>
            <input required="" type="text" name="course_name" value="{{(Input::old('course_name'))? e(Input::old('course_name')):''}}" class="form-control input-sm" placeholder="Course Name">

            <span class="input-group-addon"><strong>D</strong></span>
            <select name="department" class="form-control input-sm">
                <option value="">Select Department</option>
                <?php $departments = Department::all();?>
                @foreach($departments as $department)
                <option {{(Session::get('course') == $department->id)? 'selected':''}} title="{{$department->department_name}}" value="{{$department->id}}" {{((Input::old('department')) == $department->id)? 'selected=""':''}}>{{$department->id}}</option>
                @endforeach
            </select>

            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
            </span>
        </div><!-- /input-group -->
    {{Form::close()}}

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @if($errors->has('department'))
        <small class="text-danger">Please select a <strong class="text-info">department</strong></small><br>
        @endif
        @if($errors->has('course_id'))
        <small class="text-danger">A Department with code <strong class="text-info">{{e(Input::old('course_id'))}}</strong> exists</small><br>
        @endif
        @if($errors->has('course_name'))
        <small class="text-danger">A Department with name <strong class="text-info">{{e(Input::old('course_name'))}}</strong> exists</small><br>
        @endif
    </div>
    @endif
@elseif(Session::has('enrollStudents'))
    {{ Form::open(array('route'=>'enrollStudents','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>Student</strong></span>
            <select name="student_id[]" multiple class="form-control">
                <?php $students = Student::all();?>
                @foreach($students as $student)
                <option title="{{User::find($student->id)->first_name.' '.User::find($student->id)->middle_name.' '.User::find($student->id)->last_name}}" value="{{$student->id}}" {{Input::old('student_id')? in_array($student->id,Input::old('student_id'))? 'selected':'' : ''}}>{{$student->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>Course</strong></span>
            <select {{(strlen(Session::get('enrollStudents')) != 0)? 'disabled':''}} name="course_code" class="form-control input-sm">
                <option value="">Select Course</option>
                <?php 
                if(strlen(Session::get('enrollStudents')) != 0){
                    $courses = LecturerCourseAssessment::select('course_code')
                                                        ->where('academic_year','2013/14')
                                                        ->where('academic_year','2013/14')
                                                        ->groupBy('course_code')
                                                        ->get();
                }else{
                    $courses = LecturerCourseAssessment::select('course_code')
                                                        ->where('academic_year','2013/14')
                                                        ->groupBy('course_code')
                                                        ->get();
                }
                ?>
                @foreach($courses as $course)
                <option {{(Session::get('enrollStudents') == $course->course_code)? 'selected':''}} title="{{Course::find($course->course_code)->course_name}}" value="{{(strlen(Session::get('enrollStudents')) != 0 && Session::get('enrollStudents') == $course->course_code)? Session::get('enrollStudents'):$course->course_code}}" {{((Input::old('course_code')) == $course->course_code)? 'selected=""':''}}>{{$course->course_code}}</option>
                @endforeach
            </select>
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
            </span>
        </div><!-- /input-group -->
    {{Form::close()}}

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @if($errors->has('course_code'))
        <small class="text-danger">Please select a <strong class="text-info">course</strong></small><br>
        @endif
        @if($errors->has('student_id'))
        <small class="text-danger">Please select at least one <strong class="text-info">Student</strong></small><br>
        @endif
    </div>
    @elseif(!Session::has('message'))
    <div class="alert alert-danger">
        <small class="text-danger">Please select a <strong class="text-info">course</strong> and <strong class="text-info">list of students</strong> that you want to enroll</small><br>
    </div>
    @endif
@endif

@if(Session::has('message'))
<div class="alert alert-success">
    <small>{{Session::get('message')}}</small>
</div>
@endif