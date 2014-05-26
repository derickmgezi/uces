<?php

class venue extends Eloquent{
    protected $table = "venues";
    
    protected $fillable = array(
        'id',
        'venue_name'
    );
}
?>
