@include('frame.header')
<div class="col-lg-2 col-md-3 col-sm-3 hidden-xs list-group-item" style="height: 557px">
</div>
<div class="col-lg-8 col-md-9 col-sm-9 my-scroll-body" style="height: 557px;padding-top: 10px">
    <?php
    
    
    
    $question = array();
    for($qn=1;$qn<12;$qn++){
        $week_of_assessment = array();
        for($week=6;$week<15;$week+=4){
            $course_department = array();
            for($dep=9;$dep<19;$dep+=5){
                $course_assessment = array();
                for($crs=1;$crs<9;$crs+=5){
                    $course_assessment = array_add($course_assessment, 'IS 28'.$crs, mt_rand(1,5));
                }
                $course_department = array_add($course_department, 'dep'.$dep, $course_assessment);
            }
            $week_of_assessment = array_add($week_of_assessment, 'week'.$week, $course_department);
        }
        $question = array_add($question, 'question'.$qn, $week_of_assessment);
    }
    ?><pre><?php print_r($question); ?></pre><?php
    //$weekly_results = array_add($weekly_results, 'week'.$week, rand(1,5));
    //$question = array_add($question,'question'.$qn,$weekly_results);
    //$course_assessed = array_add($course_assessed,'IS 28'.$crs,$question);
    ?>
</div>
<div class="col-lg-2 visible-lg list-group-item" style="height: 557px">
    
</div>
@include('frame.footer')