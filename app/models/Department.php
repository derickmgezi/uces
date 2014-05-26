<?php

class Department extends Eloquent{
    protected $table="departments";
    
    protected $fillable = array(
        "id",
        "college_id",
        "department_name"
    );
}
?>
