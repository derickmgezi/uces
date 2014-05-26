<?php

class College extends Eloquent{
    protected $table = "colleges";
    
    protected $fillable = array(
        "id",
        "college_name"
    );
}
?>
