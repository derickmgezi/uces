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
                @if(Session::has('part') && Session::get('part') != 'D')
                    @include('components.addQuestion')
                @else
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Part A: The Instructor&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/A')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                                @if(Session::has('deletedQuestion') && Session::get('deletedQuestion') == 'A')<small class='text-danger pull-right'><i class="glyphicon glyphicon-trash"></i> A Question was deleted</small>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                        ->where('academic_year',$assessment_detail->academic_year)
                                                                        ->groupBy('question')
                                                                        ->get();
                    ?>
                    @foreach($instructor_assessment_questions as $question)
                    <tr class="row">
                        <td class="text-primary col-lg-8">
                            <small>{{$question->question}}</small>
                            @if(Session::has('editedQuestion') && Session::get('editedQuestion') == $question->id)
                            <small class="pull-right text-success"><strong>Question was edited</strong></small>
                            @endif
                        </td>
                        <?php 
                        $weeks_question_used = AssessmentQuestion::select('week')
                                                                ->where('question',$question->question) 
                                                                ->get();
                        ?>
                        <td class="col-lg-2">
                            <div class="btn-toolbar" role="toolbar">
                                <div class="btn-group btn-group-xs">
                                @foreach($weeks_question_used as $week)
                                    <button type="button" class="btn btn-default">{{$week->week}}</button>
                                @endforeach
                                </div>
                            </div>
                        </td>
                        <td class="col-lg-1"><a href="{{URL::to('user/editQuestion/'.$question->id.'/b')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                        <td class="col-lg-1">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id.'/b')}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                    </tr>
                    @endforeach
                </table>
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Part B: The Course&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/B')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                                @if(Session::has('deletedQuestion') && Session::get('deletedQuestion') == 'c')<small class='text-danger pull-right'><i class="glyphicon glyphicon-trash"></i> A Question was deleted</small>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $course_assessment_questions = AssessmentQuestion::where('section','B')
                                                                        ->where('academic_year',$assessment_detail->academic_year)
                                                                        ->groupBy('question')
                                                                        ->get();
                    ?>
                    @foreach($course_assessment_questions as $question)
                    <tr class="row">
                            <td class="text-primary col-lg-8">
                                <small>{{$question->question}}</small>
                                @if(Session::has('editedQuestion') && Session::get('editedQuestion') == $question->id)
                                <small class="pull-right text-success"><strong>Question was edited</strong></small>
                                @endif
                            </td>
                            <?php 
                            $weeks_question_used = AssessmentQuestion::select('week')
                                                                    ->where('question',$question->question) 
                                                                    ->get();
                            ?>
                            <td class="col-lg-2">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group btn-group-xs">
                                    @foreach($weeks_question_used as $week)
                                        <button type="button" class="btn btn-default">{{$week->week}}</button>
                                    @endforeach
                                    </div>
                                </div>
                            </td>
                            <td class="col-lg-1"><a href="{{URL::to('user/editQuestion/'.$question->id.'/c')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                            <td class="col-lg-1">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id.'/c')}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                        </tr>
                    @endforeach
                </table>
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Part C: The Learning Environment and Facilities&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/C')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                                @if(Session::has('deletedQuestion') && Session::get('deletedQuestion') == 'd')<small class='text-danger pull-right'><i class="glyphicon glyphicon-trash"></i> A Question was deleted</small>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $environment_assessment_questions = AssessmentQuestion::where('section','C')
                                                                        ->where('academic_year',$assessment_detail->academic_year)
                                                                        ->groupBy('question')
                                                                        ->get();
                    ?>
                    @foreach($environment_assessment_questions as $question)
                    <tr class="row">
                            <td class="text-primary col-lg-8">
                                <small>{{$question->question}}</small>
                                @if(Session::has('editedQuestion') && Session::get('editedQuestion') == $question->id)
                                <small class="pull-right text-success"><strong>Question was edited</strong></small>
                                @endif
                            </td>
                            <?php 
                            $weeks_question_used = AssessmentQuestion::select('week')
                                                                    ->where('question',$question->question) 
                                                                    ->get();
                            ?>
                            <td class="col-lg-2">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group btn-group-xs">
                                    @foreach($weeks_question_used as $week)
                                        <button type="button" class="btn btn-default">{{$week->week}}</button>
                                    @endforeach
                                    </div>
                                </div>
                            </td>
                            <td class="col-lg-1"><a href="{{URL::to('user/editQuestion/'.$question->id.'/d')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                            <td class="col-lg-1">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id.'/d')}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
            <div class="tab-pane fade {{(Session::has('evaluation'))? (Session::get('evaluation') == 'class')? 'in active':'' :''}} table-responsive" id="class_evaluation_form">
                @if(Session::has('part') && Session::get('part') == 'D')
                    @include('components.addQuestion')
                @else
                <table class="table table-condensed table-hover">
                    <thead>
                        <tr>
                            <th colspan="3">
                                Class Evaluation&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/D')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                                @if(Session::has('deletedQuestion') && Session::get('deletedQuestion') == 'D')<small class='text-danger pull-right'><i class="glyphicon glyphicon-trash"></i> A Question was deleted</small>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $class_assessment_questions = AssessmentQuestion::where('section','D')
                                                                        ->where('academic_year',$assessment_detail->academic_year)
                                                                        ->groupBy('question')
                                                                        ->get();
                    ?>
                    @foreach($class_assessment_questions as $question)
                    <tr class="row">
                            <td class="text-primary col-lg-8">
                                <small>{{$question->question}}</small>
                                @if(Session::has('editedQuestion') && Session::get('editedQuestion') == $question->id)
                                <small class="pull-right text-success"><strong>Question was edited</strong></small>
                                @endif
                            </td>
                            <?php 
                            $weeks_question_used = AssessmentQuestion::select('week')
                                                                    ->where('question',$question->question) 
                                                                    ->get();
                            ?>
                            <td class="col-lg-2">
                                <div class="btn-toolbar" role="toolbar">
                                    <div class="btn-group btn-group-xs">
                                    @foreach($weeks_question_used as $week)
                                        <button type="button" class="btn btn-default">{{$week->week}}</button>
                                    @endforeach
                                    </div>
                                </div>
                            </td>
                            <td class="col-lg-1"><a href="{{URL::to('user/editQuestion/'.$question->id.'/a')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a></td>
                            <td class="col-lg-1">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/deleteQuestion/'.$question->id.'/a')}}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> delete</a@endif</td>
                        </tr>
                    @endforeach
                </table>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
@if(Session::has('editQuestion'))
<div class="modal fade" id="editQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <a style="text-decoration: none;"><strong>Edit Question</strong></a>
            </div>
            <div class="modal-body">
                {{ Form::open(array('url'=>'user/editQuestion/'.Session::get('editQuestion').'/'.Session::get('evaluation'),'class'=>'form-horizontal my-input-margin-bottom')) }}
                    <div class="input-group" style="margin-bottom: 5px">
                        <span class="input-group-addon"><small><strong>Question</strong></small></span>
                        <input required="" type="text" name="question" placeholder="Question Content" value="{{(Input::old('question'))? e(Input::old('question')):AssessmentQuestion::find(Session::get('editQuestion'))->question}}" class="form-control">
                    </div>
                    <div class="input-group" style="margin-bottom: 5px">
                        <span class="input-group-addon"><small><strong>Data Type</strong></small></span>
                        <input required="" type="text" name="data_type" placeholder="Question Content" value="{{(Input::old('data_type'))? e(Input::old('data_type')):AssessmentQuestion::find(Session::get('editQuestion'))->data_type}}" class="form-control">
                    </div>
                    <div class="input-group">
                        @if(Auth::user()->user_type != 'Administrator')
                        <fieldset hidden>
                            <span class="input-group-addon"><small><strong>Question ID</strong></small></span>
                            <input class="form-control" required="" type="text" name="question_id" placeholder="Question id" value="{{(Input::old('question_id'))? e(Input::old('question_id')):AssessmentQuestion::find(Session::get('editQuestion'))->question_id}}">
                        </fieldset>
                        @else
                            <span class="input-group-addon"><small><strong>Question ID</strong></small></span>
                            <input class="form-control" required="" type="text" name="question_id" placeholder="Question id" value="{{(Input::old('question_id'))? e(Input::old('question_id')):AssessmentQuestion::find(Session::get('editQuestion'))->question_id}}">
                        @endif
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </span>
                    </div><!-- /input-group -->
                {{Form::close()}}
                
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @if($errors->has('question'))
                    <small class="text-danger">Please Write a <strong class="text-info">valid</strong> Question</small><br>
                    @endif
                    @if($errors->has('question_id'))
                    <small class="text-danger">Please Write a <strong class="text-info">valid</strong>  Question ID <strong class="text-info">Instructor</strong> that you want to assign a course to</small><br>
                    @endif
                </div>
                @endif
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endif