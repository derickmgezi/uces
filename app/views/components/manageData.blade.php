<div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == 'add_data')? 'in active':'' :'in active'}}" id="add-data">
    <div class="panel-group" id="add-data-accordion">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#add-data-accordion" href="#add-data-collapseOne">
                        <small><i class="glyphicon glyphicon-plus-sign text-success"></i> <strong class="text-success">Add Colleges,Departments, Venues and Courses</strong></small>
                    </a>
                </h4>
            </div>
            <div id="add-data-collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    @include('components.addData')
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#add-data-accordion" href="#add-data-collapseTwo">
                        <small><i class="glyphicon glyphicon-warning-sign text-danger"></i> <strong class="text-warning">Data Notifications</strong></small>
                    </a>
                </h4>
            </div>
            <div id="add-data-collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('components.solveDataIssues')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == 'view_data')? 'in active':'' :''}}" id="view-data">
    <div class="panel-group" id="view-data-accordion">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#view-data-accordion" href="#view-data-collapseOne">
                        <small><i class="glyphicon glyphicon-eye-open text-success"></i> <strong class="text-success">View all System Data (Colleges, Departments, Venues, Courses)</strong></small>
                    </a>
                </h4>
            </div>
            <div id="view-data-collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="alert alert-info">
                        <small><strong>To view and manage the Data click on the view buttons bellow</strong></small>
                    </div>
                    <a href="{{URL::to('user/viewColleges')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Colleges</a>
                    <a href="{{URL::to('user/viewDepartments')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Departments</a>
                    <a href="{{URL::to('user/viewVenues')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Venues</a>
                    <a href="{{URL::to('user/viewCourses')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Courses</a>
                    
                    @if(Session::has('colleges'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="3">
                                        List of all Colleges
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('colleges'))}} Colleges</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('colleges') as $college)
                            <tr>
                                <td class="text-info"><small><strong>{{$college->id}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$college->college_name}}</strong></small></td>
                                <td>
                                    <center>
                                        <a class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus-sign"></i> department</a>&nbsp;
                                        <a class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;
                                        <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('departments'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="4">
                                        List of all Departments
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('departments'))}} Departments</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>College</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('departments') as $department)
                            <tr>
                                <td class="text-info"><small><strong>{{$department->department_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$department->id}}</strong></small></td>
                                <td class="text-info"><small><strong>{{College::find($department->college_id)->college_name}}</strong></small></td>
                                <td>
                                    <center>
                                        <a class="btn btn-xs btn-success"><i class="glyphicon glyphicon-plus-sign"></i> course</a>&nbsp;
                                        <a class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;
                                        <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('venues'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="5">
                                        List of all Venues
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('venues'))}} Venue</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('venues') as $venue)
                            <tr>
                                <td class="text-info"><small><strong>{{$venue->venue_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$venue->id}}</strong></small></td>
                                <td><center><a class="btn btn-xs btn-warning" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;<a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a></center></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('courses'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="5">
                                        List of all Courses
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('courses'))}} Courses</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Department</th>
                                    <th>College</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('courses') as $course)
                            <tr>
                                <td class="text-info"><small><strong>{{$course->course_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$course->id}}</strong></small></td>
                                <td class="text-info"><small><strong>{{Department::find($course->department_id)->department_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{College::find(Department::find($course->department_id)->college_id)->college_name}}</strong></small></td>
                                <td>
                                    <center>
                                        <?php 
                                        $lecture_assigned_to_course = LecturerCourseAssessment::where('course_code',$course->id)
                                                                            ->where('academic_year','2013/14')
                                                                            ->get();
                                        ?>
                                        @if(count($lecture_assigned_to_course) == 1)
                                        <a class="btn btn-xs btn-success" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-plus-sign"></i> enroll students</a>&nbsp;
                                        @else
                                        <a class="btn btn-xs btn-info" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-plus-sign"></i> assign lecturer</a>&nbsp;
                                        @endif
                                        <a class="btn btn-xs btn-warning" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;
                                        <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#view-data-accordion" href="#view-data-collapseTwo">
                        <small><i class="glyphicon glyphicon-edit text-info"></i> <strong class="text-warning">Edit User Credentials</strong></small>
                    </a>
                </h4>
            </div>
            <div id="view-data-collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>