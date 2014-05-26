<?php

class AssessmentQuestion extends Eloquent{
    protected $table = 'assessment_questions';
    
    protected $fillable = array(
        'question',
        'question_id'
    );
}

