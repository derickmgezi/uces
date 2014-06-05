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
            Session::flush();
            $hashed_password = md5(sha1(Input::get('password')));
            $user = User::where('id',Input::get('id'))
                                    ->where('password',$hashed_password)
                                    ->first();
            
            if($user){
                Auth::login($user);
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
        return Redirect::to('/');
    }
}