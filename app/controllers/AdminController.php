<?php

class AdminController extends \BaseController {
    public function userValidator($input) {
        $rules=array(
                'first_name'=>'required',
                'sir_name'=>'required',
                'middle_name'=>'min:0',
                'id'=>'required|unique:users,id',
                'title'=>'required',
                'user_type'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function addUser() {
        $validator = $this->userValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('add_user'));
        }else{
            $user = new User();
            $id = Input::get('id');
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('sir_name');
            $user->middle_name = Input::get('middle_name');
            $user->password = Hash::make(Input::get('sir_name'));
            if(Input::get('title') == 'null'){
                $user->title = '';
            }else{
                $user->title = Input::get('title');
            }
            $user->user_type =  Input::get('user_type');
            $user->save();
            
            if(Input::get('user_type') == 'Student'){
                Session::put('reg_no',Input::get('id'));
            }elseif(Input::get('user_type') == 'Lecturer'){
                Session::put('lecturer_id',Input::get('id'));
            }elseif(Input::get('user_type') == 'QAB Staff'){
                Session::put('QAB_id',Input::get('id'));
            }elseif(Input::get('user_type') == 'Head of Department'){
                Session::put('hd_id',Input::get('id'));
            }elseif(Input::get('user_type') == 'Administrator'){
                return Redirect::route('managePage')
                    ->with('message','Administrator was Added Succesfully')
                    ->with('global',Input::get('add_user'));
            }
            
            return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
        }
    }
    
    public function studentValidator($input) {
        $rules=array(
                'department'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function addStudent() {
        $validator = $this->studentValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('add_user'));
        }else{
            $student = new Student();
            $student->id = Session::get('reg_no');
            $student->department_id = Input::get('department');
            $student->save();
            Session::put('department',Input::get('department'));
            
            return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
        }
    }
    
    public function addStudentCourse() {
        foreach(Input::get('course') as $course){
            $student_course = new StudentAssessment();
            $student_course->reg_no = Session::get('reg_no');
            $course = LecturerCourseAssessment::find($course);
            $student_course->course_code = $course->course_code;
            $student_course->academic_year = $course->academic_year;
            $student_course->save();
        }
        Session::forget('reg_no');
        Session::forget('department');
        return Redirect::route('managePage')
                    ->with('message','Student was Added Succesfully')
                    ->with('global',Input::get('add_user'));
    }
    
    public function lecturerValidator($input) {
        $rules=array(
                'department'=>'required',
                'position'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function addLecturer() {
        $validator = $this->lecturerValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('add_user'));
        }else{
            $lecturer = new Lecturer();
            $lecturer->id = Session::get('lecturer_id');
            $lecturer->position = Input::get('position');
            $lecturer->department_id = Input::get('department');
            $lecturer->save();
            Session::put('department',Input::get('department'));
            
            return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
        }
    }
    
    public function addLecuturerCourse() {
        foreach(Input::get('course') as $course){
            $lecturer_course = new LecturerCourseAssessment();
            $lecturer_course->course_code = $course;
            $lecturer_course->academic_year = str_replace('/20','/',(date('Y')-1).'/'.date('Y'));
            $lecturer_course->lecturer_id = Session::get('lecturer_id');
            $lecturer_course->save();
        }
        Session::forget('lecturer_id');
        Session::forget('department');
        return Redirect::route('managePage')
                    ->with('message','Lecturer was Added Succesfully')
                    ->with('global',Input::get('add_user'));
    }
    
    public function headofDepartmentValidator($input) {
        $rules=array(
                'department'=>'required',
                'lecturer_id'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function addHeadofDepartment() {
        $validator = $this->headofDepartmentValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('add_user'));
        }else{
            $head_of_department = new HeadOfDepartment();
            $head_of_department->id = Session::get('hd_id');
            $head_of_department->lecturer_id = Input::get('lecturer_id');
            $head_of_department->save();
            Session::forget('hd_id');
            
            return Redirect::route('managePage')
                    ->with('message','Head of Department was Added Succesfully')
                    ->with('global',Input::get('add_user'));
        }
    }
    
    public function qabStaffValidator($input) {
        $rules=array(
                'position'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function addQABStaff() {
        $validator = $this->qabStaffValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global',Input::get('add_user'));
        }else{
            $QAB_staff = new Qab();
            $QAB_staff->id = Session::get('QAB_id');
            $QAB_staff->position = Input::get('position');
            $QAB_staff->save();
            Session::forget('QAB_id');
            
            return Redirect::route('managePage')
                    ->with('message','QAB Staff was Added Succesfully')
                    ->with('global',Input::get('add_user'));
        }
    }
    
    public function solveIssue($id) {
        $user_with_issue = User::find($id);
        
        if($user_with_issue->user_type == 'Student'){
            $student_credentials = Student::find($id);
            $student_assessment_credentials = StudentAssessment::where('reg_no',$id)
                                                                ->get();
            
            if(count($student_credentials) == 0){
                Session::forget('lecture_id');
                Session::forget('QAB_id');
                Session::forget('hd_id');
                Session::forget('department');
                Session::put('reg_no',$id);
                return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
            }elseif(count($student_assessment_credentials) == 0){
                Session::forget('lecture_id');
                Session::forget('QAB_id');
                Session::forget('hd_id');
                Session::put('reg_no',$id);
                Session::put('department',$student_credentials->department_id);
                return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
            }
        }elseif($user_with_issue->user_type == 'Lecturer'){
            $lecturer_credentials = Lecturer::find($id);
            $lecturer_assessment_credentials = LecturerCourseAssessment::where('lecturer_id',$id)
                                                                ->get();
            if(count($lecturer_credentials) == 0){
                Session::forget('reg_no');
                Session::forget('QAB_id');
                Session::forget('hd_id');
                Session::forget('department');
                Session::put('lecturer_id',$id);
                return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
            }elseif(count($lecturer_assessment_credentials) == 0){
                Session::forget('reg_no');
                Session::forget('QAB_id');
                Session::forget('hd_id');
                Session::put('lecturer_id',$id);
                Session::put('department',$lecturer_credentials->department_id);
                return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
            }
        }elseif($user_with_issue->user_type == 'Head of Department'){
            $head_credentials = HeadOfDepartment::find($id);
            if(count($head_credentials) == 0){
                Session::forget('reg_no');
                Session::forget('lecture_id');
                Session::forget('QAB_id');
                Session::forget('department');
                Session::put('hd_id',$id);
                return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
            }
        }elseif($user_with_issue->user_type == 'QAB Staff'){
            $QAB_credentials = QAB::find($id);
            if(count($QAB_credentials) == 0){
                Session::forget('reg_no');
                Session::forget('lecture_id');
                Session::forget('hd_id');
                Session::forget('department');
                Session::put('QAB_id',$id);
                return Redirect::route('managePage')
                    ->with('global',Input::get('add_user'));
            }
        }
    }
}