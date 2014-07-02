@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar">
        <div class="list-group" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" href="#home" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Home</small></strong></button>
            <button style="margin-bottom: 3px;" href="#ATT" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title disabled"><strong><small>Time Table</small></strong></button>
            <button style="margin-bottom: 3px;" href="#IA" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title disabled"><strong><small>Notifications</small></strong></button>
            <button style="margin-bottom: 3px;" href="#WAR" data-toggle="tab" class="btn btn-primary btn-block list-group-item my-pull-right panel-title disabled"><strong><small>Warnings</small></strong></button>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-9" style="height: 557px;padding-top: 10px">

    <!-- Side Tab panes -->   
    <div class="tab-content">
        <div class="tab-pane fade in active" id="home">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                <i class="glyphicon glyphicon-th-large"></i> <strong class="text-primary">Welcome</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
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
<!--                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Course
                            </a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="alert alert-info">
                                This functionality allows students to assess the the lecturer periodically i.e after every four weeks.
                                It also allows students to view how their class has been assessed by the lecturer
                            </div>
                        </div>
                    </div>
                </div>
               <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                myCourse
                            </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            This functionality enables a lecturer to view how he has been assessed by his/her students. It also allows
                            the lecturer to assess his/her respective classes. 
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                Lecturer
                            </a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            This functionality enables a the Head of Department to view the assessment done students with regards to a particular 
                            lecture and provides his/her
                            assessment results to students.
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                Problem
                            </a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="alert alert-info">
                                This functionality allows the Head of Department to view the problems reported to him by the student of
                                his/her department concerning a lecturer of his/her department also.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                myProblem
                            </a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse">
                        <div class="panel-body">
                            This functionality allows the students to report problems they have
                            experienced concerning a lecturer of his/her department also.
                        </div>
                    </div>
                </div>-->
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
    <a class="thumbnail btn btn-primary">
        {{ HTML::image('image/logo.png', 'University of Dar es salaam Logo', array('class' => 'thumb')) }}
    </a>
</div>
@include('frame.footer')