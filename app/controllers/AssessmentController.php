<?php

class AssessmentController extends \BaseController {
    public function classAssessmentsValidator($input) {
        $rules=array(
                'A1'=>'required',
                'A2'=>'required',
                'A3'=>'required',
                'A4'=>'required',
                'A5'=>'required',
                'A6'=>'required',
                'A7'=>'required',
                'A8'=>'required',
                'A9'=>'required',
                'A10'=>'required',
                'A11'=>'min:0'
            );
            return Validator::make($input, $rules);
    }
    
    public function assessClass() {
        $validator = $this->classAssessmentsValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('myCoursePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('course_code'));
        }else{
            LecturerCourseAssessment::where('course_code',Input::get('course_code'))
                                    ->where('academic_year',Input::get('academic_year'))
                                    ->update(array(
                                        'a'.Input::get('week').'_01' => Input::get('A1'),
                                        'a'.Input::get('week').'_02' => Input::get('A2'),
                                        'a'.Input::get('week').'_03' => Input::get('A3'),
                                        'a'.Input::get('week').'_04' => Input::get('A4'),
                                        'a'.Input::get('week').'_05' => Input::get('A5'),
                                        'a'.Input::get('week').'_06' => Input::get('A6'),
                                        'a'.Input::get('week').'_07' => Input::get('A7'),
                                        'a'.Input::get('week').'_08' => Input::get('A8'),
                                        'a'.Input::get('week').'_09' => Input::get('A9'),
                                        'a'.Input::get('week').'_10' => Input::get('A10'),
                                        'a'.Input::get('week').'_11' => Input::get('A11')
                                            ));
            
            return Redirect::route('myCoursePage')
                            ->with('global',Input::get('course_code'));
        }
    }
    
    public function instructorAssessmentsValidator($input) {
        $rules=array(
                'B1'=>'required',
                'B2'=>'required',
                'B3'=>'required',
                'B4'=>'required',
                'B5'=>'required',
                'B6'=>'required',
                'B7'=>'required',
                'B8'=>'required',
                'B9'=>'required',
                'B10'=>'required',
                'B11'=>'min:0'
            );
            return Validator::make($input, $rules);
    }
    
    public function assessInstructor() {
        $validator = $this->instructorAssessmentsValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('coursesPage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('course_code'));
        }else{
            StudentAssessment::where('course_code',Input::get('course_code'))
                                    ->where('academic_year',Input::get('academic_year'))
                                    ->where('reg_no',Auth::user()->id)
                                    ->update(array(
                                        'b'.Input::get('week').'_01' => Input::get('B1'),
                                        'b'.Input::get('week').'_02' => Input::get('B2'),
                                        'b'.Input::get('week').'_03' => Input::get('B3'),
                                        'b'.Input::get('week').'_04' => Input::get('B4'),
                                        'b'.Input::get('week').'_05' => Input::get('B5'),
                                        'b'.Input::get('week').'_06' => Input::get('B6'),
                                        'b'.Input::get('week').'_07' => Input::get('B7'),
                                        'b'.Input::get('week').'_08' => Input::get('B8'),
                                        'b'.Input::get('week').'_09' => Input::get('B9'),
                                        'b'.Input::get('week').'_10' => Input::get('B10'),
                                        'b'.Input::get('week').'_11' => Input::get('B11')
                                            ));
            
            return Redirect::route('coursesPage')
                            ->with('global',Input::get('course_code'));
        }
    }
    
    public function courseAssessmentsValidator($input) {
        $rules=array(
                'C1'=>'required',
                'C2'=>'required',
                'C3'=>'required',
                'C4'=>'required',
                'C5'=>'required',
                'C6'=>'required',
                'C7'=>'required',
                'C8'=>'required',
                'C9'=>'min:0',
                'C10'=>'min:0'
            );
            return Validator::make($input, $rules);
    }
    
    public function assessCourse() {
        $validator = $this->courseAssessmentsValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('coursesPage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('course_code'));
        }else{
            StudentAssessment::where('course_code',Input::get('course_code'))
                                    ->where('academic_year',Input::get('academic_year'))
                                    ->where('reg_no',Auth::user()->id)
                                    ->update(array(
                                        'c'.Input::get('week').'_01' => Input::get('C1'),
                                        'c'.Input::get('week').'_02' => Input::get('C2'),
                                        'c'.Input::get('week').'_03' => Input::get('C3'),
                                        'c'.Input::get('week').'_04' => Input::get('C4'),
                                        'c'.Input::get('week').'_05' => Input::get('C5'),
                                        'c'.Input::get('week').'_06' => Input::get('C6'),
                                        'c'.Input::get('week').'_07' => Input::get('C7'),
                                        'c'.Input::get('week').'_08' => Input::get('C8'),
                                        'c'.Input::get('week').'_09' => Input::get('C9'),
                                        'c'.Input::get('week').'_10' => Input::get('C10')
                                            ));
            
            return Redirect::route('coursesPage')
                            ->with('global',Input::get('course_code'));
        }
    }
    
    public function environmentAssessmentsValidator($input) {
        $rules=array(
                'D1'=>'required',
                'D2'=>'required',
                'D3'=>'required',
                'D4'=>'required',
                'D5'=>'required',
                'D6'=>'required',
                'D7'=>'required',
                'D8'=>'min:0'
            );
            return Validator::make($input, $rules);
    }
    
    public function assessEnvironment() {
        $validator = $this->environmentAssessmentsValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('coursesPage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('course_code'));
        }else{
            StudentAssessment::where('course_code',Input::get('course_code'))
                                    ->where('academic_year',Input::get('academic_year'))
                                    ->where('reg_no',Auth::user()->id)
                                    ->update(array(
                                        'd'.Input::get('week').'_01' => Input::get('D1'),
                                        'd'.Input::get('week').'_02' => Input::get('D2'),
                                        'd'.Input::get('week').'_03' => Input::get('D3'),
                                        'd'.Input::get('week').'_04' => Input::get('D4'),
                                        'd'.Input::get('week').'_05' => Input::get('D5'),
                                        'd'.Input::get('week').'_06' => Input::get('D6'),
                                        'd'.Input::get('week').'_07' => Input::get('D7'),
                                        'd'.Input::get('week').'_08' => Input::get('D8')
                                            ));
            
            return Redirect::route('coursesPage')
                            ->with('global',Input::get('course_code'));
        }
    }
}