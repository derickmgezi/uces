<?php

class HeadOfDepartment extends Eloquent{
    protected $table = "heads_of_department";
    
    protected $fillable = array(
        "id",
        "lecturer_id",
        "created_by_id"
    );
}
?>
