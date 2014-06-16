@include('frame.header')
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
    <div class="my-side-bar">
        <div class="list-group" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" href="#home" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>About</small></strong></button>
            <button style="margin-bottom: 3px;" href="#history" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>History</small></strong></button>
            <button style="margin-bottom: 3px;" href="#contact" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Contact</small></strong></button>
            <button style="margin-bottom: 3px;" href="#location" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Location</small></strong></button>
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
                                    <strong>About UCES</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body" style="text-align: justify;">
                                <blockquote><strong class="text-info">UDSM Course Evaluation System</strong> is a system that will enable Undergraduate
                                students to assess their lecturers online and periodically after every four weeks in each semester.<br> 
                                Also the system will enable lectures to assess their classes and view their overall assessment
                                report conducted by students concerning them.
                                </blockquote>

                                <dl>
                                    <blockquote>
                                  <dt>Our Main Objective</dt>
                                      <dd>
                                          To improve lecturer assessment, evaluation of courses and learning environment by ensuring
                                          that all undergraduate students participate fully in filling the course evaluation form 
                                          online and periodically after every four weeks
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
                                    <strong>A Short History About <abbr title="Quality Assurance Beriour">QAB</abbr></strong>
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
                                    <strong>Contacts</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <blockquote>
                                <address>
                                  <strong>UDSM Course Evaluation System</strong><br>
                                  University of Dar es Salaam<br>
                                  P.O BOX 35091<br>
                                  <abbr title="Email">E:</abbr> uces@gmail.com<br>
                                  <abbr title="Phone">P:</abbr> (255) 789-939901
                                </address>

                                <address>
                                  <strong>Location</strong><br>
                                  <a href="mailto:#">Located within University of Dar es Salaam(you can put map of UDSM if possible)</a>
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
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Login</h3>
  </div>
  <div class="panel-body">
        {{ Form::open(array('route'=>'login','class'=>'form-horizontal my-input-margin-bottom')) }}
            <input type="text" required name="id" value="{{(Input::old('id'))? e(Input::old('id')):''}}" class="form-control input-lg" placeholder="User Name" autofocus>
            <input type="password" required name="password" value="" class="form-control input-lg" placeholder="Password" >
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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
