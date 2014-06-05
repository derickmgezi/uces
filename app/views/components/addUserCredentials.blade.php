<div class="alert alert-info">
    <small><strong>Make sure that you fill in all the required credentials</strong></small>
</div>
@if(Session::has('reg_no'))
    @if(Session::has('department'))
        {{ Form::open(array('route'=>'addStudentCourse','class'=>'form-horizontal my-input-margin-bottom')) }}
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon"><strong>ID</strong></span>
                <input required="" disabled="" type="text" name="reg" value="{{Session::get('reg_no')}}" class="form-control input-sm" placeholder="Identification Number">

            </div>
            <strong>Select Course(s)</strong><br>
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon"><strong class="glyphicon glyphicon-book"></strong></span>
                <select name="course[ ]" multiple class="form-control">
                    <?php
                    $courses = LecturerCourseAssessment::all();
                    ?>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}" {{((Input::old('course')) == $course->id)? 'selected=""':''}}>{{Course::find($course->course_code)->course_name}}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-success btn-sm" style="margin-bottom: 5px;">Finish</button>
        {{Form::close()}}
    @else
        {{ Form::open(array('route'=>'addStudent','class'=>'form-horizontal my-input-margin-bottom')) }}
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon"><strong>ID</strong></span>
                <input required="" disabled="" type="text" name="reg_no" value="{{Session::get('reg_no')}}" class="form-control input-sm" placeholder="Identification Number">

                <span class="input-group-addon"><strong>D</strong></span>
                <select name="department" class="form-control input-sm">
                    <option value="">Select Department</option>
                    <?php $departments = Department::all();?>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}" {{((Input::old('department')) == $department->id)? 'selected=""':''}}>{{$department->department_name}}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 5px;">Continue</button>
        {{Form::close()}} 

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @if($errors->has('reg_no'))
            <small class="text-danger">Student with Registration Number <strong class="text-info">{{$errors->first('reg_no')}}</strong> exists</small><br>
            @endif
            @if($errors->has('department'))
            <small class="text-danger">Please select <strong class="text-info">department</strong></small>
            @endif
        </div>
        @endif
    @endif
@elseif(Session::has('hd_id'))
    {{ Form::open(array('route'=>'addHeadofDepartment','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>ID</strong></span>
            <input required="" disabled="" type="text" name="hd_id" value="{{Session::get('hd_id')}}" class="form-control input-sm" placeholder="Identification Number">

            <span class="input-group-addon"><strong>D</strong></span>
            <select name="department" class="form-control input-sm">
                <option value="">Select the Department he or she manages</option>
                <?php $departments = Department::all();?>
                @foreach($departments as $department)
                <option value="{{$department->id}}" {{((Input::old('department')) == $department->id)? 'selected=""':''}}>{{$department->department_name}}</option>
                @endforeach
            </select>

            <span class="input-group-addon"><strong>N</strong></span>
            <select name="lecturer_id" class="form-control input-sm">
                <option value="">Select Lecturer Name</option>
                <?php $lecturers = Lecturer::all();?>
                @foreach($lecturers as $lecturer)
                <option value="{{$lecturer->id}}" {{((Input::old('lecturer_id')) == $lecturer->id)? 'selected=""':''}}>{{User::find($lecturer->id)->first_name.' '.User::find($lecturer->id)->last_name}}</option>
                @endforeach
            </select>
        </div>
    <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 5px;">Continue</button>
    {{Form::close()}}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @if($errors->has('lecturer_id'))
            <small class="text-danger">Please select <strong class="text-info">Lecturer's Name</strong></small><br>
            @endif
            @if($errors->has('department'))
            <small class="text-danger">Please select <strong class="text-info">department</strong></small>
            @endif
        </div>
    @endif
@elseif(Session::has('QAB_id'))
    {{ Form::open(array('route'=>'addQABStaff','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>ID</strong></span>
            <input required="" disabled="" type="text" name="QAB_id" value="{{Session::get('QAB_id')}}" class="form-control input-sm" placeholder="Identification Number">

            <span class="input-group-addon"><strong>P</strong></span>
            <select name="position" class="form-control input-sm">
                <option value="">Select position</option>
                <option value="Principal" {{((Input::old('position')) == 'Principal')? 'selected=""':''}}>Principal</option>
                <option value="Director" {{((Input::old('position')) == 'Director')? 'selected=""':''}}>Director</option>
                <option value="Assistant Director" {{((Input::old('position')) == 'Assistant Director')? 'selected=""':''}}>Assistant Director</option>
                <option value="IT Engineer" {{((Input::old('position')) == 'IT Engineer')? 'selected=""':''}}>IT Engineer</option>
            </select>
        </div>
    <button type="submit" class="btn btn-success btn-sm" style="margin-bottom: 5px;">Finish</button>
    {{Form::close()}}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @if($errors->has('position'))
            <small class="text-danger">Please select staff's <strong class="text-info">position</strong></small><br>
            @endif
        </div>
    @endif
@elseif(Session::has('lecturer_id'))
    @if(Session::has('department'))
        {{ Form::open(array('route'=>'addLecuturerCourse','class'=>'form-horizontal my-input-margin-bottom')) }}
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon"><strong>ID</strong></span>
                <input required="" disabled="" type="text" name="lecturer_id" value="{{Session::get('lecturer_id')}}" class="form-control input-sm" placeholder="Identification Number">

            </div>
            <strong>Select Course(s)</strong><br>
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon"><strong class="glyphicon glyphicon-book"></strong></span>
                <select name="course[ ]" multiple class="form-control">
                    <?php
                    $courses = Course::where('department_id',Session::get('department'))->get();
                    ?>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}" {{((Input::old('course')) == $course->id)? 'selected=""':''}}>{{$course->course_name}}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-success btn-sm" style="margin-bottom: 5px;">Finish</button>
        {{Form::close()}}
    @else
        {{ Form::open(array('route'=>'addLecturer','class'=>'form-horizontal my-input-margin-bottom')) }}
            <div class="input-group" style="margin-bottom: 10px;">
                <span class="input-group-addon"><strong>ID</strong></span>
                <input required="" disabled="" type="text" name="reg_no" value="{{Session::get('lecturer_id')}}" class="form-control input-sm" placeholder="Identification Number">

                <span class="input-group-addon"><strong>D</strong></span>
                <select name="department" class="form-control input-sm">
                    <option value="">Select Department</option>
                    <?php $departments = Department::all();?>
                    @foreach($departments as $department)
                    <option value="{{$department->id}}" {{((Input::old('department')) == $department->id)? 'selected=""':''}}>{{$department->department_name}}</option>
                    @endforeach
                </select>

                <span class="input-group-addon"><strong>P</strong></span>
                <select name="position" class="form-control input-sm">
                    <option value="">Select Position</option>
                    <option value="Senior Lecturer" {{((Input::old('position')) == 'Senior Lecturer')? 'selected=""':''}}>Senior Lecturer</option>
                    <option value="Lecturer" {{((Input::old('position')) == 'Lecturer')? 'selected=""':''}}>Lecturer</option>
                    <option value="Assistant Lecturer" {{((Input::old('position')) == 'Assistant Lecturer')? 'selected=""':''}}>Assistant Lecturer</option>
                </select>
            </div>
        <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 5px;">Continue</button>
        {{Form::close()}} 

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @if($errors->has('position'))
            <small class="text-danger">Please select Lecturer's <strong class="text-info">position</strong></small><br>
            @endif
            @if($errors->has('department'))
            <small class="text-danger">Please select <strong class="text-info">department</strong></small>
            @endif
        </div>
        @endif
    @endif
@else
    {{ Form::open(array('route'=>'addUser','class'=>'form-horizontal my-input-margin-bottom')) }}
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>F</strong></span>
            <input required="" type="text" name="first_name" value="{{(Input::old('first_name'))? e(Input::old('first_name')):''}}" class="form-control input-sm" placeholder="First Name">

          <span class="input-group-addon"><strong>S</strong></span>
          <input required="" type="text" name="sir_name" value="{{(Input::old('sir_name'))? e(Input::old('sir_name')):''}}" class="form-control input-sm" placeholder="Sir Name">

          <span class="input-group-addon"><strong>M</strong></span>
          <input type="text" name="middle_name" value="{{(Input::old('middle_name'))? e(Input::old('middle_name')):''}}" class="form-control input-sm" placeholder="Middle Name">
        </div>
        <div class="input-group" style="margin-bottom: 10px;">
            <span class="input-group-addon"><strong>ID</strong></span>
            <input required="" type="text" name="id" value="{{(Input::old('id'))? e(Input::old('id')):''}}" class="form-control input-sm" placeholder="Identification Number">

            <span class="input-group-addon"><strong class="glyphicon glyphicon-text-width"></strong></span>
            <select name="title"  class="form-control input-sm">
                <option value="">Select Title</option>
                <option value="null" {{((Input::old('title'))=='null')? 'selected=""':''}}>No title</option>
                <option value="Mr." {{((Input::old('title'))=='Mr.')? 'selected=""':''}}>Mr.</option>
                <option value="Ms." {{((Input::old('title'))=='Ms.')? 'selected=""':''}}>Ms.</option>
                <option value="Dr." {{((Input::old('title'))=='Dr.')? 'selected=""':''}}>Dr.</option>
                <option value="Prof." {{((Input::old('title'))=='Prof.')? 'selected=""':''}}>Prof</option>
            </select>

            <span class="input-group-addon"><strong>D</strong></span>
            <select name="user_type" class="form-control input-sm">
                <option value="">Select User Type</option>
                <option value="Administrator" {{((Input::old('user_type'))=='Administrator')? 'selected=""':''}}>Administrator</option>
                <option value="Student" {{((Input::old('user_type'))=='Student')? 'selected=""':''}}>Student</option>
                <option value="Lecturer" {{((Input::old('user_type'))=='Lecturer')? 'selected=""':''}}>Lecturer</option>
                <option value="Head of Department" {{((Input::old('user_type'))=='Head of Department')? 'selected=""':''}}>Head of Department</option>
                <option value="QAB Staff" {{((Input::old('user_type'))=='QAB Staff')? 'selected=""':''}}>QAB Staff</option>
            </select>
        </div>
    <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 5px;">Continue</button>
    {{Form::close()}} 

    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @if($errors->has('first_name'))
        <small class="text-danger">Please write <strong class="text-info">user's first name</strong></small>
        @endif
        @if($errors->has('sir_name'))
        <small class="text-danger">Please write <strong class="text-info">user sir name</strong></small>
        @endif
        @if($errors->has('id'))
        <small class="text-danger">User with ID <strong class="text-info">{{e(Input::old('id'))}}</strong> exists</small><br>
        @endif
        @if($errors->has('title'))
        <small class="text-danger">Please select <strong class="text-info">user's title</strong></small><br>
        @endif
        @if($errors->has('user_type'))
        <small class="text-danger">Please select <strong class="text-info">user type</strong></small>
        @endif
    </div>
    @endif

    @if(Session::has('message'))
    <div class="alert alert-success">
        <small><strong>{{Session::get('message')}}</strong></small>
    </div>
    @endif
@endif