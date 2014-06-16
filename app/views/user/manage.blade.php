@include('frame.header')
<div class="col-lg-2 col-md-2 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="manage_accordion">
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#manage_accordion" href="#data_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Data</small></strong></button>
            <div id="data_collapse" class="collapse {{(Session::has('global'))? (Session::get('global') == 'view_data')? 'in':'' :''}} {{(Session::has('global'))? (Session::get('global') == 'add_data')? 'in':'' :'in'}}">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-info btn-block" href="#add-data" data-toggle="tab"><small><strong>Add</strong></small></button>
                    <button class="btn btn-info btn-block" href="#view-data" data-toggle="tab"><small><strong>View</strong></small></button>
                </div>
            </div>
        </div>
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#manage_accordion" href="#user_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Users</small></strong></button>
            <div id="user_collapse" class="collapse {{(Session::has('global'))? (Session::get('global') == 'add_user')? 'in':'' :''}} {{(Session::has('global'))? (Session::get('global') == 'view_users')? 'in active':'' :''}}">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-info btn-block" href="#add-user" data-toggle="tab"><small><strong>Add</strong></small></button>
                    <button class="btn btn-info btn-block" href="#view-users" data-toggle="tab"><small><strong>View</strong></small></button>
                </div>
            </div>
        </div>
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#manage_accordion" href="#assessment_collapse" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Assessments</small></strong></button>
            <div id="assessment_collapse" class="collapse {{(Session::has('global'))? (Session::get('global') == 'question')? 'in':'' :''}}">
                <!-- Side Nav tabs -->
                <div class="">
                    <button class="btn btn-info btn-block" href="#questions" data-toggle="tab"><small><strong>Questions</strong></small></button>
                    <button class="btn btn-info btn-block" href="#details" data-toggle="tab"><small><strong>Details</strong></small></button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-10 col-sm-9 my-scroll-body" style="height: 557px;padding-top: 10px">
    <div class="tab-content">
        
        @include('components.manageUsers')
        
        @include('components.manageData')  
        
        <div class="tab-pane fade {{(Session::has('global'))? (Session::get('global') == 'question')? 'in active':'' :''}}" id="questions">
            @include('components.manageAssessmentQuestions')
        </div>
        <div class="tab-pane fade" id="details">
            No Warnings
        </div>
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
</div>
@include('frame.footer')