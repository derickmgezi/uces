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
                                    </th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>User ID</th>
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
                    @endif
                </div>
            </div>
        </div>
        <div class="panel panel-info">
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