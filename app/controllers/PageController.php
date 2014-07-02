<?php

class PageController extends \BaseController {

    public function loginPage(){
        Session::put('location','');
        return View::make('login');
    }
    
    public function account() {
       return View::make('user.account'); 
    }
    
    public function homePage(){
        Session::put('location','home');
        return View::make('user.home');
    }
    
    public function coursesPage(){
        Session::put('location','courses');
        return View::make('user.courses');
    }
    
    public function myCoursePage(){
        Session::put('location','myCourse');
        return View::make('user.myCourse');
    }
    
    public function lecturersPage(){
        Session::put('location','lecturers');
        return View::make('user.lecturers');
    }
    
    public function evaluationsPage(){
        Session::put('location','evaluations');
        return View::make('user.evaluations');
    }
    
    public function managePage(){
        Session::put('location','manage');
        return View::make('user.manage');
    }
    
    public function reportsPage() {
        Session::put('location','reports');
        return View::make('user.reports');
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