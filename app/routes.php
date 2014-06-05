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
    
    Route::get('/user/evaluationsPage',array(
        'as'=>'evaluationsPage',
        'uses'=>'PageController@evaluationsPage'
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
    
    Route::get('/user/solveIssue/{id}',array(
        'as'=>'solveIssue',
        'uses'=>'AdminController@solveIssue'
    ));
});