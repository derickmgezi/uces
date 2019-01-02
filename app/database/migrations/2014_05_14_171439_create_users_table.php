<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {
    public function up(){
        Schema::create('users',function($attrib){
            $attrib->string("id")->primary();
            $attrib->string("first_name");
            $attrib->string("middle_name");
            $attrib->string("last_name");
            $attrib->string('title')->nullable();
            $attrib->string('password',60);
            $attrib->string('user_type');
            $attrib->string('remember_token',100)->nullable();
            
            $attrib->timestamps();
            
        });
    }

    public function down(){
        Schema::drop("users");
    }
}
