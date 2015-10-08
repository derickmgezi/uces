<?php

class LecturerCourseAssignment extends Eloquent{
    protected $table = "lecturer_course_assignment";
    
    protected $fillable = array(
        "course",
        "yr",
        "semister",
        "lecturer_id",
        "auth_14",
        "auth_overall"
    );
}

