<div class="panel panel-default">
    <div class="panel-heading">
        <small><strong class="text-primary">Manage Assessment Details</strong></small>
    </div>
    <div class="panel-body">
        <?php 
            $assessment_detail = AssessmentDetail::first();
        ?>
        {{ Form::open(array('route'=>'editAssessmentDetails','class'=>'form-horizontal')) }}
            <div class="form-group">
                <label class="col-sm-6 control-label text-primary">Academic Year</label>
                <div class="col-sm-6">
                    @if(Session::has('editAssessmentDetail'))
                    <input required type="text" name="academic_year" class="form-control col-sm-6"  value='{{(Input::old('academic_year'))? e(Input::old('academic_year')):$assessment_detail->academic_year}}' placeholder="Academic Year eg 2013/14">
                    @else
                    <p class="form-control-static text-success"><strong>{{$assessment_detail->academic_year}}</strong></p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 control-label text-primary">Semester Starts On</label>
                <div class="col-sm-6">
                    @if(Session::has('editAssessmentDetail'))
                    <input required type="date" name="semester_begins" value='{{(Input::old('semester_begins'))? e(Input::old('semester_begins')):$assessment_detail->semester_date}}' class="form-control" id="inputEmail3" placeholder="Date">
                    @else
                    <p class="form-control-static text-success"><strong>{{$assessment_detail->semester_date}}</strong></p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 control-label text-primary">Current Week</label>
                <div class="col-sm-6">
                    @if(Session::has('editAssessmentDetail'))
                    <input required type="number" name="current_week" value='{{(Input::old('current_week'))? e(Input::old('current_week')):$assessment_detail->current_week}}' class="form-control" id="inputPassword3" placeholder="Current Week">
                    @else
                    <p class="form-control-static text-success"><strong>{{$assessment_detail->current_week}}</strong></p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-6 control-label text-primary">Semester</label>
                <div class="col-sm-6">
                    @if(Session::has('editAssessmentDetail'))
                    <div class="radio">
                        <label>
                            <input type="radio" name="semester" id="optionsRadios1" value=1 {{(Input::old('semester') == 1)? 'checked':($assessment_detail->semester == 1 && !Input::old('semester'))? 'checked':''}}>
                            One
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="semester" id="optionsRadios2" value=2 {{(Input::old('semester') == 2)? 'checked':($assessment_detail->semester == 2 && !Input::old('semester'))? 'checked':''}}>
                            Two
                        </label>
                    </div>
                    @else
                    <p class="form-control-static text-success"><strong>{{$assessment_detail->semester}}</strong></p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                    <center>
                        @if(Session::has('editAssessmentDetail'))
                        <button type="submit" class="btn btn-primary">Save</button>
                        @else
                        <a href="{{URL::to('user/editAssessmentDetails')}}" class="btn btn-warning">Edit</a>
                        @endif
                    </center>
                </div>
            </div>
        {{Form::close()}}
        
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @if($errors->has('academic_year'))
            <small class="text-danger">Please Enter a valid <strong class="text-info">academic year</strong></small><br>
            @endif
            @if($errors->has('current_week'))
            <small class="text-danger">Please Enter a valid <strong class="text-info">week number</strong>  between 1 and 16</small><br>
            @endif
            @if($errors->has('semester'))
            <small class="text-danger">Please Select the current <strong class="text-info">Semester</strong></small><br>
            @endif
            @if($errors->has('semester_begins'))
            <small class="text-danger">Please Enter a valid <strong class="text-info">Date</strong>  for when the Semester will Begin</small><br>
            @endif
        </div>
        @endif
    </div>
</div>