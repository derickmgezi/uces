<?php

class AssessmentDetail extends Eloquent{
    protected $table = 'assessment_details';
    
    protected $fillable = array(
        'academic_year',
        'semester',
        'semester_date',
        'current_week'
    );
}

