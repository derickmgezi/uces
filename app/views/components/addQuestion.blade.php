<table class="table table-condensed">
    <thead>
        <tr>
            <th colspan="5">
                @if(Session::get('part') == 'b')
                Part A: The Instructor
                @elseif(Session::get('part') == 'c')
                Part B: The Course
                @elseif(Session::get('part') == 'd')
                Part C: The Learning Environment and Facilities
                @endif
            </th>
        </tr>
    </thead>
    <?php
    $instructor_assessment_questions = AssessmentQuestion::where('question_id','like',Session::get('part').'_%')
                                                        ->get();
    ?>
    @foreach($instructor_assessment_questions as $question)
    <tr>
        <td class="text-primary" colspan="2"><small>{{$question->question}}</small></td>
        <td class="text-primary" colspan="2"><small>{{$question->question_id}}</small></td>
        <td></td>
    </tr>
    @endforeach
    <tr>
        {{ Form::open(array('url'=>'user/addQuestion/'.Session::get('part'),'class'=>'form-horizontal my-input-margin-bottom')) }}
        <td colspan="2"><input required="" type="text" name="question" placeholder="Question Content" value="{{(Input::old('question'))? e(Input::old('question')):''}}" class="form-control"></td>
        <td>
            <input required="" type="text" name="question_id" placeholder="Question id" value="{{(Input::old('question_id'))? e(Input::old('question_id')):''}}" class="form-control">
        </td>
        <td><button type="submit" class="btn btn-sm btn-primary pull-right">Submit</button></td>
        <td><a href="{{URL::to('user/cancelAddQuestion/'.Session::get('part'))}}" class="btn btn-sm btn-danger">exit<a></td>
        {{Form::close()}}
    </tr>
    @if(count($errors) > 0)
    <tr>
        <td colspan="5">
            <div class="alert alert-danger">
                @if($errors->has('question'))
                <small><strong>The question you Entered Exists</strong></small><br>
                @endif
                @if($errors->has('question_id'))
                <small><strong>The question id you Entered Exists</strong></small>
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