<?php

class Student extends Eloquent{
    protected $table = "students";
    
    protected $fillable = array(
                "id",
                "department_id",
                "first_name",
                "middle_name",
                "last_name",
                "password",
                "created_by_id"
    );
}
?>
