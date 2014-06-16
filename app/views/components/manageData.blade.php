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
                    @include('components.editData')
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