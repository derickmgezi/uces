@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-4 hidden-xs list-group-item" style="height: 557px">
    <div class="my-side-bar" id="accordion">
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Tutorial Assistants</small></strong></button>
            <div id="collapseOne" class="collapse">
                <!-- Side Nav tabs -->
                <ul class="nav nav-pills nav-stacked">
                    <li class=""><button class="btn btn-info btn-block" href="#Hassan" data-toggle="tab">Mr. Hassan</button></li>
                    <li class=""><button class="btn btn-info btn-block" href="#Abdil" data-toggle="tab">Mr. Abdil</button></li>
                </ul>
            </div>
        </div>
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Assistant Lecturers</small></strong></button>
            <div id="collapseTwo" class="collapse">
                <!-- Side Nav tabs -->
                <ul class="nav nav-pills nav-stacked">
                    <li><button class="btn btn-info btn-block" href="#Leonard" data-toggle="tab">Mr. Leonard</button></li>
                    <li ><button class="btn btn-info btn-block" href="#Mndeme" data-toggle="tab">Mr. Mndeme</button></li>
                    <li><button class="btn btn-info btn-block" href="#Kenedy" data-toggle="tab">Mr. Kenedy</button></li>
                    <li><button class="btn btn-info btn-block" href="#Chambua" data-toggle="tab">Mr. Chambua</button></li>
                    <li><button class="btn btn-info btn-block" href="#Twahir" data-toggle="tab">Mr. Twahir</button></li>
                    <li><button class="btn btn-info btn-block" href="#Jimmy" data-toggle="tab">Mr. Jimmy</button></li>
                </ul>
            </div>
        </div>
        <div class="list-group panel" style="margin-bottom: 3px;">
            <button style="margin-bottom: 3px;" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="btn btn-primary btn-block list-group-item my-pull-right panel-title"><strong><small>Lecturers</small></strong></button>
            <div id="collapseThree" class="collapse">
                <!-- Side Nav tabs -->
                <ul class="nav nav-pills nav-stacked">
                    <li class=""><button class="btn btn-info btn-block" href="#Koda" data-toggle="tab">Dr. Koda</button></li>
                    <li><button class="btn btn-info btn-block" href="#Justo" data-toggle="tab">Dr. Justo</button></li>
                    <li><button class="btn btn-info btn-block" href="#Kimaro" data-toggle="tab">Dr. Kimaro</button></li>
                    <li><button class="btn btn-info btn-block" href="#Juma" data-toggle="tab">Dr. Juma Lungo</button></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-8 col-md-9 col-sm-8 my-scroll-body" style="height: 557px; padding-top: 10px">
    <!-- Side Tab panes -->   
    <div class="tab-content">
        <div class="tab-pane fade in active" id="Hassan">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#HassanWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#HassanWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#HassanWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#HassanWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Mr. Hassan</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="HassanWeek4" style="padding-top: 5px">
                                    <div class="alert alert-success">
                                        <small>Your Assessment Results done by your <abbr title="IS 333 Class">Students</abbr></small>
                                    </div>
                                    <div class="panel-group" id="IS333Week4accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseOne">
                                                        <small><strong>Assessment Results</strong></small>
                                                    </a>
                                                    <div class="pull-right">
                                                        <small>scale key</small>&nbsp;
                                                        <button class="btn btn-xs btn-success" title="Above 4">&nbsp;</button>
                                                        <button class="btn btn-xs btn-primary" title="Above 3">&nbsp;</button>
                                                        <button class="btn btn-xs btn-danger" title="Bellow 3">&nbsp;</button>
                                                        &nbsp;
                                                        <small>percentage key</small>&nbsp;
                                                        <button class="btn btn-xs btn-success" title="Excellent">&nbsp;</button>
                                                        <button class="btn btn-xs btn-primary" title="Very Good">&nbsp;</button>
                                                        <button class="btn btn-xs btn-info" title="Good">&nbsp;</button>
                                                        <button class="btn btn-xs btn-warning" title="Satisfactory">&nbsp;</button>
                                                        <button class="btn btn-xs btn-danger" title="Poor">&nbsp;</button>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    {{Results::lecturerAssessment(1,'Instructor’s preparedness on the subject matter',60, 10, 15, 5, 10,4)}}
                                                    {{Results::lecturerAssessment(2,'Instructor’s possession of up-to-date skills and knowledge in the subject matter',30, 10, 30, 10, 20,3)}}
                                                    {{Results::lecturerAssessment(3,'Instructor’s mode of delivery of the subject matter (techniques and styles)',5, 40, 10, 5, 40,5)}}
                                                    {{Results::lecturerAssessment(4,'Instructor’s fairness in grading of assignments and tests against marking scheme',30, 20, 5, 15, 30,4)}}
                                                    {{Results::lecturerAssessment(5,'Instructor’s capacity to provide timely feedback on assignments and tests',32, 21, 30, 12, 5,1)}}
                                                    {{Results::lecturerAssessment(6,'Instructor’s attendance in the class',21, 29, 10, 10, 30,2)}}
                                                    {{Results::lecturerAssessment(7,'Instructor’s availability for consultations',12, 30, 18, 20, 20,4)}}
                                                    {{Results::lecturerAssessment(8,'Manner in which the Instructor interacts with students',30, 20, 5, 30, 15,5)}}
                                                    {{Results::lecturerAssessment(9,'Adequacy of Instructor’s guidance on learning materials',50, 15, 35, 0, 0,3)}}
                                                    {{Results::lecturerAssessment(10,'Extent to which the Instructor relates the course to your area of study',20, 15, 55, 0, 10,3)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseTwo">
                                                        <small><strong>Student's Regards</strong></small>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <br>
                                                    <div class="alert alert-info">
                                                        <small><abbr title="IS 333 Class">Students</abbr> left no comment</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="HassanWeek8" style="padding-top: 5px">
                                    <div class="alert alert-success">
                                        <small>Your Assessment Results done by your <abbr title="IS 333 Class">Students</abbr></small>
                                    </div>
                                    <div class="panel-group" id="IS333Week8accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseOne">
                                                        Assessment Results
                                                    </a>
                                                    <div class="pull-right">
                                                        <small>scale key</small>&nbsp;
                                                        <button class="btn btn-xs btn-success" title="Above 4">&nbsp;</button>
                                                        <button class="btn btn-xs btn-primary" title="Above 3">&nbsp;</button>
                                                        <button class="btn btn-xs btn-danger" title="Bellow 3">&nbsp;</button>
                                                        &nbsp;
                                                        <small>percentage key</small>&nbsp;
                                                        <button class="btn btn-xs btn-success" title="Excellent">&nbsp;</button>
                                                        <button class="btn btn-xs btn-primary" title="Very Good">&nbsp;</button>
                                                        <button class="btn btn-xs btn-info" title="Good">&nbsp;</button>
                                                        <button class="btn btn-xs btn-warning" title="Satisfactory">&nbsp;</button>
                                                        <button class="btn btn-xs btn-danger" title="Poor">&nbsp;</button>
                                                    </div>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    {{Results::lecturerAssessment(1,'Instructor’s preparedness on the subject matter',60, 10, 15, 5, 10,4)}}
                                                    {{Results::lecturerAssessment(2,'Instructor’s possession of up-to-date skills and knowledge in the subject matter',30, 10, 30, 10, 20,3)}}
                                                    {{Results::lecturerAssessment(3,'Instructor’s mode of delivery of the subject matter (techniques and styles)',5, 40, 10, 5, 40,5)}}
                                                    {{Results::lecturerAssessment(4,'Instructor’s fairness in grading of assignments and tests against marking scheme',30, 20, 5, 15, 30,4)}}
                                                    {{Results::lecturerAssessment(5,'Instructor’s capacity to provide timely feedback on assignments and tests',32, 21, 30, 12, 5,1)}}
                                                    {{Results::lecturerAssessment(6,'Instructor’s attendance in the class',21, 29, 10, 10, 30,2)}}
                                                    {{Results::lecturerAssessment(7,'Instructor’s availability for consultations',12, 30, 18, 20, 20,4)}}
                                                    {{Results::lecturerAssessment(8,'Manner in which the Instructor interacts with students',30, 20, 5, 30, 15,5)}}
                                                    {{Results::lecturerAssessment(9,'Adequacy of Instructor’s guidance on learning materials',50, 15, 35, 0, 0,3)}}
                                                    {{Results::lecturerAssessment(10,'Extent to which the Instructor relates the course to your area of study',20, 15, 55, 0, 10,3)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseTwo">
                                                        Students' Regards
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    <br>
                                                    <div class="alert alert-info">
                                                        <small><abbr title="IS 333 Class">Students</abbr> left no comment</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="HassanWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="HassanWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Abdil">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#AbdilWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#AbdilWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#AbdilWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#AbdilWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS278</strong> Mr. Abdil</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="AbdilWeek4" style="padding-top: 5px">

                                    <div class="panel-group" id="IS333Week4accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseOne">
                                                        Grades
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseTwo">
                                                        Comments
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    No comment
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="AbdilWeek8" style="padding-top: 5px">

                                    <div class="panel-group" id="IS333Week8accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseOne">
                                                        Grades
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseTwo">
                                                        Comments
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    No comment
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="AbdilWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="AbdilWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Leonard">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#LeonardWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#LeonardWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#LeonardWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#LeonardWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Mr. Leonard</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="LeonardWeek4" style="padding-top: 5px">

                                    <div class="panel-group" id="IS333Week4accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseOne">
                                                        Grades
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseTwo">
                                                        Comments
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    No comment
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="LeonardWeek8" style="padding-top: 5px">

                                    <div class="panel-group" id="IS333Week8accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseOne">
                                                        Grades
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseTwo">
                                                        Comments
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    No comment
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="LeonardWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="LeonardWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Mndeme">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#MndemeWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#MndemeWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#MndemeWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#MndemeWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Mr. Mndeme</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="MndemeWeek4" style="padding-top: 5px">

                                    <div class="panel-group" id="IS333Week4accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseOne">
                                                        Grades
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week4accordion" href="#IS333Week4collapseTwo">
                                                        Comments
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week4collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    No comment
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="MndemeWeek8" style="padding-top: 5px">

                                    <div class="panel-group" id="IS333Week8accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseOne">
                                                        Grades
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseOne" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#IS333Week8accordion" href="#IS333Week8collapseTwo">
                                                        Comments
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="IS333Week8collapseTwo" class="panel-collapse collapse in">
                                                <div class="panel-body">
                                                    No comment
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="tab-pane fade" id="MndemeWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="MndemeWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Kenedy">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#KenedyWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#KenedyWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#KenedyWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#KenedyWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Mr. Kenedy</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="KenedyWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="KenedyWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="KenedyWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="KenedyWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Chambua">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#ChambuaWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#ChambuaWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#ChambuaWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#ChambuaWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Mr. Chambua</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="ChambuaWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="ChambuaWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="ChambuaWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="ChambuaWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Twahir">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#TwahirWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#TwahirWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#TwahirWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#TwahirWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Mr. Twahir</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="TwahirWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="TwahirWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="TwahirWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="TwahirWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Jimmy">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#JimmyWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#JimmyWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#JimmyWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#JimmyWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Mr. Jimmy</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="JimmyWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="JimmyWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="JimmyWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="JimmyWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Koda">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#KodaWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#KodaWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#KodaWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#KodaWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Dr. Koda</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="KodaWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="KodaWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="KodaWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="KodaWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Justo">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#JustoWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#JustoWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#JustoWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#JustoWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Dr. Justo</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="JustoWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="JustoWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="JustoWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="JustoWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Kimaro">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#KimaroWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#KimaroWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#KimaroWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#KimaroWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Dr. Kimaro</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="KimaroWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="KimaroWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="KimaroWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="KimaroWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Juma">
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <strong>2013/14</strong>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li><a href="#JumaWeek4" data-toggle="tab">4 weeks</a></li>
                                <li><a href="#JumaWeek8" data-toggle="tab">8 weeks</a></li>
                                <li><a href="#JumaWeek12" data-toggle="tab">12 weeks</a></li>
                                <li><a href="#JumaWeek16" data-toggle="tab">16 weeks</a></li>
                                <li class="pull-right"><strong>IS333</strong> Dr. Juma</li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="JumaWeek4" style="padding-top: 5px">
                                    <strong>Instructor’s preparedness on the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(60, 10, 15, 5, 10)}}
                                                    <strong>Instructor’s possession of up-to-date skills and knowledge in the subject matter</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 10, 30, 10, 20)}}
                                                    <strong>Instructor’s mode of delivery of the subject matter (techniques and styles)</strong>
                                                    {{Results::lecturerAssessmentInPercentage(5, 40, 10, 5, 40)}}
                                                    <strong>Instructor’s fairness in grading of assignments and tests against marking scheme</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 15, 30)}}
                                                    <strong>Instructor’s capacity to provide timely feedback on assignments and tests</strong>
                                                    {{Results::lecturerAssessmentInPercentage(32, 21, 30, 12, 5)}}
                                                    <strong>Instructor’s attendance in the class</strong>
                                                    {{Results::lecturerAssessmentInPercentage(21, 29, 10, 10, 30)}}
                                                    <strong>Instructor’s availability for consultations</strong>
                                                    {{Results::lecturerAssessmentInPercentage(12, 30, 18, 20, 20)}}
                                                    <strong>Manner in which the Instructor interacts with students</strong>
                                                    {{Results::lecturerAssessmentInPercentage(30, 20, 5, 30, 15)}}
                                                    <strong>Adequacy of Instructor’s guidance on learning materials</strong>
                                                    {{Results::lecturerAssessmentInPercentage(50, 15, 35, 0, 0)}}
                                                    <strong>Extent to which the Instructor relates the course to your area of study</strong>
                                                    {{Results::lecturerAssessmentInPercentage(20, 15, 55, 0, 10)}}
                                </div>
                                <div class="tab-pane fade" id="JumaWeek8" style="padding-top: 5px">
                                    {{Results::lecturerAssessmentInFrichter('Instructor’s preparedness on the subject matter',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s possession of up-to-date skills and knowledge in the subject matter',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s mode of delivery of the subject matter (techniques and styles)',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s fairness in grading of assignments and tests against marking scheme',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s capacity to provide timely feedback on assignments and tests',1)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s attendance in the class',2)}}
                                                    {{Results::lecturerAssessmentInFrichter('Instructor’s availability for consultations',4)}}
                                                    {{Results::lecturerAssessmentInFrichter('Manner in which the Instructor interacts with students',5)}}
                                                    {{Results::lecturerAssessmentInFrichter('Adequacy of Instructor’s guidance on learning materials',3)}}
                                                    {{Results::lecturerAssessmentInFrichter('Extent to which the Instructor relates the course to your area of study',3)}}
                                </div>
                                <div class="tab-pane fade" id="JumaWeek12" style="padding-top: 5px">
                                    <div class="alert alert-success"><a href="#" class="alert-link">Results are being populated</a></div>
                                </div>
                                <div class="tab-pane fade" id="JumaWeek16" style="padding-top: 5px">
                                    <div class="alert alert-info"><a href="#" class="alert-link">Heads up! No Assessment done yet</a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-2 visible-lg list-group-item" style=" height: 557px">
</div>
@include('frame.footer')