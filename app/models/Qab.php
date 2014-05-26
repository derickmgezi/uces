<?php

class Qab extends Eloquent{
    protected $table = "qab";
    
    protected $fillable = array(
        "id",
        "first_name",
        "middle_ame",
        "last_name",
        "position",
        "password",
        "created_by_id"
    );
}
?>
