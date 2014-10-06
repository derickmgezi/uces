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
    
    public function uploadExcelFile($course = null) {
        if (Input::hasFile('excel_file')){
            if (Input::file('excel_file')->isValid()){
                $file_name = Input::file('excel_file')->getClientOriginalName();
                $file_extension = Input::file('excel_file')->getClientOriginalExtension();
                $path = Input::file('excel_file')->getRealPath();
                if($file_extension == 'xls' || $file_extension == 'xlsx' || $file_extension == 'csv'){
                    //Input::file('excel_file')->move('excel',$file_name);
                    if($file_name == 'assessment questions.'.$file_extension){
                         Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();
                            
                            // get sheets
                            foreach($work_book as $sheet){
                                //get rows
                                foreach($sheet as $row){
                                    //edit question
                                    $edit_question = AssessmentQuestion::where('question_id',$row->question_id)
                                                                        ->first();
                                    if($edit_question){
                                        $edit_question->question = $row->question;
                                        $edit_question->save();
                                    }else{
                                        $add_question = new AssessmentQuestion();
                                        $add_question->question = $row->question;
                                        $add_question->question_id = $row->question_id;
                                        $add_question->data_type = $row->data_type;
                                        $add_question->save();
                                    }
                                }
                            }
                         });
                         Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Assessment Questions were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'colleges.'.$file_extension){
                        Excel::load($path, function($reader) {
                            $file_name = Input::file('excel_file')->getClientOriginalName();
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    $edit_college = College::find($row->id);
                                    if($edit_college){
                                        $edit_college->college_name  = $row->college_name;
                                        $edit_college->save();
                                    }else{
                                        $college = new College();
                                        $college->id = $row->id;
                                        $college->college_name  = $row->college_name;
                                        $college->save();
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Colleges were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'departments.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    $find_college = College::find($row->college_id);
                                    if($find_college){
                                        $edit_department = Department::find($row->id);
                                        if($edit_department){
                                            $edit_department->college_id  = $row->college_id;
                                            $edit_department->department_name  = $row->department_name;
                                            $edit_department->save();
                                        }else{
                                            $department = new Department();
                                            $department->id  = $row->id;
                                            $department->college_id  = $row->college_id;
                                            $department->department_name  = $row->department_name;
                                            $department->save();
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Departments were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'venues.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    $edit_venue = Venue::find($row->id);
                                    if($edit_venue){
                                        $edit_venue->venue_name  = $row->venue_name;
                                        $edit_venue->save();
                                    }else{
                                        $venue = new Venue();
                                        $venue->id  = $row->id;
                                        $venue->venue_name  = $row->venue_name;
                                        $venue->save();
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Venues were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'lecturers.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    //alter user table
                                    $edit_user = User::find($row->id);
                                    if($edit_user){
                                       $edit_user->first_name = $row->first_name;
                                       if($row->middle_name == NULL){
                                            $edit_user->middle_name = '';
                                        }else{
                                            $edit_user->middle_name = $row->middle_name;
                                        }
                                       $edit_user->last_name = $row->last_name;
                                       $edit_user->title = $row->title;
                                       $edit_user->save();
                                    }else{
                                        $user = new User();
                                        $user->id = $row->id;
                                        $user->first_name = $row->first_name;
                                        if($row->middle_name == NULL){
                                            $user->middle_name = '';
                                        }else{
                                            $user->middle_name = $row->middle_name;
                                        }
                                        $user->last_name = $row->last_name;
                                        $user->title = $row->title;
                                        $user->password = Hash::make($row->last_name);
                                        $user->user_type = 'Instructor';
                                        $user->save();
                                    }
                                    //alter lecturer table
                                    $find_department = Department::find($row->department_id);
                                    if($find_department){
                                        $edit_lecturer = Lecturer::find($row->id);
                                        if($edit_lecturer){
                                            $edit_lecturer->position  = $row->position;
                                            $edit_lecturer->department_id  = $row->department_id;
                                            $edit_lecturer->save();
                                        }else{
                                            $lecturer = new Lecturer();
                                            $lecturer->id  = $row->id;
                                            $lecturer->position  = $row->position;
                                            $lecturer->department_id  = $row->department_id;
                                            $lecturer->save();
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Lectures were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'students.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    //alter user table
                                    $edit_user = User::find($row->id);
                                    if($edit_user){
                                       $edit_user->first_name = $row->first_name;
                                       if($row->middle_name == NULL){
                                            $edit_user->middle_name = '';
                                        }else{
                                            $edit_user->middle_name = $row->middle_name;
                                        }
                                       $edit_user->last_name = $row->last_name;
                                       $edit_user->save();
                                    }else{
                                        $user = new User();
                                        $user->id = $row->id;
                                        $user->first_name = $row->first_name;
                                        if($row->middle_name == NULL){
                                            $user->middle_name = '';
                                        }else{
                                            $user->middle_name = $row->middle_name;
                                        }
                                        $user->last_name = $row->last_name;
                                        $user->password = Hash::make($row->last_name);
                                        $user->user_type = 'Student';
                                        $user->save();
                                    }
                                    //alter student table
                                    $find_department = Department::find($row->department_id);
                                    if($find_department){
                                        $edit_student = Student::find($row->id);
                                        if($edit_student){
                                            $edit_student->department_id  = $row->department_id;
                                            $edit_student->save();
                                        }else{
                                            $student = new Student();
                                            $student->id  = $row->id;
                                            $student->department_id  = $row->department_id;
                                            $student->save();
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Students were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'heads of department.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    //alter user table
                                    $user_find = User::find($row->lecturer_id);
                                    if($user_find){
                                        $edit_user = User::find($row->id);
                                        if($edit_user){
                                            $edit_user->first_name = $user_find->first_name;
                                            $edit_user->middle_name = $user_find->middle_name;
                                            $edit_user->last_name = $user_find->last_name;
                                            $edit_user->title = $user_find->title;
                                            $edit_user->save();
                                        }else{
                                            $user = new User();
                                            $user->id = $row->id;
                                            $user->first_name = $user_find->first_name;
                                            $user->middle_name = $user_find->middle_name;
                                            $user->last_name = $user_find->last_name;
                                            $user->title = $user_find->title;
                                            $user->last_name = $user_find->last_name;
                                            $user->password = Hash::make($user_find->last_name);
                                            $user->user_type = 'Head of Department';
                                            $user->save();
                                        }
                                        //alter head_of_department table
                                        $find_lecture = Lecturer::find($row->lecturer_id);
                                        if($find_lecture){
                                            $edit_head_of_department = HeadOfDepartment::find($row->id);
                                            if($edit_head_of_department){
                                                $edit_head_of_department->lecturer_id  = $row->lecturer_id;
                                                $edit_head_of_department->save();
                                            }else{
                                                $head_of_department = new HeadOfDepartment();
                                                $head_of_department->id  = $row->id;
                                                $head_of_department->lecturer_id  = $row->lecturer_id;
                                                $head_of_department->save();
                                            }
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Heads of department were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'QAB staff.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    //alter user table
                                    $edit_user = User::find($row->id);
                                    if($edit_user){
                                       $edit_user->first_name = $row->first_name;
                                       if($row->middle_name == NULL){
                                            $edit_user->middle_name = '';
                                        }else{
                                            $edit_user->middle_name = $row->middle_name;
                                        }
                                       $edit_user->last_name = $row->last_name;
                                       $edit_user->title = $row->title;
                                       $edit_user->save();
                                    }else{
                                        $user = new User();
                                        $user->id = $row->id;
                                        $user->first_name = $row->first_name;
                                        if($row->middle_name == NULL){
                                            $user->middle_name = '';
                                        }else{
                                            $user->middle_name = $row->middle_name;
                                        }
                                        $user->last_name = $row->last_name;
                                        $user->title = $row->title;
                                        $user->password = Hash::make($row->last_name);
                                        $user->user_type = 'QAB Staff';
                                        $user->save();
                                    }
                                    //alter QAB table
                                    $edit_qab_staff = Qab::find($row->id);
                                    if($edit_qab_staff){
                                        $edit_qab_staff->position  = $row->position;
                                        $edit_qab_staff->save();
                                    }else{
                                        $qab_staff = new Qab();
                                        $qab_staff->id  = $row->id;
                                        $qab_staff->position  = $row->position;
                                        $qab_staff->save();
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','QAB staff were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'administrators.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    //alter user table
                                    $edit_user = User::find($row->id);
                                    if($edit_user){
                                       $edit_user->first_name = $row->first_name;
                                       if($row->middle_name == NULL){
                                            $edit_user->middle_name = '';
                                        }else{
                                            $edit_user->middle_name = $row->middle_name;
                                        }
                                       $edit_user->last_name = $row->last_name;
                                       $edit_user->title = $row->title;
                                       $edit_user->save();
                                    }else{
                                        $user = new User();
                                        $user->id = $row->id;
                                        $user->first_name = $row->first_name;
                                        if($row->middle_name == NULL){
                                            $user->middle_name = '';
                                        }else{
                                            $user->middle_name = $row->middle_name;
                                        }
                                        $user->last_name = $row->last_name;
                                        $user->title = $row->title;
                                        $user->password = Hash::make($row->last_name);
                                        $user->user_type = 'Administrator';
                                        $user->save();
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Administrators were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'courses.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    $find_department = Department::find($row->department_id);
                                    if($find_department){
                                        $edit_course = Course::find($row->id);
                                        if($edit_course){
                                            $edit_course->course_name  = $row->course_name;
                                            $edit_course->department_id  = $row->department_id;
                                            $edit_course->save();
                                        }else{
                                            $course = new Course();
                                            $course->id  = $row->id;
                                            $course->department_id  = $row->department_id;
                                            $course->course_name  = $row->course_name;
                                            $course->save();
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Courses were Updated Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'lecturer class assessments.'.$file_extension){
                        Excel::load($path, function($reader) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    $edit_lecturer_class_assessment = LecturerCourseAssessment::select('lecturer_id')
                                                                            ->where('course_code',$row->course_code)
                                                                            ->where('academic_year',$row->academic_year)
                                                                            ->update(array('lecturer_id' => $row->lecturer_id));
                                    if($edit_lecturer_class_assessment){
                                        
                                        
                                    }else{
                                        $course_exists = Course::find($row->course_code);
                                        $lecturer_exists = Lecturer::find($row->lecturer_id);
                                        $academic_year_valid = 0;
                                        $current_academic_year = AssessmentDetail::select('academic_year')->where('id',1)->pluck('academic_year');
                                        if($row->academic_year == $current_academic_year){
                                            $academic_year_valid = 1;
                                        }
                                        if($course_exists && $lecturer_exists && $academic_year_valid){
                                            $duplicate = LecturerCourseAssessment::where('course_code',$row->course_code)
                                                                            ->where('academic_year',$row->academic_year)
                                                                            ->where('lecturer_id',$row->lecturer_id)
                                                                            ->first();
                                            if(!$duplicate){
                                                $lecturer_class_assessment = new LecturerCourseAssessment();
                                                $lecturer_class_assessment->course_code  = $row->course_code;
                                                $lecturer_class_assessment->academic_year  = $row->academic_year;
                                                $lecturer_class_assessment->lecturer_id = $row->lecturer_id;
                                                $lecturer_class_assessment->save();
                                            }
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Lectures were assigned courses Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }elseif($file_name == 'student course assessments.'.$file_extension){
                        $user_type =  Session::get('user_type');
                        $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
                        Excel::load($path, function($reader) use($user_type,$course,$current_academic_year) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    $course_tought_exists = LecturerCourseAssessment::where('course_code',$row->course_code)
                                                                                    ->where('academic_year',$row->academic_year)
                                                                                    ->first();
                                    $student_exists = Student::find($row->reg_no);
                                    if($course_tought_exists && $student_exists){
                                        $duplicate = StudentAssessment::where('course_code',$row->course_code)
                                                                        ->where('academic_year',$row->academic_year)
                                                                        ->where('reg_no',$row->reg_no)
                                                                        ->first();
                                        if(!$duplicate){
                                            $student_course_assessment = new StudentAssessment();
                                            $student_course_assessment->course_code  = $row->course_code;
                                            $student_course_assessment->academic_year  = $row->academic_year;
                                            $student_course_assessment->reg_no = $row->reg_no;
                                            $student_course_assessment->save();
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('managePage')
                                            ->with('successExcelFileMessage','Students were enrolled to courses Successfully')
                                            ->with('excelFile','')
                                            ->with('global','add_data');
                    }else{
                        return Redirect::route('managePage')
                                    ->with('excelFileMessage','The uploaded '.$file_name.' file is not the required Excel File<br> Please upload Excel Files with valid names')
                                    ->with('excelFile','')
                                    ->with('global','add_data');
                    } 
                }else{
                    return Redirect::route('managePage')
                                    ->with('excelFileMessage','The uploaded '.$file_extension.' file is not valid <br> Please upload a valid Excel File with xls, xlsx, csv extensions')
                                    ->with('excelFile','')
                                    ->with('global','add_data');
                }
            }else{
                return Redirect::route('managePage')
                                ->with('excelFileMessage','The uploaded File is not Valid')
                                ->with('excelFile','')
                                ->with('global','add_data');
            }
        }else{
            //return "No File";
            return Redirect::route('managePage')
                            ->with('excelFile','')
                            ->with('global','add_data');
        }
    }
    
    public function instructorEnrollStudents($course) {
        if (Input::hasFile('excel_file')){
            if (Input::file('excel_file')->isValid()){
                $file_name = Input::file('excel_file')->getClientOriginalName();
                $file_extension = Input::file('excel_file')->getClientOriginalExtension();
                $path = Input::file('excel_file')->getRealPath();
                $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
                if($file_extension == 'xls' || $file_extension == 'xlsx' || $file_extension == 'csv'){
                    if($file_name == $course.' students '.str_replace('/','-',$current_academic_year).'.'.$file_extension){
                        $user_type =  Session::get('user_type');
                        Excel::load($path, function($reader) use($user_type,$course,$current_academic_year) {
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                if($user_type == 'Instructor'){
                                    foreach($sheet as $row){
                                        $student_exists = Student::find($row->reg_no);
                                        if($student_exists){
                                            $duplicate = StudentAssessment::where('course_code',$course)
                                                                            ->where('academic_year',$current_academic_year)
                                                                            ->where('reg_no',$row->reg_no)
                                                                            ->first();
                                            if(!$duplicate){
                                                $student_course_assessment = new StudentAssessment();
                                                $student_course_assessment->course_code  = $course;
                                                $student_course_assessment->academic_year  = $current_academic_year;
                                                $student_course_assessment->reg_no = $row->reg_no;
                                                $student_course_assessment->save();
                                            }
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('myCoursePage')
                                            ->with('successExcelFileMessage','Students were enrolled to courses Successfully')
                                            ->with('excelFile','')
                                            ->with('global',$course);
                    }else{
                        return Redirect::route('myCoursePage')
                                        ->with('excelFileMessage','The uploaded '.$file_name.' file is not the required Excel File<br> Please upload Excel Files with valid names')
                                        ->with('excelFile','')
                                        ->with('global',$course);
                    }
                }else{
                    return Redirect::route('myCoursePage')
                                    ->with('excelFileMessage','The uploaded '.$file_extension.' file is not valid <br> Please upload a valid Excel File with xls, xlsx, csv extensions')
                                    ->with('excelFile','')
                                    ->with('global',$course);
                }
            }else{
                return Redirect::route('myCoursePage')
                                ->with('excelFileMessage','The uploaded File is not Valid')
                                ->with('excelFile','')
                                ->with('global',$course);
            }
        }else{
            return Redirect::route('myCoursePage')
                            ->with('excelFile','')
                            ->with('global',$course);
        }
    }
    
    public function headOfDepartmentExcelFile($data,$department = null,$academic_year = null) {
        if (Input::hasFile('excel_file')){
            if (Input::file('excel_file')->isValid()){
                $file_name = Input::file('excel_file')->getClientOriginalName();
                $file_extension = Input::file('excel_file')->getClientOriginalExtension();
                $path = Input::file('excel_file')->getRealPath();
                if($file_extension == 'xls' || $file_extension == 'xlsx' || $file_extension == 'csv'){
                    if($file_name == $department.' instructors.'.$file_extension){
                        Excel::load($path, function($reader) use($department,$academic_year){
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    //alter user table
                                    $edit_user = User::find($row->id);
                                    $user_department = Lecturer::where('id',$row->id)->pluck('department_id');
                                    if($edit_user && $user_department == $department){
                                       $edit_user->first_name = $row->first_name;
                                       if($row->middle_name == NULL){
                                            $edit_user->middle_name = '';
                                        }else{
                                            $edit_user->middle_name = $row->middle_name;
                                        }
                                       $edit_user->last_name = $row->last_name;
                                       $edit_user->title = $row->title;
                                       $edit_user->save();
                                    }elseif(!$edit_user){
                                        $user = new User();
                                        $user->id = $row->id;
                                        $user->first_name = $row->first_name;
                                        if($row->middle_name == NULL){
                                            $user->middle_name = '';
                                        }else{
                                            $user->middle_name = $row->middle_name;
                                        }
                                        $user->last_name = $row->last_name;
                                        $user->title = $row->title;
                                        $user->password = Hash::make($row->last_name);
                                        $user->user_type = 'Instructor';
                                        $user->save();
                                    }
                                    //alter lecturer table
                                    $edit_lecturer = Lecturer::find($row->id);
                                    $edit_lecture_department = Lecturer::where('id',$row->id)->pluck('department_id');
                                    if($edit_lecture_department == $department){
                                        $edit_lecturer->position  = $row->position;
                                        $edit_lecturer->save();
                                    }elseif(!$edit_lecturer){
                                        $lecturer = new Lecturer();
                                        $lecturer->id  = $row->id;
                                        $lecturer->position  = $row->position;
                                        $lecturer->department_id  = $department;
                                        $lecturer->save();
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('lecturersPage')
                                            ->with('successExcelFileMessage','Instructors were added Successfully')
                                            ->with('instructorExcelFile',$data)
                                            ->with('global',$data);
                    }elseif($file_name == $department.' course assignment '.$academic_year.'.'.$file_extension){
                        Excel::load($path, function($reader) use($academic_year,$department){
                            // Getting all results
                            $work_book = $reader->get();

                            // get sheets
                            foreach($work_book as $sheet){
                                // get sheet title
                                $sheetTitle = $sheet->getTitle();

                                // get rows
                                foreach($sheet as $row){
                                    $course_exists = Course::where('id',$row->course_code)->where('department_id',$department)->first();
                                    $lecturer_exists = Lecturer::find($row->lecturer_id);
                                    if($course_exists && $lecturer_exists){
                                        $duplicate = LecturerCourseAssessment::where('course_code',$row->course_code)
                                                                        ->where('academic_year',str_replace('-', '/', $academic_year))
                                                                        ->where('lecturer_id',$row->lecturer_id)
                                                                        ->first();
                                        if(!$duplicate){
                                            $edit_lecturer_class_assessment = LecturerCourseAssessment::select('lecturer_id')
                                                                                                        ->where('course_code',$row->course_code)
                                                                                                        ->where('academic_year',  str_replace('-', '/', $academic_year))
                                                                                                        ->update(array('lecturer_id' => $row->lecturer_id));
                                            if(!$edit_lecturer_class_assessment){
                                                $lecturer_class_assessment = new LecturerCourseAssessment();
                                                $lecturer_class_assessment->course_code  = $row->course_code;
                                                $lecturer_class_assessment->academic_year  = str_replace('-', '/', $academic_year);
                                                $lecturer_class_assessment->lecturer_id = $row->lecturer_id;
                                                $lecturer_class_assessment->save();
                                            }
                                        }
                                    }
                                }
                            }
                        });
                        Input::file('excel_file')->move('excel',date('dmY-His').''.$file_name);
                        return Redirect::route('lecturersPage')
                                            ->with('successExcelFileMessage','Courses were successfully asigned to Instructors')
                                            ->with('instructorExcelFile',$data)
                                            ->with('global',$data);
                    }else{
                        return Redirect::route('lecturersPage')
                                        ->with('excelFileMessage','The uploaded '.$file_name.' file is not the required Excel File<br> Please upload Excel Files with valid names')
                                        ->with('instructorExcelFile',$data)
                                        ->with('global',$data);
                    }
                }else{
                    return Redirect::route('lecturersPage')
                                    ->with('excelFileMessage','The uploaded '.$file_extension.' file is not valid <br> Please upload a valid Excel File with xls, xlsx, csv extensions')
                                    ->with('instructorExcelFile',$data)
                                    ->with('global',$data);
                }
            }else{
                return Redirect::route('lecturersPage')
                                ->with('excelFileMessage','The uploaded File is not Valid')
                                ->with('instructorExcelFile',$data)
                                ->with('global',$data);
            }
        }else{
            return Redirect::route('lecturersPage')
                            ->with('instructorExcelFile',$data)
                            ->with('global',$data);
        }
    }
    
    public function manageInstructors($department) {
        $list_of_instructors = Lecturer::where('department_id',$department)->get();
        
        return Redirect::route('lecturersPage')
                            ->with('instructors',$list_of_instructors)
                            ->with('global','instructor');
    }
    
    public function manageCourses($department) {
        $list_of_courses = Course::where('department_id',$department)->get();
        
        return Redirect::route('lecturersPage')
                            ->with('courses',$list_of_courses)
                            ->with('global','course');
    }
    
    public function enrolledStudents($course) {
        $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
        $enrolledStudents = StudentAssessment::where('course_code',$course)
                                            ->where('academic_year',$current_academic_year)
                                            ->get();
        return Redirect::route('myCoursePage')
                        ->with('enrolledStudents',$enrolledStudents)
                        ->with('global',$course);
    }
    
    public function unenrollStudent($reg_no,$course) {
        $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
        
        $unenrollStudent = StudentAssessment::where('course_code',$course)
                                            ->where('academic_year',$current_academic_year)
                                            ->where('reg_no',$reg_no)
                                            ->delete();
        
         $enrolledStudents = StudentAssessment::where('course_code',$course)
                                            ->where('academic_year',$current_academic_year)
                                            ->get();
         
        return Redirect::route('myCoursePage')
                        ->with('unenrolledStudentMessage','A Student was succesfully unenrolled')
                        ->with('enrolledStudents',$enrolledStudents)
                        ->with('global',$course);
    }
    
    public function enrollStudentsValidator($input) {
        $rules=array(
                'student_id'=>'required',
                'course_code'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function enrollStudents(){
        if(Input::has('course_code') || Input::has('student_id')){
            $validator = $this->enrollStudentsValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('managePage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('enrollStudents','')
                        ->with('global','add_data'); 
            }else{
                foreach(Input::get('student_id') as $student_id){
                    $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
                    $lecture_exists = LecturerCourseAssessment::where('course_code',Input::get('course_code'))
                                                            ->where('academic_year',$current_academic_year)
                                                            ->first();
                    $student_exists = Student::find($student_id);
                    if($lecture_exists && $student_exists){
                        $dublicate = StudentAssessment::where('reg_no',$student_id)
                                                    ->where('course_code',Input::get('course_code'))
                                                    ->where('academic_year',$current_academic_year)
                                                    ->first();
                        if(!$dublicate){
                            $student_course = new StudentAssessment();
                            $student_course->reg_no = $student_id;
                            $student_course->course_code = Input::get('course_code');
                            $student_course->academic_year = $current_academic_year;
                            $student_course->save();
                        }
                    }
                }
                return Redirect::route('managePage')
                    ->with('enrollStudents','')
                    ->with('message','Students were Succesfully enrolled in '.Input::get('course_code'))
                    ->with('global','add_data');
            }
        }else{
             return Redirect::route('managePage')
                    ->with('enrollStudents','')
                    ->with('global','add_data');
        }
    }
    
    public function enrollMoreStudents($id) {
        return Redirect::route('managePage')
                    ->with('enrollStudents',$id)
                    ->with('global','add_data');
    }
    
    public function assignCourseToInstructorValidator($input) {
        $rules=array(
                'instructor_id'=>'required',
                'course_code'=>'required'
            );
            return Validator::make($input, $rules);
    }
    
    public function assignCourseToInstructor() {
        if(Input::has('course_code') || Input::has('instructor_id')){
            $validator = $this->assignCourseToInstructorValidator(Input::all());
            
            if($validator->fails()){
                return Redirect::route('managePage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('assignCourse','')
                        ->with('global','add_data'); 
            }else{
                $course_exists = Course::find(Input::get('course_code'));
                if($course_exists){
                    $current_academic_year = AssessmentDetail::where('id',1)->pluck('academic_year');
                    $lecture_assessment = new LecturerCourseAssessment();
                    $lecture_assessment->lecturer_id = Input::get('instructor_id');
                    $lecture_assessment->course_code = Input::get('course_code');
                    $lecture_assessment->academic_year = $current_academic_year;
                    $lecture_assessment->save();
                    
                    return Redirect::route('managePage')
                                    ->with('assignCourse','')
                                    ->with('message','Instructor were Succesfully assigned the course '.Input::get('course_code'))
                                    ->with('global','add_data');
                }
                
                return Redirect::route('managePage')
                                ->with('assignCourse','')
                                ->with('message','The course '.Input::get('course_code').' does not exist')
                                ->with('global','add_data');
            }
        }else{
             return Redirect::route('managePage')
                    ->with('assignCourse','')
                    ->with('global','add_data');
        }
    }
    
    public function assignCourseToLecturer($id) {
        return Redirect::route('managePage')
                    ->with('assignCourse',$id)
                    ->with('global','add_data');
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
                        ->with('course_report',Input::get('course'))
                        ->with('global','instructor');
            }
        }else{
            return Redirect::route('reportsPage')
                ->with('course_report','')
                ->with('global','instructor');
        }
    }
    
    public function excelReport($category,$id) {
        
            Excel::create($id.' Assessment Report', function($excel)use($id){
                $excel->sheet('sheet1', function($sheet)use($id) {
                    //merge cells
                    $sheet->mergeCells('A1:M1');
                    
                    //insert data into raw 1
                    $sheet->row(1, array(
                        Session::get('category')
                    ));
                    
                    // manipulate the cell A1
                    $sheet->cell('A1', function($cell) {
                        $cell->setAlignment('center');
                        $cell->setFontWeight('bold');
                        $cell->setFontSize(16);
                        $cell->setFontColor('#3c763d');
                    });
                    
                    //insert data into raw 2
                    $sheet->row(2, Session::get('header'));
                    
                    //insert data into raw 3 to raw n
                    $row = 3;
                    foreach(Session::get('results') as $department){
                        foreach($department as $course){
                            if(array_get($course, 'department_name')){
                                $sheet->mergeCells('A'.$row.':B'.$row);

                                $sheet->cells('A'.$row.':M'.$row, function($cells) {
                                    $cells->setAlignment('center');
                                    $cells->setFontWeight('bold');
                                    $cells->setFontColor('#31708f');
                                });

                                $sheet->row($row, $course);
                                $row++;
                            }elseif(array_get($course, 'college_name')){
                                $sheet->mergeCells('A'.$row.':B'.$row);

                                $sheet->cells('A'.$row.':M'.$row, function($cells) {
                                    $cells->setAlignment('center');
                                    $cells->setFontSize(13);
                                    $cells->setFontWeight('bold');
                                    $cells->setFontColor('#31708f');
                                });
                                $sheet->row($row, $course);
                                $row++;
                            }elseif(array_get($course, 'course_name')){
                                $sheet->cells('A'.$row.':M'.$row, function($cells) {
                                    $cells->setAlignment('center');
                                    $cells->setFontColor('#428bca');
                                });

                                $sheet->row($row, $course);
                                $row++;
                            }elseif(array_get($course, 'course_name')){

                                $sheet->row($row, $course);
                                $row++;
                            }
                        }
                    }
                });
            })->export('xlsx');
        
        if($category == 'college'){
            return Redirect::route('reportsPage')
                            ->with('excelReport','')
                            ->with('college_report',$id)
                            ->with('global','instructor');
        }elseif($category == 'department'){
            return Redirect::route('reportsPage')
                        ->with('excelReport','')
                        ->with('department_report',$id)
                        ->with('global','instructor');
        }elseif($category == 'course'){
            return Redirect::route('reportsPage')
                            ->with('excelReport','')
                            ->with('course_report',$id)
                            ->with('global','instructor');
        }
    }
    
    public function questionValidator($input) {
        $rules=array(
            'question'=>'required|unique:assessment_questions,question',
            'question_id'=>'required|unique:assessment_questions,question_id',
            'data_type'=>'required|between:6,7',
            );
        return Validator::make($input, $rules);
    }
    
    public function addQuestion($part) {
        if(Input::has('question')){
            $validator = $this->questionValidator(Input::all());

            if($validator->fails()){
            return Redirect::route('managePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('part',$part)
                    ->with('global','question');
            }else{
                $question = new AssessmentQuestion();
                $question->question = Input::get('question');
                $question->question_id = Input::get('question_id');
                $question->data_type = Input::get('data_type');
                $question->save();

                return Redirect::route('managePage')
                        ->with('question_message','New Question in part '.$part.' Added')
                        ->with('part',$part)
                        ->with('global','question');
            }
        }else{
            if($part == 'b' || $part == 'c' || $part == 'd'){
                $evaluation = 'course';
            }else{
                $evaluation = 'class';
            }
            
            return Redirect::route('managePage')
                    ->with('evaluation',$evaluation)
                    ->with('part',$part)
                    ->with('global','question');
        }
    }
    
    public function cancelAddQuestion($part) {
        if($part == 'b' || $part == 'c' || $part == 'd'){
            $evaluation = 'course';
        }else{
            $evaluation = 'class';
        }
        
        return Redirect::route('managePage')
                ->with('evaluation',$evaluation)
                ->with('global','question');
    }
    
    public function editQuestion($id,$part) {
        if(Input::has('question_id') && Input::has('question')){
            $edit_question = AssessmentQuestion::find($id);
            $edit_question->question = Input::get('question');
            $edit_question->question_id = Input::get('question_id');
             $edit_question->data_type = Input::get('data_type');
            $edit_question->save();
            
            return Redirect::route('managePage')
                        ->with('editedQuestion',$id)
                        ->with('evaluation',$part)
                        ->with('global','question');
        }else{
            if($part == 'b' || $part == 'c' || $part == 'd'){
                $evaluation = 'course';
            }else{
                $evaluation = 'class';
            }

            return Redirect::route('managePage')
                        ->with('editQuestion',$id)
                        ->with('evaluation',$evaluation)
                        ->with('global','question');
        }
    }
    
    public function deleteQuestion($id,$part) {
        $delete_question = AssessmentQuestion::find($id);
        $delete_question->delete();
        
        if($part == 'b' || $part == 'c' || $part == 'd'){
                $evaluation = 'course';
            }else{
                $evaluation = 'class';
            }
        
        return Redirect::route('managePage')
                        ->with('deletedQuestion',$part)
                        ->with('evaluation',$evaluation)
                        ->with('global','question');
    }
    
    public function assessmentDetailsValidator($input) {
        $rules=array(
            'academic_year'=>'required|min:7|max:7',
            'current_week'=>'required|integer|between:1,16',
            'semester'=>'required',
            'semester_begins'=>'required|date'
            );
        return Validator::make($input, $rules);
    }
    
    public function editAssessmentDetails() {
        if(Input::has('semester_begins')){
            $validator = $this->assessmentDetailsValidator(Input::all());

            if($validator->fails()){
                return Redirect::route('managePage')
                        ->withErrors($validator)
                        ->withInput()
                        ->with('editAssessmentDetail','')
                        ->with('global','assessmentDetails');
            }else{
                $edit_assessment_details = AssessmentDetail::first();
                $edit_assessment_details->academic_year = Input::get('academic_year');
                $edit_assessment_details->current_week = Input::get('current_week');
                $edit_assessment_details->semester = Input::get('semester');
                $edit_assessment_details->semester_date = Input::get('semester_begins');
                $edit_assessment_details->save();
                
                Session::put('current_week',Input::get('current_week'));

                return Redirect::route('managePage')
                        ->with('assessmentDetailsMessage','Assessment Details have been Edited')
                        ->with('global','assessmentDetails');
            }
        }else{
            return Redirect::route('managePage')
                        ->with('editAssessmentDetail','')
                        ->with('global','assessmentDetails');
        }
    }
}
