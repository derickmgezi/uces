<?php

class AccountController extends BaseController {
    
    public function loginValidator($input){
        $rules=array(
                'id'=>'required|max:13',
                'password'=>'required'
            );
            return Validator::make($input, $rules);
    }

    public function login() {
        $validator = $this->loginValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('loginPage')
                    ->withErrors($validator)
                    ->withInput();
        }else{
            if (Auth::attempt(array('id' => Input::get('id'), 'password' => Input::get('password')))){
                $assessment_detail = AssessmentDetail::first();
                if(Week::findCurrentWeek($assessment_detail->semester_date) != $assessment_detail->current_week){
                    $assessment_detail->current_week = Week::findCurrentWeek($assessment_detail->semester_date);
                    $assessment_detail->save();
                }
                
                Session::put('user_name',Auth::user()->title." ".Auth::user()->first_name);
                Session::put('user_type',Auth::user()->user_type);
                
                return View::make('user.home');
            }else{
                return Redirect::route('loginPage')
                        ->withInput()
                        ->with('global','Account Credentials Dont Match');
            }
        }
    }
    
    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
}