<div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == 'add_user')? 'in active':'' :''}}" id="add-user">    
    <div class="panel-group" id="add-user-accordion">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#add-user-accordion" href="#collapseOne">
                        <small><i class="glyphicon glyphicon-plus-sign text-success"></i> <strong class="text-success">Add user</strong></small>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    @include('components.addUserCredentials')
                </div>
            </div>
        </div>
        <div class="panel panel-danger">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#add-user-accordion" href="#collapseTwo">
                        <small><i class="glyphicon glyphicon-warning-sign text-danger"></i> <strong class="text-warning">User Notifications</strong></small>
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('components.solveUserCredentialIssues')
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == 'view_users')? 'in active':'' :''}}" id="view-users">
    <div class="panel-group" id="view-users-accordion">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#view-users-accordion" href="#view-users-collapseOne">
                        <small><i class="glyphicon glyphicon-eye-open text-success"></i> <strong class="text-success">View all System Users</strong></small>
                    </a>
                </h4>
            </div>
            <div id="view-users-collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <div class="alert alert-info">
                        <small><strong>View the type of users that you want by clicking on the view buttons bellow</strong></small>
                    </div>
                    <a href="{{URL::to('user/viewAllUsers')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> All Users</a>
                    <a href="{{URL::to('user/viewStudents')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Students</a>
                    <a href="{{URL::to('user/viewLecturers')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Lecturers</a>
                    <a href="{{URL::to('user/viewHeadsofDepartment')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> Heads of Department</a>
                    <a href="{{URL::to('user/viewQABStaff')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> QAB Staff</a>
                    <a href="{{URL::to('user/viewAdmins')}}" class="btn btn-sm btn-success" style="margin-bottom: 10px;"><i class="glyphicon glyphicon-eye-open"></i> System Administrators</a>
                    
                    @if(Session::has('all_users'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="4">
                                        List of all Users
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('all_users'))}} users</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>ID</th>
                                    <th>User Type</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('all_users') as $user)
                            <tr>
                                <td class="text-info"><small><strong>{{$user->id}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$user->title.' '.$user->first_name.' '.$user->middle_name.' '.$user->last_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$user->user_type}}</strong></small></td>
                                <td><center><a class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;<a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a></center></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('all_students'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="4">
                                        List of all Students
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('all_students'))}} Students</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('all_students') as $student)
                            <tr>
                                <td class="text-info"><small><strong>{{User::find($student->id)->first_name.' '.User::find($student->id)->middle_name.' '.User::find($student->id)->last_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{College::find(Department::find($student->department_id)->college_id)->college_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{Department::find($student->department_id)->department_name}}</strong></small></td>
                                <td><center><a class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;<a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a></center></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('all_lecturers'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="5">
                                        List of all Lecturers
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('all_lecturers'))}} Lecturers</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('all_lecturers') as $lecturer)
                            <tr>
                                <td class="text-info"><small><strong>{{User::find($lecturer->id)->title.' '.User::find($lecturer->id)->first_name.' '.User::find($lecturer->id)->middle_name.' '.User::find($lecturer->id)->last_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$lecturer->position}}</strong></small></td>
                                <td class="text-info"><small><strong>{{College::find(Department::find($lecturer->department_id)->college_id)->college_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{Department::find($lecturer->department_id)->department_name}}</strong></small></td>
                                <td><center><a class="btn btn-xs btn-warning" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;<a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a></center></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('all_heads'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="4">
                                        List of all Heads of Department
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('all_heads'))}} Heads of Department</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>College</th>
                                    <th>Department</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('all_heads') as $head)
                            <tr>
                                <td class="text-info"><small><strong>{{User::find($head->id)->title.' '.User::find($head->id)->first_name.' '.User::find($head->id)->middle_name.' '.User::find($head->id)->last_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{College::find(Department::find(Lecturer::find($head->lecturer_id)->department_id)->college_id)->college_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{Department::find(Lecturer::find($head->lecturer_id)->department_id)->department_name}}</strong></small></td>
                                <td><center><a class="btn btn-xs btn-warning" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;<a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a></center></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('all_QAB_staff'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="3">
                                        List of all QAB Staff
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('all_QAB_staff'))}} QAB Staff</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('all_QAB_staff') as $QAB_staff)
                            <tr>
                                <td class="text-info"><small><strong>{{User::find($QAB_staff->id)->title.' '.User::find($QAB_staff->id)->first_name.' '.User::find($QAB_staff->id)->middle_name.' '.User::find($QAB_staff->id)->last_name}}</strong></small></td>
                                <td class="text-info"><small><strong>{{$QAB_staff->position}}</strong></small></td>
                                <td><center><a class="btn btn-xs btn-warning" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;<a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a></center></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                    @elseif(Session::has('all_admins'))
                    <div class="table-responsive">
                        <table class="table table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th class="text-success" colspan="2">
                                        List of all System Administrators
                                        <div class="pull-right text-info"><small>Total: <strong>{{count(Session::get('all_admins'))}} System Administrators</strong></small></div>
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th><center>Manage</center></th>
                                </tr>
                            </thead>
                            @foreach(Session::get('all_admins') as $admin)
                            <tr>
                                <td class="text-info"><small><strong>{{User::find($admin->id)->title.' '.User::find($admin->id)->first_name.' '.User::find($admin->id)->middle_name.' '.User::find($admin->id)->last_name}}</strong></small></td>
                                <td><center><a class="btn btn-xs btn-warning" style="margin-bottom: 3px;"><i class="glyphicon glyphicon-edit"></i> edit</a>&nbsp;<a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a></center></td>
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
                    <a data-toggle="collapse" data-parent="#view-users-accordion" href="#view-users-collapseTwo">
                        <small><i class="glyphicon glyphicon-edit text-info"></i> <strong class="text-warning">Edit User Credentials</strong></small>
                    </a>
                </h4>
            </div>
            <div id="view-users-collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>