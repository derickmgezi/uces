<?php

class ClassAssessment extends Eloquent{
    protected $table="class_assessment";
    
    protected $fillable = array(
        'assignment_id',
        'question_id',
        'assessment_value'
    );
}
?>
