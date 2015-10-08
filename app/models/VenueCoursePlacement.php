<?php

class VenueCoursePlacement extends Eloquent{
    protected $table = "venue_course_placement";
    
    protected $fillable = array(
        'venue_id',
        'assignment_id'
    );
}
?>
