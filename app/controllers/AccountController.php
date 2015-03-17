<?php

class AccountController extends BaseController {
    
    public function loginValidator($input){
        $rules=array(
                'id'=>'required',
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
    
    public function accountValidator($input){
        $rules=array(
                'current_password'=>'required',
                'password'=>'required|min:8|confirmed',
                'password_confirmation'=>''
            );
            return Validator::make($input, $rules);
    }
    
    public function account() {
        $validator = $this->accountValidator(Input::all());
        
        if($validator->fails()){
            return Redirect::route('homePage')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('global','');
        }else{
            $user = User::find(Auth::user()->id);
            $user_password = $user->password;
            
            if(Hash::check(Input::get('current_password'),$user_password)){
                $user->password = Input::get('password');
                $user->save();
                return Redirect::route('homePage')
                                ->with('success','Password was Changed successfully')
                                ->with('global','account');
            }else{
                return Redirect::route('homePage')
                                ->with('error','Current password is incorrect')
                                ->with('current_password',Input::get('current_password'))
                                ->with('password',Input::get('password'))
                                ->with('password_confirmation',Input::get('password_confirmation'))
                                ->with('global','account');
            }
        }
    }
    
    public function logout(){
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
}