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
                            <th colspan="2">
                                Part A: The Instructor&nbsp;
                                @if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/addQuestion/A')}}" class="btn btn-sm btn-success"><i class="glyphicon glyphicon-plus-sign"></i> Add New Question</a>@endif
                                @if(Session::has('deletedQuestion') && Session::get('deletedQuestion') == 'A')<small class='text-danger pull-right'><i class="glyphicon glyphicon-trash"></i> A Question was deleted</small>@endif
                            </th>
                        </tr>
                    </thead>
                    <?php
                    $instructor_assessment_questions = AssessmentQuestion::where('section','A')
                                                                        ->where('academic_year',$assessment_detail->academic_year)
                                                                        ->where('semister',$assessment_detail->semester)
                                                                        ->groupBy('question')
                                                                        ->get();
                    ?>
                    @foreach($instructor_assessment_questions as $question)
                    <tr class="row">
                        <td class="text-primary col-lg-9">
                            <small>{{$question->question}}</small>
                            @if(Session::has('editedQuestion') && Session::get('editedQuestion') == $question->id)
                            <small class="pull-right text-success"><strong>Question was edited</strong></small>
                            @endif
                        </td>
                        <?php 
                        $weeks_question_used = AssessmentQuestion::select('week')
                                                                ->where('question',$question->question)
                                                                ->where('academic_year',$assessment_detail->academic_year)
                                                                ->where('semister',$assessment_detail->semester)
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
                        <td class="col-lg-1">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/editQuestion/'.$question->id.'/A')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>@endif</td>
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
                                                                        ->where('semister',$assessment_detail->semester)
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
                                                                    ->where('academic_year',$assessment_detail->academic_year)
                                                                    ->where('semister',$assessment_detail->semester)
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
                            <td class="col-lg-2">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/editQuestion/'.$question->id.'/B')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>@endif</td>
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
                                                                        ->where('semister',$assessment_detail->semester)
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
                                                                    ->where('academic_year',$assessment_detail->academic_year)
                                                                    ->where('semister',$assessment_detail->semester)
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
                            <td class="col-lg-2">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/editQuestion/'.$question->id.'/C')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>@endif</td>
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
                                                                        ->where('semister',$assessment_detail->semester)
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
                                                                    ->where('academic_year',$assessment_detail->academic_year)
                                                                    ->where('semister',$assessment_detail->semester)
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
                            <td class="col-lg-2">@if(Auth::user()->user_type == 'Administrator')<a href="{{URL::to('user/editQuestion/'.$question->id.'/D')}}" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> edit</a>@endif</td>
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
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-primary pull-right">Submit</button>
                        </span>
                    </div>
                    <?php 
                        $weeks_question_used = AssessmentQuestion::select('id','week','section')
                                                                ->where('question',AssessmentQuestion::find(Session::get('editQuestion'))->question)
                                                                ->where('academic_year',$assessment_detail->academic_year)
                                                                ->where('semister',$assessment_detail->semester)
                                                                ->get();
                    ?>
                    <div class="input-group" style="margin-bottom: 5px">
                        <span class="input-group-addon"><small><strong>Remove Question on Week</strong></small></span>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            @foreach($weeks_question_used as $week)
                            <a href="{{URL::to('user/deleteQuestion/'.$week->id.'/'.$week->section)}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> {{$week->week}}</a>
                            @endforeach
                        </div>
                    </div>
                    @if(count($weeks_question_used) != 3)
                    <div class="input-group" style="margin-bottom: 5px">
                        <span class="input-group-addon"><small><strong>&nbsp;&nbsp;&nbsp;&nbsp;Add Question on Week&nbsp;&nbsp;&nbsp;&nbsp;</strong></small></span>
                        <div class="btn-group btn-group-sm" role="group" aria-label="...">
                            <?php $weeks = array_pluck($weeks_question_used, 'week'); ?>
                            @for($week=6; $week<=14; $week+=4)
                                @if(!in_array($week, $weeks))
                                <a href="{{URL::to('user/addQuestionOnWeek/'.Session::get('editQuestion').'/'.$week)}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> {{$week}}</a>
                                @endif
                            @endfor
                        </div>
                    </div>
                    @endif
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