@include('frame.header')
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
    <div class="my-side-bar">
        <div class="list-group" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" href="#home" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>About</small></strong></button>
            <button style="margin-bottom: 3px;" href="#history" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>History</small></strong></button>
            <button style="margin-bottom: 3px;" href="#contact" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Contact</small></strong></button>
<!--            <button style="margin-bottom: 3px;" href="#location" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Location</small></strong></button>-->
        </div>
    </div>
</div>

<div class="col-lg-7 col-md-9 col-sm-8" style="height: 557px;padding-top: 10px">
<div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                    <i class="glyphicon glyphicon-align-justify"></i> <strong>About UCES</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body" style="text-align: justify;">
                                <blockquote><strong class="text-info">UDSM Course Evaluation System</strong> is a system that enables Undergraduate
                                students to assess their lecturers online and periodically after every four weeks in each semester.<br> 
                                Also the system will enable lectures to assess their classes and view their overall assessment
                                reports created by the system.
                                </blockquote>

                                <dl>
                                    <blockquote>
                                  <dt>Our Main Objective</dt>
                                      <dd>
                                          The main objective of University of Dar es salaam Course Evaluation System is to develop a computer based course evaluation system.
                                      </dd>
                                    </blockquote>
                                </dl>

                            </div>
                        </div>
                    </div>
            </div>
            <div class="tab-pane fade" id="history">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                <i class="glyphicon glyphicon-adjust"></i> <strong>A Short History About <abbr title="Quality Assurance Beriour">QAB</abbr></strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in">
                        <div class="panel-body" style="text-align: justify;">
                            <blockquote>Students at the University of Dar es Salaam participate in evaluating lecturers and degree programme
                            which are offered through the course evaluation form by filling it manually, the forms are owned by the
                            Quality Assurance Bureau(QAB) which was established on September, 2007. Assessment is done at the
                            end of each semester and provides valuable information for institutions about the efficiency of teaching
                            and learner support.</blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    <i class="glyphicon glyphicon-phone-alt"></i> <strong>Contacts</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <blockquote>
                                <address>
                                  <strong>UDSM Course Evaluation System Address</strong><br>
                                  <div class="text-success">
                                        University of Dar es Salaam<br>
                                        P.O BOX 35091<br>
                                        <abbr title="Email">E:</abbr> uces@gmail.com<br>
                                        <abbr title="Phone">P:</abbr> (255) 789-939901
                                    </div>
                                  
                                </address>

                                <address>
                                  <strong>Location</strong><br>
                                  <a href="mailto:#">Located within the University of Dar es Salaam</a>
                                </address>
                                </blockquote>

                            </div>
                        </div>
                    </div>
            </div>
            <div class="tab-pane fade" id="location">
                <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                    <strong>Location</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse in">
                            <div class="panel-body">
                                You have successfully login to UDSM Course Evaluation System (<strong>UCES</strong>).<br>
                                You can access the UCES functionalities by the following the appropriate links found on the menu side.
                                Bellow are further information about the links.
                            </div>
                        </div>
                    </div>
            </div>
        </div>

</div>
<div class="col-lg-3 col-md-3 col-sm-4 hidden-xs list-group-item" style="height: 557px">
<div class="panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title"><i class="glyphicon glyphicon-log-in"></i> <strong>Login</strong></h3>
  </div>
  <div class="panel-body">
        {{ Form::open(array('route'=>'login','class'=>'form-horizontal my-input-margin-bottom')) }}
            <div class="input-group input-group-lg" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="text" required name="id" value="{{(Input::old('id'))? e(Input::old('id')):''}}" class="form-control input-lg" placeholder="User Name" autofocus>
            </div>
            <div class="input-group input-group-lg" style="margin-bottom: 5px;">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" required name="password" value="" class="form-control input-lg" placeholder="Password" >
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            {{Form::token()}}
        {{Form::close()}}                
  </div>
    @if($errors->has('id'))
        <div class="panel-footer">
            <div class="alert alert-danger"><a href="#" class="alert-link">Please Provide correct User ID</a></div>
        </div>
    @elseif($errors->has('password'))
        <div class="panel-footer">
            <div class="alert alert-danger"><a href="#" class="alert-link">Please Provide Your Password</a></div>
        </div>
    @elseif(Session::has('global'))
        <div class="panel-footer">
            <div class="alert alert-danger"><a href="#" class="alert-link">{{Session::get('global')}}</a></div>
        </div>
    @endif
</div>
</div>
@include('frame.footer')
