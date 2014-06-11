<?php

class AdminController extends \BaseController {
    public function cancelAddUser() {
        Session::forget('lecturer_id');
        Session::forget('QAB_id');
        Session::forget('hd_id');
        Session::forget('department');
        Session::forget('reg_no');
        return Redirect::route('managePage')
            ->with('global','add_user');
    }
    
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
                    ->with('global','add_user');
        }else{
            $user = new User();
            $user->id = Input::get('id');
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
            }elseif(Input::get('user_type') == 'Instructor'){
                Session::put('lecturer_id',Input::get('id'));
            }elseif(Input::get('user_type') == 'QAB Staff'){
                Session::put('QAB_id',Input::get('id'));
            }elseif(Input::get('user_type') == 'Head of Department'){
                Session::put('hd_id',Input::get('id'));
            }elseif(Input::get('user_type') == 'Administrator'){
                return Redirect::route('managePage')
                    ->with('message','Administrator was Added Succesfully')
                    ->with('global','add_user');
            }
            
            return Redirect::route('managePage')
                    ->with('global','add_user');
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
                    ->with('global','add_user');
        }else{
            $student = new Student();
            $student->id = Session::get('reg_no');
            $student->department_id = Input::get('department');
            $student->save();
            Session::put('department',Input::get('department'));
            
            return Redirect::route('managePage')
                    ->with('global','add_user');
        }
    }
    
    public function studentCourseValidator($input) {
        $rules=array(
                'course'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function addStudentCourse() {
        $validator = $this->studentCourseValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global','add_user');
        }else{
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
                        ->with('global','add_user'); 
        }
        
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
                    ->with('global','add_user');
        }else{
            $lecturer = new Lecturer();
            $lecturer->id = Session::get('lecturer_id');
            $lecturer->position = Input::get('position');
            $lecturer->department_id = Input::get('department');
            $lecturer->save();
            Session::put('department',Input::get('department'));
            
            return Redirect::route('managePage')
                    ->with('global','add_user');
        }
    }
    
    public function lecturerCourseValidator($input) {
        $rules=array(
                'course'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function addLecuturerCourse() {
        $validator = $this->lecturerCourseValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global','add_user');
        }else{
            foreach(Input::get('course') as $course){
                $lecturer_course = new LecturerCourseAssessment();
                $lecturer_course->course_code = $course;
                $lecturer_course->academic_year = '2013/14';
                $lecturer_course->lecturer_id = Session::get('lecturer_id');
                $lecturer_course->save();
            }
            Session::forget('lecturer_id');
            Session::forget('department');
            return Redirect::route('managePage')
                        ->with('message','Lecturer was Added Succesfully')
                        ->with('global','add_user');
        }
        
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
                    ->with('global','add_user');
        }else{
            $head_of_department = new HeadOfDepartment();
            $head_of_department->id = Session::get('hd_id');
            $head_of_department->lecturer_id = Input::get('lecturer_id');
            $head_of_department->save();
            Session::forget('hd_id');
            
            return Redirect::route('managePage')
                    ->with('message','Head of Department was Added Succesfully')
                    ->with('global','add_user');
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
                    ->with('global','add_user');
        }else{
            $QAB_staff = new Qab();
            $QAB_staff->id = Session::get('QAB_id');
            $QAB_staff->position = Input::get('position');
            $QAB_staff->save();
            Session::forget('QAB_id');
            
            return Redirect::route('managePage')
                    ->with('message','QAB Staff was Added Succesfully')
                    ->with('global','add_user');
        }
    }
    
    public function solveUserIssue($id) {
        $user_with_issue = User::find($id);
        
        if($user_with_issue->user_type == 'Student'){
            $student_credentials = Student::find($id);
            $student_assessment_credentials = StudentAssessment::where('reg_no',$id)
                                                                ->get();
            
            if(count($student_credentials) == 0){
                Session::forget('lecturer_id');
                Session::forget('QAB_id');
                Session::forget('hd_id');
                Session::forget('department');
                Session::put('reg_no',$id);
                return Redirect::route('managePage')
                    ->with('global','add_user');
            }elseif(count($student_assessment_credentials) == 0){
                Session::forget('lecturer_id');
                Session::forget('QAB_id');
                Session::forget('hd_id');
                Session::put('reg_no',$id);
                Session::put('department',$student_credentials->department_id);
                return Redirect::route('managePage')
                    ->with('global','add_user');
            }
        }elseif($user_with_issue->user_type == 'Instructor'){
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
                    ->with('global','add_user');
            }elseif(count($lecturer_assessment_credentials) == 0){
                Session::forget('reg_no');
                Session::forget('QAB_id');
                Session::forget('hd_id');
                Session::put('lecturer_id',$id);
                Session::put('department',$lecturer_credentials->department_id);
                return Redirect::route('managePage')
                    ->with('global','add_user');
            }
        }elseif($user_with_issue->user_type == 'Head of Department'){
            $head_credentials = HeadOfDepartment::find($id);
            if(count($head_credentials) == 0){
                Session::forget('reg_no');
                Session::forget('lecturer_id');
                Session::forget('QAB_id');
                Session::forget('department');
                Session::put('hd_id',$id);
                return Redirect::route('managePage')
                    ->with('global','add_user');
            }
        }elseif($user_with_issue->user_type == 'QAB Staff'){
            $QAB_credentials = QAB::find($id);
            if(count($QAB_credentials) == 0){
                Session::forget('reg_no');
                Session::forget('lecturer_id');
                Session::forget('hd_id');
                Session::forget('department');
                Session::put('QAB_id',$id);
                return Redirect::route('managePage')
                    ->with('global','add_user');
            }
        }
    }
    
    public function collegeValidator($input){
        $rules=array(
                'college_name'=>'required|unique:colleges,college_name',
                'college_id'=>'required|unique:colleges,id'
            );
            return Validator::make($input, $rules);
    }
    
    public function addCollege(){
        if(Input::has('college_id')){
            $validator = $this->collegeValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('managePage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('college','')
                        ->with('global','add_data');    
            }else{
                $college = new College();
                $college->id = Input::get('college_id');
                $college->college_name  = Input::get('college_name');
                $college->save();
                return Redirect::route('managePage')
                    ->with('message','College Added Succesfully')
                    ->with('department','')
                    ->with('global','add_data');
            }
        }else{
           return Redirect::route('managePage')
                    ->with('college','')
                    ->with('global','add_data'); 
        } 
    }
    
    public function departmentValidator($input){
        $rules=array(
                'department_id'=>'required|unique:departments,id',
                'department_name'=>'required|unique:departments,department_name',
                'college'=>'required'
                
            );
            return Validator::make($input, $rules);
    }
    
    public function addDepartment(){
        if(Input::has('department_id')){
            $validator  = $this->departmentValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('managePage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('department','')
                        ->with('global','add_data'); 
            }else{
                $department = new Department();
                $department->id = Input::get('department_id');
                $department->department_name = Input::get('department_name');
                $department->college_id = Input::get('college');
                $department->save();
                return Redirect::route('managePage')
                    ->with('message','Department Added Succesfully')
                    ->with('department','')
                    ->with('global','add_data');
            }
        }else{
          return Redirect::route('managePage')
                    ->with('department','')
                    ->with('global','add_data');  
        }
    }
    
    public function venueValidator($input){
        $rules=array(
                'venue_id'=>'required|unique:venues,id',
                'venue_name'=>'required|unique:venues,venue_name'
                
            );
            return Validator::make($input, $rules);
    }
    
    public function addVenue(){
        if(Input::has('venue_id')){
            $validator  = $this->venueValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('managePage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('venue','')
                        ->with('global','add_data'); 
            }else{
                $venue = new Venue();
                $venue->id = Input::get('venue_id');
                $venue->venue_name = Input::get('venue_name');
                $venue->save();
                return Redirect::route('managePage')
                        ->with('venue','')
                        ->with('message','Venue Added Succesfully')
                        ->with('global','add_data');
            }
         }else{
            return Redirect::route('managePage')
                        ->with('venue','')
                        ->with('global','add_data');
         }
    }
    
    public function courseValidator($input){
         $rules=array(
                'course_id'=>'required|unique:courses,id',
                'course_name'=>'required|unique:courses,course_name',
                'department'=>'required'
                
            );
            return Validator::make($input, $rules);
    }
    
    public function addCourse(){
         if(Input::has('course_id')){
            $validator  = $this->courseValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('managePage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('course','')
                        ->with('global','add_data'); 
            }else{
                $course = new Course();
                $course->id = Input::get('course_id');
                $course->course_name = Input::get('course_name');
                $course->department_id = Input::get('department');
                $course->save();
                return Redirect::route('managePage')
                        ->with('course','')
                        ->with('message','Course Added Succesfully')
                        ->with('global','add_data');
            }
         }else{
            return Redirect::route('managePage')
                        ->with('course','')
                        ->with('global','add_data');
         }
    }
    
    public function solveDataIssue($id,$issue) {
        if($issue == 'College has no department'){
            return Redirect::route('managePage')
                    ->with('department',$id)
                    ->with('global','add_data');
        }elseif($issue = 'Department has no courses'){
            return Redirect::route('managePage')
                        ->with('course',$id)
                        ->with('global','add_data');
        }elseif($issue = 'Course has not been assigned to any lecture'){
            
        }elseif($issue = 'Course has not been assigned to any Student'){
            
        }
    }
    
    public function viewAllUsers(){
        $all_users = User::all();
        return Redirect::route('managePage')
                ->with('all_users',$all_users)
                ->with('global','view_users');
    }
    
    public function viewStudents(){
        $all_students = Student::all();
        return Redirect::route('managePage')
                ->with('all_students',$all_students)
                ->with('global','view_users');
    }
    
    public function viewLecturers(){
        $all_leturers = Lecturer::all();
        
        return Redirect::route('managePage')
                ->with('all_lecturers',$all_leturers)
                ->with('global','view_users');
    }
    
    public function viewHeadsofDepartment(){
        $all_heads = HeadOfDepartment::all();
        
        return Redirect::route('managePage')
                ->with('all_heads',$all_heads)
                ->with('global','view_users');
    }
    
    public function viewQABStaff(){
        $all_QAB_staff = Qab::all();
        
        return Redirect::route('managePage')
                ->with('all_QAB_staff',$all_QAB_staff)
                ->with('global','view_users');
    }
    
    public function viewAdmins(){
        $all_admins = User::where('user_type','Administrator')
                            ->get();
        
        return Redirect::route('managePage')
                ->with('all_admins',$all_admins)
                ->with('global','view_users');
    }
    
    public function viewColleges(){
        $colleges = College::all();
        
        return Redirect::route('managePage')
                ->with('colleges',$colleges)
                ->with('global','view_data');
    }
    
    public function viewDepartments(){
        $departments = Department::all();
        
        return Redirect::route('managePage')
                ->with('departments',$departments)
                ->with('global','view_data');
    }
    
    public function viewVenues(){
        $venues = Venue::all();
        
        return Redirect::route('managePage')
                ->with('venues',$venues)
                ->with('global','view_data');
    }
    
    public function viewCourses(){
        $courses = Course::all();
        
        return Redirect::route('managePage')
                ->with('courses',$courses)
                ->with('global','view_data');
    }
    
    public function departmentReportValidator($input) {
        $rules=array(
                'department'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function generateDepartmentReport() {
        if(Input::has('department')){
            $validator = $this->departmentReportValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('reportsPage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('department_report','')
                        ->with('global','instructor');
            }else{
                return Redirect::route('reportsPage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('department_report',Input::get('department'))
                        ->with('global','instructor');
            }
        }else{
            return Redirect::route('reportsPage')
                            ->with('department_report','')
                            ->with('global','instructor');
        }
    }
    
    public function collegeReportValidator($input) {
        $rules=array(
                'college'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function generateCollegeReport() {
        if(Input::has('college')){
            $validator = $this->collegeReportValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('reportsPage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('college_report','')
                        ->with('global','instructor');
            }else{
                return Redirect::route('reportsPage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('college_report',Input::get('college'))
                        ->with('global','instructor');
            }
        }else{
            return Redirect::route('reportsPage')
                ->with('college_report','')
                ->with('global','instructor');
        }
    }
    
    public function courseReportValidator($input) {
        $rules=array(
            'course'=>'required'
            );
        return Validator::make($input, $rules);
    }
    
    public function generateCourseReport() {
        if(Input::has('course')){
            $validator = $this->courseReportValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('reportsPage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('course_report','')
                        ->with('global','instructor');
            }else{
                return Redirect::route('reportsPage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('course_report',Input::get('course'))
                        ->with('global','instructor');
            }
        }else{
            return Redirect::route('reportsPage')
                ->with('course_report','')
                ->with('global','instructor');
        }
    }
}
