<?php

class EnvironmentAssessment extends Eloquent{
    protected $table="environment_assessment";
    
    protected $fillable = array(
        'venue_course_id',
        'question_id',
        'assessment_value'
    );
}
?>


