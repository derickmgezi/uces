<table class="table table-condensed">
    <thead>
        <tr>
            <th colspan="2">
                @if(Session::get('part') == 'A')
                Part A: The Instructor
                @elseif(Session::get('part') == 'B')
                Part B: The Course
                @elseif(Session::get('part') == 'C')
                Part C: The Learning Environment and Facilities
                @elseif(Session::get('part') == 'D')
                Class Evaluation
                @endif
            </th>
        </tr>
    </thead>
    <?php
    $instructor_assessment_questions = AssessmentQuestion::where('section',Session::get('part'))
                                                        ->where('academic_year',$assessment_detail->academic_year)
                                                        ->groupBy('question')
                                                        ->get();
    ?>
    @foreach($instructor_assessment_questions as $question)
    <tr>
        <td colspan="2" class="text-primary"><small>{{$question->question}}</small></td>
    </tr>
    @endforeach
    {{ Form::open(array('url'=>'user/addQuestion/'.Session::get('part'),'class'=>'form-horizontal my-input-margin-bottom')) }}
    <tr>
        <td class="col-sm-10">
            <input class="form-control input-lg" required="" type="text" name="question" placeholder="Question Content" value="{{(Input::old('question'))? e(Input::old('question')):''}}">
        </td>
        <td class="col-sm-2">
            <input class="form-control input-lg" required="" type="text" name="dataType" placeholder="Data Type" value="{{(Input::old('dataType'))? e(Input::old('dataType')):''}}">
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="btn-group">
                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                <a href="{{URL::to('user/cancelAddQuestion/'.Session::get('part'))}}" class="btn btn-lg btn-danger">exit</a>
            </div>
        </td>
    </tr>
    {{Form::close()}}
    @if(count($errors) > 0)
    <tr>
        <td colspan="5">
            <div class="alert alert-danger">
                @if($errors->has('question'))
                <small><strong>The question you Entered Exists</strong></small><br>
                @endif
                @if($errors->has('dataType'))
                <small><strong>The data type you Entered is invalid</strong></small>
                @endif
            </div>
        </td>
    </tr>
    @elseif(Session::has('question_message'))
    <tr>
        <td colspan="5">
            <div class="alert alert-success">
                <small><strong>{{Session::get('question_message')}}</strong></small>
            </div>
        </td>
    </tr>
    @endif
</table>