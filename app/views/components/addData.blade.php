<div class="alert alert-info">
    <small><strong>Please make sure that you fill in all required field</strong></small>
</div>
<a href="{{URL::to('user/addCollege')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> College</a>
<a href="{{URL::to('user/addDepartment')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Department</a>
<a href="{{URL::to('user/addVenue')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Venue</a>
<a href="{{URL::to('user/addCourse')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Course</a>
<a href="{{URL::to('user/enrollStudents')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Enroll Students</a>
<a href="{{URL::to('user/assignCourseToInstructor')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-plus-sign"></i> Assign Course to Instructor</a>
<a href="{{URL::to('user/uploadExcelFile')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-upload"></i> Excel File</a>

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
@elseif(Session::has('excelFile'))
    {{ Form::open(array('route'=>'uploadExcelFile',"enctype"=>"multipart/form-data",'class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>FILE</strong></span>
            <input required="" type="file" name="excel_file" class="form-control input-sm">

            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-sm" type="button">Upload</button>
            </span>
        </div><!-- /input-group -->

    {{Form::close()}}
    
    @if(Session::has('successExcelFileMessage'))
    <div class="alert alert-success">
        <small><strong>{{Session::get('successExcelFileMessage')}}</strong></small>
    </div>
    @elseif(!Session::has('excelFileMessage'))
    <div class="alert alert-info">
        <small><strong>Please upload valid Excel Files</strong></small>
    </div>
    @else
    <div class="alert alert-danger">
        <small class="text-danger"><strong>{{Session::get('excelFileMessage')}}</strong></small>
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
            <select name="course_code" class="form-control input-sm">
                <option value="">Select Course</option>
                <?php 
                $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
                if(strlen(Session::get('enrollStudents')) != 0){
                    $courses = LecturerCourseAssignment::select('course')
                                                        ->where('yr',$current_academic_year)
                                                        ->where('course',Session::get('enrollStudents'))
                                                        ->groupBy('course')
                                                        ->first();
                }else{
                    $courses = LecturerCourseAssignment::select('course')
                                                        ->where('yr',$current_academic_year)
                                                        ->groupBy('course')
                                                        ->get();
                }
                ?>
                @if(strlen(Session::get('enrollStudents')) != 0)
                <option selected="" title="{{Course::find($courses->course)->course_name}}" value="{{$courses->course}}" {{((Input::old('course_code')) == $courses->course)? 'selected=""':''}}>{{$courses->course}}</option>
                @else
                    @foreach($courses as $course)
                    <option title="{{Course::find($course->course)->course_name}}" value="{{$course->course}}" {{((Input::old('course_code')) == $course->course)? 'selected=""':''}}>{{$course->course}}</option>
                    @endforeach
                @endif
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
@elseif(Session::has('assignCourse'))
    {{ Form::open(array('route'=>'assignCourseToInstructor','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>Instructor</strong></span>
            <select name="instructor_id" class="form-control input-sm">
                <option value="">Select Instructor</option>
                <?php $instructors = Lecturer::all();?>
                @foreach($instructors as $instructor)
                <option title="{{$instructor->id}}" value="{{$instructor->id}}" {{(Input::old('instructor_id') == $instructor->id)? 'selected':''}}>{{User::find($instructor->id)->first_name.' '.User::find($instructor->id)->middle_name.' '.User::find($instructor->id)->last_name}}</option>
                @endforeach
            </select>
        
            <span class="input-group-addon"><strong>Course</strong></span>
            <select name="course_code" class="form-control input-sm">
                <option value="">Select Course</option>
                <?php
                $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
                $assigned_courses = LecturerCourseAssignment::where('yr',$current_academic_year)
                                                            ->lists('course');
                if(count($assigned_courses) == 0){
                    $assigned_courses = array('');
                }
                
                if(strlen(Session::get('assignCourse')) != 0){
                    $courses = Course::where('id',Session::get('assignCourse'))
                                    ->groupBy('id')
                                    ->first();
                }else{
                    $courses = Course::whereNotIn('id', $assigned_courses)
                                        ->get();
                }
                ?>
                @if(strlen(Session::get('assignCourse')) != 0)
                <option selected="" title="{{$courses->course_name}}" value="{{$courses->id}}" {{((Input::old('course_code')) == $courses->id)? 'selected=""':''}}>{{$courses->id}}</option>
                @else
                    @foreach($courses as $course)
                    <option title="{{$course->course_name}}" value="{{$course->id}}" {{((Input::old('course_code')) == $course->id)? 'selected=""':''}}>{{$course->id}}</option>
                    @endforeach
                @endif
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
        @if($errors->has('instructor_id'))
        <small class="text-danger">Please select at the <strong class="text-info">Instructor</strong> that you want to assign a course to</small><br>
        @endif
    </div>
    @elseif(!Session::has('message'))
    <div class="alert alert-danger">
        <small class="text-danger">Please select a <strong class="text-info">course</strong> and <strong class="text-info">the Instructor</strong> that you want to assign the course to</small><br>
    </div>
    @endif
@endif

@if(Session::has('message'))
<div class="alert alert-success">
    <small>{{Session::get('message')}}</small>
</div>
@endif