<?php

class PageController extends \BaseController {

    public function loginPage(){
        return View::make('login');
    }
    
    public function homePage(){
        return View::make('user.home');
    }
    
    public function coursesPage(){
        return View::make('user.courses');
    }
    
    public function myCoursePage(){
        return View::make('user.myCourse');
    }
    
    public function lecturersPage(){
        return View::make('user.lecturers');
    }
    
    public function evaluationsPage(){
        return View::make('user.evaluations');
    }
    
    public function managePage(){
        return View::make('user.manage');
    }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}