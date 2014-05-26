<?php

class ProblemsReports extends Eloquent{
    protected $table="problems_reports";
    
    protected $fillable = array(
        'student_reg',
        'course_code',
        'academic_year',
        'problem'
    );
}
?>
