<?php

class InstructorAssessment extends Eloquent{
    protected $table="instructor_assessment";
    
    protected $fillable = array(
        'student_enrollment_id',
        'question_id',
        'assessment_value'
    );
}
?>
