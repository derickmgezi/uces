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

<div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == 'add_data')? 'inactive':'' :'inactive'}}" id="view-users">
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
                    <a href="{{URL::to('')}}" class="btn btn-sm btn-success" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> View all Users</a>
                    <a href="{{URL::to('')}}" class="btn btn-sm btn-success" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> View Students</a>
                    <a href="{{URL::to('')}}" class="btn btn-sm btn-success" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> View Lectures</a>
                    <a href="{{URL::to('')}}" class="btn btn-sm btn-success" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> View Heads of Department</a>
                    <a href="{{URL::to('')}}" class="btn btn-sm btn-success" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> View QAB Staff</a>
                    <a href="{{URL::to('')}}" class="btn btn-sm btn-success" style="margin-bottom: 5px;"><i class="glyphicon glyphicon-eye-open"></i> View System Administrators</a>
                    
                    <div class="alert alert-info">
                        Hellow
                    </div>
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