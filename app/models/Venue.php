<?php

class Venue extends Eloquent{
    protected $table = "venues";
    
    protected $fillable = array(
        'id',
        'venue_name'
    );
}
?>
