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
<!--                    @include('components.solveUserCredentialIssues')-->
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
                    @include('components.editUsers')
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