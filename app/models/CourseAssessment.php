<?php

class CourseAssessment extends Eloquent{
    protected $table="course_assessment";
    
    protected $fillable = array(
        'student_enrollment_id',
        'question_id',
        'assessment_value'
    );
}
?>
