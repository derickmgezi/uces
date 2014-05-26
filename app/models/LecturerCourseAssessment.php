<?php

class LecturerCourseAssessment extends Eloquent{
    protected $table = "lecturers_courses_assessments";
    
    protected $fillable = array(
        "course_code",
        "academic_year",
        "venue_id",
        "lecturer_id",

        "a6_01",
        "a6_02",
        "a6_03",
        "a6_04",
        "a6_05",
        "a6_06",
        "a6_07",
        "a6_08",
        "a6_09",
        "a6_10",
        "a6_11",

        "a10_01",
        "a10_02",
        "a10_03",
        "a10_04",
        "a10_05",
        "a10_06",
        "a10_07",
        "a10_08",
        "a10_09",
        "a10_10",
        "a10_11",

        "a14_01",
        "a14_02",
        "a14_03",
        "a14_04",
        "a14_05",
        "a14_06",
        "a14_07",
        "a14_08",
        "a14_09",
        "a14_10",
        "a14_11"

    );
}

