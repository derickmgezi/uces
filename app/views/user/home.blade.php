@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar">
        <div class="list-group" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" href="#home" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Home</small></strong></button>
            <button style="margin-bottom: 3px;" href="#ATT" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title disabled"><strong><small>Time Table</small></strong></button>
            <button style="margin-bottom: 3px;" href="#IA" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title disabled"><strong><small>Notifications</small></strong></button>
            <button style="margin-bottom: 3px;" href="#settings" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><i class="fa fa-cog fa-spin"></i> <strong><small>Account Settings</small></strong></button>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-9" style="height: 557px;padding-top: 10px">

    <!-- Side Tab panes -->   
    <div class="tab-content">
        <div class="tab-pane fade {{(Session::has('global'))? '':'in active'}}" id="home">
            <div class="panel-group" id="home-accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#home-accordion" href="#home-collapseOne">
                                <i class="glyphicon glyphicon-th-large"></i> <strong class="text-primary">Welcome</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="home-collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="alert alert-success">
                                You have successfully login to UDSM Course Evaluation System (<strong>UCES</strong>).<br>
                                You can access the UCES functionalities by the following the appropriate links found on the menu side.
                                Bellow are further information about the links.
                            </div>
                            <div class="alert alert-warning"><small>
                                QAB Course Evaluation form aims at capturing feedback from you regarding the quality of instruction that have
                                have been provided in this course as well as the learning environment and facilities. The information is confidential and will
                                not be associated with your identity. Your honest and constructive opinions will be very useful in improving
                                delivery and quality of the course and the learning environment.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="ATT">
            No Time Table so far
        </div>
        <div class="tab-pane fade" id="IA">
            No Incomplete Assessments
        </div>
        <div class="tab-pane fade {{(Session::has('global'))? 'in active':''}}" id="settings">
            <div class="panel-group" id="account-accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#account-accordion" href="#account-collapseOne">
                                <i class="fa fa-wrench"></i> <strong class="text-primary">Manage your Account Password</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="account-collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-offset-3 col-sm-6">
                                    {{ Form::open(array('url' => 'user/account','class' => 'form-signin','role' => 'form')) }}
                                        <div class="input-group" style="margin-bottom: 5px;">
                                            <span class="input-group-addon"><i class="fa fa-unlock fa-2x  text-success"></i></span>
                                            <input name="current_password" value="{{(Input::old('current_password'))? e(Input::old('current_password')):''}}{{(Session::has('current_password'))? Session::get('current_password'):''}}" type="password" class="form-control input-lg" placeholder="Enter Current Address" required autofocus>
                                        </div>
                                        <div class="input-group" style="margin-bottom: 5px;">
                                            <span class="input-group-addon"><i class="fa fa-lock fa-2x  text-success"></i>&nbsp;&nbsp;</span>
                                            <input name="password" value="{{(Input::old('password'))? e(Input::old('password')):''}}{{(Session::has('password'))? Session::get('password'):''}}" type="password" class="form-control input-lg" placeholder="Enter New Password" required>
                                        </div>
                                        <div class="input-group" style="margin-bottom: 5px;">
                                            <span class="input-group-addon"><i class="fa fa-unlock-alt fa-2x  text-success"></i>&nbsp;&nbsp;</span>
                                            <input name="password_confirmation" value="{{(Input::old('password_confirmation'))? e(Input::old('password_confirmation')):''}}{{(Session::has('password_confirmation'))? Session::get('password_confirmation'):''}}" type="password" class="form-control input-lg" placeholder="Enter New Password Again" required>
                                        </div>
                                        <button class="btn btn-lg btn-primary btn-block" style="margin-bottom: 5px;" type="submit">Sign-in</button>
                                    {{ Form::close() }}
                                    @if($errors->has('password'))
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <strong class="text-danger">{{$errors->first('password')}}</strong>
                                        </div>
                                    @elseif(Session::has('error'))
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <strong class="text-danger">{{Session::get('error')}}</strong>
                                        </div>
                                    @elseif(Session::has('success'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            <strong class="text-success">{{Session::get('success')}}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
    <a class="thumbnail btn btn-primary">
        {{ HTML::image('image/logo.png', 'University of Dar es salaam Logo', array('class' => 'thumb')) }}
    </a>
</div>
@include('frame.footer')