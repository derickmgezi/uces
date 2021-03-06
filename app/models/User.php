<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

 class User extends Eloquent implements UserInterface, RemindableInterface {
	protected $table = 'users';

	protected $hidden = array('password');

        protected $fillable = array(
           "id",
           "first_name",
           "middle_name",
           "last_name",
           'title',
           'password',
           'user_type'
        );


        public function getAuthIdentifier()
	{
		return $this->getKey();
	}
        
        /**
         * Set the password to be hashed when saved
         */
        public function setPasswordAttribute($password)
        {
            $this->attributes['password'] = \Hash::make($password);
        }

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
        
        //Solves Laravel Signup errors
	public function getRememberToken()
	{
		return $this->remember_token;
	}

        public function getRememberTokenName() {
            return 'remember_token';

        }

        public function setRememberToken($value) {
            $this->remember_token =$value;
        }
 
	
}
