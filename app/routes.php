<?php

/*Unauthenticated group*/
Route::group(array('before'=>'guest'),function(){
    //CSRF-Cross Site Request Forgery protection
    Route::group(array('before'=>'csrf'),function(){
        //login to account (POST)
        Route::post('login',array(
            'as'=>'login',
            'uses'=>'AccountController@login'
        ));
    });
    
    Route::get('/',array(
        'as'=>'loginPage',
        'uses'=>'PageController@loginPage'
    ));
    
    Route::get('/loginPage',array(
        'as'=>'loginPage',
        'uses'=>'PageController@loginPage'
    ));
});

/*Authenticated group*/
Route::group(array('before'=>'auth'),function(){
    Route::get('/user/logout',array(
        'as'=>'logout',
        'uses'=>'AccountController@logout'
    ));
    
    Route::get('/user/home',array(
        'as'=>'homePage',
        'uses'=>'PageController@homePage'
    ));
    
    Route::get('/user/coursesPage',array(
        'as'=>'coursesPage',
        'uses'=>'PageController@coursesPage'
    ));
    
    Route::get('/user/myCoursePage',array(
        'as'=>'myCoursePage',
        'uses'=>'PageController@myCoursePage'
    ));
    
    Route::get('/user/managePage',array(
        'as'=>'managePage',
        'uses'=>'PageController@managePage'
    ));
    
    Route::get('/user/lecturersPage',array(
        'as'=>'lecturersPage',
        'uses'=>'PageController@lecturersPage'
    ));
    
    Route::get('/user/account',array(
        'as'=>'account',
        'uses'=>'PageController@account'
    ));
    
    Route::get('/user/evaluationsPage',array(
        'as'=>'evaluationsPage',
        'uses'=>'PageController@evaluationsPage'
    ));
    
    Route::get('/user/reportsPage',array(
        'as'=>'reportsPage',
        'uses'=>'PageController@reportsPage'
    ));
    
    Route::post('/user/assessClass',array(
        'as'=>'assessClass',
        'uses'=>'AssessmentController@assessClass'
    ));
    
    Route::post('/user/assessInstructor',array(
        'as'=>'assessInstructor',
        'uses'=>'AssessmentController@assessInstructor'
    ));
    
    Route::post('/user/assessCourse',array(
        'as'=>'assessCourse',
        'uses'=>'AssessmentController@assessCourse'
    ));
    
    Route::post('/user/assessEnvironment',array(
        'as'=>'assessEnvironment',
        'uses'=>'AssessmentController@assessEnvironment'
    ));
    
    Route::get('/user/cancelAddUser',array(
        'as'=>'cancelAddUser',
        'uses'=>'AdminController@cancelAddUser'
    ));
    
    Route::post('/user/addUser',array(
        'as'=>'addUser',
        'uses'=>'AdminController@addUser'
    ));
    
    Route::post('/user/addStudent',array(
        'as'=>'addStudent',
        'uses'=>'AdminController@addStudent'
    ));
    
    Route::post('/user/addStudentCourse',array(
        'as'=>'addStudentCourse',
        'uses'=>'AdminController@addStudentCourse'
    ));
    
    Route::post('/user/addLecturer',array(
        'as'=>'addLecturer',
        'uses'=>'AdminController@addLecturer'
    ));
    
    Route::post('/user/addLecuturerCourse',array(
        'as'=>'addLecuturerCourse',
        'uses'=>'AdminController@addLecuturerCourse'
    ));
    
    Route::post('/user/addHeadofDepartment',array(
        'as'=>'addHeadofDepartment',
        'uses'=>'AdminController@addHeadofDepartment'
    ));
    
    Route::post('/user/addQABStaff',array(
        'as'=>'addQABStaff',
        'uses'=>'AdminController@addQABStaff'
    ));
    
    Route::get('/user/solveUserIssue/{id}',array(
        'as'=>'solveUserIssue',
        'uses'=>'AdminController@solveUserIssue'
    ));
    
    Route::get('/user/solveDataIssue/{id}/{issue}',array(
        'as'=>'solveDataIssue',
        'uses'=>'AdminController@solveDataIssue'
    ));
    
    Route::get('/user/addCollege',array(
        'as'=>'addCollege',
        'uses'=>'AdminController@addCollege'
    ));
    
    Route::post('/user/addCollege',array(
        'as'=>'addCollege',
        'uses'=>'AdminController@addCollege'
    ));
    
    Route::get('/user/addDepartment',array(
        'as'=>'addDepartment',
        'uses'=>'AdminController@addDepartment'
    ));
    
    Route::post('/user/addDepartment',array(
        'as'=>'addDepartment',
        'uses'=>'AdminController@addDepartment'
    ));
    
    Route::get('/user/addVenue',array(
        'as'=>'addVenue',
        'uses'=>'AdminController@addVenue'
    ));
    
    Route::post('/user/addVenue',array(
        'as'=>'addVenue',
        'uses'=>'AdminController@addVenue'
    ));
    
    Route::get('/user/addCourse',array(
        'as'=>'addCourse',
        'uses'=>'AdminController@addCourse'
    ));
    
    Route::post('/user/addCourse',array(
        'as'=>'addCourse',
        'uses'=>'AdminController@addCourse'
    ));
    
    Route::get('/user/uploadExcelFile',array(
        'as'=>'uploadExcelFile',
        'uses'=>'AdminController@uploadExcelFile'
    ));
    
    Route::post('/user/uploadExcelFile',array(
        'as'=>'uploadExcelFile',
        'uses'=>'AdminController@uploadExcelFile'
    ));
    
    Route::post('/user/instructorEnrollStudents/{course?}',array(
        'as'=>'instructorEnrollStudents',
        'uses'=>'AdminController@instructorEnrollStudents'
    ));
    
    Route::get('/user/instructorEnrollStudents/{course?}',array(
        'as'=>'instructorEnrollStudents',
        'uses'=>'AdminController@instructorEnrollStudents'
    ));
    
    Route::get('/user/enrolledStudents/{course}',array(
        'as'=>'enrolledStudents',
        'uses'=>'AdminController@enrolledStudents'
    ));
    
    Route::post('/user/enrollStudents',array(
        'as'=>'enrollStudents',
        'uses'=>'AdminController@enrollStudents'
    ));
    
    Route::get('/user/enrollStudents',array(
        'as'=>'enrollStudents',
        'uses'=>'AdminController@enrollStudents'
    ));
    
    Route::get('/user/unenrollStudent/{reg_no}/{course}',array(
        'as'=>'unenrollStudent',
        'uses'=>'AdminController@unenrollStudent'
    ));
    
    Route::get('/user/enrollMoreStudents/{id}',array(
        'as'=>'enrollMoreStudents',
        'uses'=>'AdminController@enrollMoreStudents'
    ));
    
    Route::get('/user/assignCourseToLecturer/{id}',array(
        'as'=>'assignCourseToLecturer',
        'uses'=>'AdminController@assignCourseToLecturer'
    ));
    
    Route::get('/user/assignCourseToInstructor',array(
        'as'=>'assignCourseToInstructor',
        'uses'=>'AdminController@assignCourseToInstructor'
    ));
    
    Route::post('/user/assignCourseToInstructor',array(
        'as'=>'assignCourseToInstructor',
        'uses'=>'AdminController@assignCourseToInstructor'
    ));
    
    Route::get('/user/viewAllUsers',array(
        'as'=>'viewAllUsers',
        'uses'=>'AdminController@viewAllUsers'
    ));
    
    Route::get('/user/viewStudents',array(
        'as'=>'viewStudents',
        'uses'=>'AdminController@viewStudents'
    ));
    
    Route::get('/user/viewLecturers',array(
        'as'=>'viewLecturers',
        'uses'=>'AdminController@viewLecturers'
    ));
    
    Route::get('/user/viewHeadsofDepartment',array(
        'as'=>'viewHeadsofDepartment',
        'uses'=>'AdminController@viewHeadsofDepartment'
    ));
    
    Route::get('/user/viewQABStaff',array(
        'as'=>'viewQABStaff',
        'uses'=>'AdminController@viewQABStaff'
    ));
    
    Route::get('/user/viewAdmins',array(
        'as'=>'viewAdmins',
        'uses'=>'AdminController@viewAdmins'
    ));
    
    Route::get('/user/viewColleges',array(
        'as'=>'viewColleges',
        'uses'=>'AdminController@viewColleges'
    ));
    
    Route::get('/user/viewCourses',array(
        'as'=>'viewCourses',
        'uses'=>'AdminController@viewCourses'
    ));
    
    Route::get('/user/viewVenues',array(
        'as'=>'viewVenues',
        'uses'=>'AdminController@viewVenues'
    ));
    
    Route::get('/user/viewDepartments',array(
        'as'=>'viewDepartments',
        'uses'=>'AdminController@viewDepartments'
    ));
    
    Route::get('/user/generateCollegeReport',array(
        'as'=>'generateCollegeReport',
        'uses'=>'AdminController@generateCollegeReport'
    ));
    
    Route::post('/user/generateCollegeReport',array(
        'as'=>'generateCollegeReport',
        'uses'=>'AdminController@generateCollegeReport'
    ));
    
    Route::post('/user/generateCourseReport',array(
        'as'=>'generateCourseReport',
        'uses'=>'AdminController@generateCourseReport'
    ));
    
    Route::get('/user/generateCourseReport',array(
        'as'=>'generateCourseReport',
        'uses'=>'AdminController@generateCourseReport'
    ));
    
    Route::get('/user/generateDepartmentReport',array(
        'as'=>'generateDepartmentReport',
        'uses'=>'AdminController@generateDepartmentReport'
    ));
    
    Route::post('/user/generateDepartmentReport',array(
        'as'=>'generateDepartmentReport',
        'uses'=>'AdminController@generateDepartmentReport'
    ));
    
    Route::get('/user/excelReport/{category}/{id}',array(
        'as'=>'excelReport',
        'uses'=>'AdminController@excelReport'
    ));
    
    Route::get('/user/addQuestion/{part}',array(
        'as'=>'addQuestion',
        'uses'=>'AdminController@addQuestion'
    ));
    
    Route::post('/user/addQuestion/{part}',array(
        'as'=>'addQuestion',
        'uses'=>'AdminController@addQuestion'
    ));
    
    Route::get('/user/editQuestion/{id}/{part}',array(
        'as'=>'editQuestion',
        'uses'=>'AdminController@editQuestion'
    ));
    
    Route::post('/user/editQuestion/{id}/{part}',array(
        'as'=>'editQuestion',
        'uses'=>'AdminController@editQuestion'
    ));
    
    Route::get('/user/deleteQuestion/{id}/{part}',array(
        'as'=>'deleteQuestion',
        'uses'=>'AdminController@deleteQuestion'
    ));
    
    Route::get('/user/cancelAddQuestion/{part}',array(
        'as'=>'cancelAddQuestion',
        'uses'=>'AdminController@cancelAddQuestion'
    ));
    
    Route::get('user/printReport/{level}/{id}',array(
        'as'=>'printReport',
        'uses'=>'AdminController@printReport'
    ));
    
    Route::post('/user/editAssessmentDetails',array(
        'as'=>'editAssessmentDetails',
        'uses'=>'AdminController@editAssessmentDetails'
    ));
    
    Route::get('/user/editAssessmentDetails',array(
        'as'=>'editAssessmentDetails',
        'uses'=>'AdminController@editAssessmentDetails'
    ));
});