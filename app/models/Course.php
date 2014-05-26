<?php

class Course extends Eloquent{
    protected $table = "courses";
    
    protected $fillable = array(
        'id',
        'department_id',
        'course_name'
    );
}
?>
