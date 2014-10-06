<?php

class Lecturer extends Eloquent{
    protected $table = "lecturers";
    
    protected $fillable = array(
        "id",
        "department_id",
        "position",
        "status"
    );
}
?>
