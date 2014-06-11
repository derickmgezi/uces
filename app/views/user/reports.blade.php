@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="reports_accordion">
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#reports_accordion" href="#reports_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Generate Reports</small></strong></button>
            <div id="reports_collapse" class="collapse in">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-info btn-block" href="#instructor" data-toggle="tab"><small><strong>Instructor</strong></small></button>
                    <button class="btn btn-info btn-block" href="#student" data-toggle="tab"><small><strong>Student</strong></small></button>
                    <button class="btn btn-info btn-block" href="#course" data-toggle="tab"><small><strong>Course</strong></small></button>
                    <button class="btn btn-info btn-block" href="#environment" data-toggle="tab"><small><strong>Environment</strong></small></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-9 my-scroll-body" style="height: 557px;padding-top: 10px">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="instrustor">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Generate Instructor Assessment Report</strong>
                </div>
                <div class="panel-body">
                    <div class="alert alert-info">
                        <small><strong>Select the links bellow to generate reports of your choice</strong></small>
                    </div>
                    <a href="{{URL::to('user/generateCollegeReport')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-list-alt"></i> College</a>
                    <a href="{{URL::to('user/generateDepartmentReport')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-list-alt"></i> Department</a>
                    <a href="{{URL::to('user/generateCourseReport')}}" class="btn btn-success btn-sm" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-list-alt"></i> Course</a>
                
                    @if(Session::has('college_report'))
                        @if(strlen(Session::get('college_report')) != 0)
                            @include('components.report')
                        @else
                            {{ Form::open(array('route'=>'generateCollegeReport','class'=>'form-horizontal my-input-margin-bottom')) }}
                                <div class="input-group" style="margin-bottom: 10px;">
                                    <span class="input-group-addon"><strong>College</strong></span>
                                    <select name="college" class="form-control input-sm">
                                        <option value="">Select College</option>
                                        <?php $colleges = College::all();?>
                                        @foreach($colleges as $college)
                                        <option value="{{$college->id}}">{{$college->college_name}}</option>
                                        @endforeach
                                    </select>

                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
                                    </span>
                                </div><!-- /input-group -->
                            {{Form::close()}}
                            
                            @if(count($errors) == 0)
                            <div class="alert alert-info">
                                <small class="text-warning"><strong>Please select a college that you want to generate its report</strong></small><br>
                            </div>
                            @endif
                        @endif
                    @elseif(Session::has('department_report'))
                        @if(strlen(Session::get('department_report')) != 0)
                            @include('components.report')
                        @else
                            {{ Form::open(array('route'=>'generateDepartmentReport','class'=>'form-horizontal my-input-margin-bottom')) }}
                                <div class="input-group" style="margin-bottom: 10px;">
                                    <span class="input-group-addon"><strong>Department</strong></span>
                                    <select name="department" class="form-control input-sm">
                                        <option value="">Select Department</option>
                                        <?php $departments = Department::all();?>
                                        @foreach($departments as $department)
                                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>

                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
                                    </span>
                                </div><!-- /input-group -->
                            {{Form::close()}}
                            
                            @if(count($errors) == 0)
                            <div class="alert alert-info">
                                <small class="text-warning"><strong>Please select a college that you want to generate its report</strong></small><br>
                            </div>
                            @endif
                        @endif
                    @elseif(Session::has('course_report'))
                        @if(strlen(Session::get('course_report')) != 0)
                            @include('components.report')
                        @else
                            {{ Form::open(array('route'=>'generateCourseReport','class'=>'form-horizontal my-input-margin-bottom')) }}
                                <div class="input-group" style="margin-bottom: 10px;">
                                    <span class="input-group-addon"><strong>Course</strong></span>
                                    <select name="course" class="form-control input-sm">
                                        <option value="">Select Course</option>
                                        <?php $courses = Course::all();?>
                                        @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->course_name}}</option>
                                        @endforeach
                                    </select>

                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-sm" type="button">Submit</button>
                                    </span>
                                </div><!-- /input-group -->
                            {{Form::close()}}
                            
                            @if(count($errors) == 0)
                            <div class="alert alert-info">
                                <small class="text-warning"><strong>Please select a course that you want to generate its report</strong></small><br>
                            </div>
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
</div>
@include('frame.footer')