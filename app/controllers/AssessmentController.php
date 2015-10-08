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
        $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','A')
                                                ->where('week',array_get($input,'week'))
                                                ->where('semister',array_get($input,'semister'))
                                                ->where('academic_year',array_get($input,'academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
        
        $rules=array();
        
        foreach($list_of_questions as $question){
            if($question->data_type == 'integer'){
                $rules = array_add($rules, 'A'.$question->id, 'integer|required');
            }  else {
                $rules = array_add($rules, 'A'.$question->id, 'min:0');
            }
        }
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
            $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','A')
                                                ->where('week',Input::get('week'))
                                                ->where('semister',Input::get('semister'))
                                                ->where('academic_year',Input::get('academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
            
            foreach($list_of_questions as $question){
                InstructorAssessment::insert(
                        array(
                            'student_enrollment_id' => Input::get('enrollment_id'),
                            'question_id' => $question->id,
                            'assessment_value' => Input::get('A'.$question->id)
                        )
                );
            }
            
            return Redirect::route('coursesPage')
                            ->with('global',Input::get('course_code'));
        }
    }
    
    public function courseAssessmentsValidator($input) {
        $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','B')
                                                ->where('week',array_get($input,'week'))
                                                ->where('semister',array_get($input,'semister'))
                                                ->where('academic_year',array_get($input,'academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
        
        $rules=array();
        
        foreach($list_of_questions as $question){
            if($question->data_type == 'integer'){
                $rules = array_add($rules, 'B'.$question->id, 'integer|required');
            }  else {
                $rules = array_add($rules, 'B'.$question->id, 'min:0');
            }
        }
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
            $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','B')
                                                ->where('week',Input::get('week'))
                                                ->where('semister',Input::get('semister'))
                                                ->where('academic_year',Input::get('academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
            
            foreach($list_of_questions as $question){
                CourseAssessment::insert(
                        array(
                            'student_enrollment_id' => Input::get('enrollment_id'),
                            'question_id' => $question->id,
                            'assessment_value' => Input::get('B'.$question->id)
                        )
                );
            }
            
            return Redirect::route('coursesPage')
                            ->with('global',Input::get('course_code'));
        }
    }
    
    public function environmentAssessmentsValidator($input) {
        $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','C')
                                                ->where('week',array_get($input,'week'))
                                                ->where('semister',array_get($input,'semister'))
                                                ->where('academic_year',array_get($input,'academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
        
        $rules=array();
        
        foreach($list_of_questions as $question){
            if($question->data_type == 'integer'){
                $rules = array_add($rules, 'C'.$question->id, 'integer|required');
            }  else {
                $rules = array_add($rules, 'C'.$question->id, 'min:0');
            }
        }
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