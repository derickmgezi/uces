<?php

class StudentCourseEnrollment extends Eloquent{
    protected $table = "student_course_enrollment";
    
    protected $fillable = array(
        "reg_no",
        "enrolled_course_id"
    );
}
?>
