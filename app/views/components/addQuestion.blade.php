<table class="table table-condensed" >
    <thead>
        <tr>
            <th>
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
        <td class="text-primary"><small>{{$question->question}}</small></td>
    </tr>
    @endforeach
    {{ Form::open(array('url'=>'user/addQuestion/'.Session::get('part'),'class'=>'form-horizontal my-input-margin-bottom')) }}
    <tr>
        <td><input required="" type="text" name="question" placeholder="Question Content" value="{{(Input::old('question'))? e(Input::old('question')):''}}" class="form-control input-sm"></td>
        <td>
            Week &nbsp;
            <label class="checkbox-inline">
                <input type="checkbox" name="week" id="inlineCheckbox1" value=6> 6
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="week" id="inlineCheckbox2" value=10> 10
            </label>
            <label class="checkbox-inline">
                <input type="checkbox" name="week" id="inlineCheckbox3" value=14> 14
            </label>
            <!--<input required="" type="number" name="week" placeholder="Week" value="{{(Input::old('week'))? e(Input::old('week')):''}}" class="form-control">-->
        </td>
    </tr>
    <tr>
        <td>
            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
            <a href="{{URL::to('user/cancelAddQuestion/'.Session::get('part'))}}" class="btn btn-sm btn-danger">exit<a>
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
                @if($errors->has('week'))
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