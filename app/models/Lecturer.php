<?php

class Lecturer extends EloquentUserProvider{
    protected $table = "lecturers";
    
    protected $fillable = array(
        "id",
        "department_id",
        "position"
    );
}
?>
