<?php

class AssessmentController extends \BaseController {
    public function classAssessmentsValidator($input) {
       $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','D')
                                                ->where('week',array_get($input,'week'))
                                                ->where('semister',array_get($input,'semister'))
                                                ->where('academic_year',array_get($input,'academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
        
        $rules=array();
        
        foreach($list_of_questions as $question){
            if($question->data_type == 'integer'){
                $rules = array_add($rules, 'D'.$question->id, 'integer|required');
            }  else {
                $rules = array_add($rules, 'D'.$question->id, 'min:0');
            }
        }
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
            $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','D')
                                                ->where('week',Input::get('week'))
                                                ->where('semister',Input::get('semister'))
                                                ->where('academic_year',Input::get('academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
            
            foreach($list_of_questions as $question){
                ClassAssessment::insert(
                        array(
                            'assignment_id' => Input::get('assignment_id'),
                            'question_id' => $question->id,
                            'assessment_value' => Input::get('D'.$question->id)
                        )
                );
            }
            
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
            $list_of_questions = AssessmentQuestion::select('id','data_type')
                                                ->where('section','C')
                                                ->where('week',Input::get('week'))
                                                ->where('semister',Input::get('semister'))
                                                ->where('academic_year',Input::get('academic_year'))
                                                ->orderBy('data_type')
                                                ->get();
            
            foreach($list_of_questions as $question){
                EnvironmentAssessment::insert(
                        array(
                            'placement' => Input::get('venue_course_id'),
                            'enrollment' => Input::get('enrollment_id'),
                            'question_id' => $question->id,
                            'assessment_value' => Input::get('C'.$question->id)
                        )
                );
            }
            
            return Redirect::route('coursesPage')
                            ->with('global',Input::get('course_code'));
        }
    }
}