@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="manage_accordion">
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#manage_accordion" href="#user_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Users</small></strong></button>
            <div id="user_collapse" class="collapse in">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-success btn-block" href="#add-user" data-toggle="tab"><small><strong>Add</strong></small></button>
                    <button class="btn btn-warning btn-block" href="#view-user" data-toggle="tab"><small><strong>View</strong></small></button>
                </div>
            </div>
        </div>
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#manage_accordion" href="#data_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Data</small></strong></button>
            <div id="data_collapse" class="collapse">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-success btn-block" href="#add-data" data-toggle="tab"><small><strong>Add</strong></small></button>
                    <button class="btn btn-warning btn-block" href="#view-data" data-toggle="tab"><small><strong>View</strong></small></button>
                </div>
            </div>
        </div>
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#manage_accordion" href="#assessment_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Assessments</small></strong></button>
            <div id="assessment_collapse" class="collapse">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-info btn-block" href="#questions" data-toggle="tab"><small><strong>Questions</strong></small></button>
                    <button class="btn btn-info btn-block" href="#details" data-toggle="tab"><small><strong>Details</strong></small></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-9 my-scroll-body" style="height: 557px;padding-top: 10px">
    <div class="tab-content">
        <div class="tab-pane fade in active" id="add-user">
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
        <div class="tab-pane fade" id="ATT">
            No Time Table
        </div>
        <div class="tab-pane fade" id="IA">
            No Incomplete Assessments
        </div>
        <div class="tab-pane fade" id="WAR">
            No Warnings
        </div>
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
</div>
@include('frame.footer')