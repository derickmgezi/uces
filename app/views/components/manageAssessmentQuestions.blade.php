<div class="panel panel-default">
    <div class="panel-heading">
        <small><strong class="text-primary">Manage questions on the QAB Course Evaluation Form</strong></small>
        <div class="pull-right">
            <button class="btn btn-xs btn-warning" href="#course_evaluation_form" data-toggle="tab">Course Evaluation Form</button>&nbsp;
            <button  class="btn btn-xs btn-info" href="#class_evaluation_form" data-toggle="tab">Class Evalution Form</button>
        </div>
    </div>
    <div class="panel-body my-scroll-body-in-panel">
        <div class="tab-content">
            <div class="tab-pane fade {{(Session::has('evaluation'))? (Session::get('evaluation') == 'course')? 'in active':'' :'in active'}}" id="course_evaluation_form">
                @if(Session::has('part') && Session::get('part') != 'a')
                    @include('components.addQuestion')
                @else
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Part A: The Instructor&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/b')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $instructor_assessment_questions = AssessmentQuestion::where('question_id','like','b_%')
                                                                        ->get();
                    ?>
                    @foreach($instructor_assessment_questions as $question)
                        <tr>
                            <td class="text-primary"><small>{{$question->question}}</small></td>
                            <td><a href="{{URL::to('user/editQuestion/'.$question->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                            <td>@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Part B: The Course&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/c')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $course_assessment_questions = AssessmentQuestion::where('question_id','like','c_%')
                                                                        ->get();
                    ?>
                    @foreach($course_assessment_questions as $question)
                        <tr>
                            <td class="text-primary"><small>{{$question->question}}</small></td>
                            <td><a href="{{URL::to('user/editQuestion/'.$question->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                            <td>@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Part C: The Learning Environment and Facilities&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/d')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $environment_assessment_questions = AssessmentQuestion::where('question_id','like','d_%')
                                                                        ->get();
                    ?>
                    @foreach($environment_assessment_questions as $question)
                        <tr>
                            <td class="text-primary"><small>{{$question->question}}</small></td>
                            <td><a href="{{URL::to('user/editQuestion/'.$question->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                            <td>@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
            <div class="tab-pane fade {{(Session::has('evaluation'))? (Session::get('evaluation') == 'class')? 'in active':'' :''}} table-responsive" id="class_evaluation_form">
                @if(Session::has('part') && Session::get('part') == 'a')
                    @include('components.addQuestion')
                @else
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Class Evaluation&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/a')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $class_assessment_questions = AssessmentQuestion::where('question_id','like','a_%')
                                                                        ->get();
                    ?>
                    @foreach($class_assessment_questions as $question)
                        <tr>
                            <td class="text-primary"><small>{{$question->question}}</small></td>
                            <td><a href="{{URL::to('user/editQuestion/'.$question->id)}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                            <td>@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id)}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</div>