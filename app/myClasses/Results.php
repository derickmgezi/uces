<?php

class Results {
    public static function classAssessment($field,$grade) {
        if ($grade == 5) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success my-resultBar-veritical-align" style="width: 100%"></div>
            </div>
            <?php
        }
        if ($grade == 4) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar my-resultBar-veritical-align" style="width: 80%"></div>
            </div>
            <?php
        }
        if ($grade == 3) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-info my-resultBar-veritical-align" style="width: 60%"></div>
            </div>
            <?php
        }
        if ($grade == 2) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-warning my-resultBar-veritical-align" style="width: 40%"></div>
            </div>
            <?php
        }
        if ($grade == 1) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-danger my-resultBar-veritical-align" style="width: 20%"></div>
            </div>
            <?php
        }
    }

public static function lecturerAssessmentInPercentage($exellent, $veryGood, $satisfactory, $poor, $veryPoor) {
        ?>
        <div class="progress progress-striped active">
            <div class="progress-bar progress-bar-success my-resultBar-veritical-align" style="width: <?php echo $exellent . '%'; ?>">
               <strong><?php if ($exellent != 0) echo $exellent . '%'; ?></strong>
            </div>
            <div class="progress-bar my-resultBar-veritical-align" style="width: <?php echo $veryGood . '%'; ?>">
                <strong><?php if ($veryGood != 0) echo $veryGood . '%'; ?></strong>
            </div>
            <div class="progress-bar progress-bar-info my-resultBar-veritical-align" style="width: <?php echo $satisfactory . '%'; ?>">
                <strong><?php if ($satisfactory != 0) echo $satisfactory . '%'; ?></strong>
            </div>
            <div class="progress-bar progress-bar-warning my-resultBar-veritical-align" style="width: <?php echo $poor . '%'; ?>">
                <strong><?php if ($poor != 0) echo $poor . '%'; ?></strong>
            </div>
            <div class="progress-bar progress-bar-danger my-resultBar-veritical-align" style="width: <?php echo $veryPoor . '%'; ?>">
                <strong><?php if ($veryPoor != 0) echo $veryPoor . '%'; ?></strong>
            </div>
        </div>
        <?php
    }
    
    public static function lecturerAssessment($question_id,$field, $excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count) {
        $total_assessments = $excellent_count + $very_good_count + $good_count + $satisfactory_count + $poor_count;
        $excellent_percentage = 0;
        $very_good_percentage = 0;
        $good_percentage = 0;
        $satisfactory_percentage = 0;
        $poor_percentage = 0;
        $grade=0;      
                if($total_assessments !=0){
                        //Generating percentages
                        $excellent_percentage = ($excellent_count/$total_assessments )*100;
                        $very_good_percentage = ($very_good_count/$total_assessments )*100;
                        $good_percentage = ($good_count/$total_assessments )*100;
                        $satisfactory_percentage = ($satisfactory_count/$total_assessments )*100;
                        $poor_percentage = ($poor_count/$total_assessments )*100;
                        
                        //Generating scale value
                        $grade = ($excellent_count*5 + $very_good_count*4 + $good_count*3 + $satisfactory_count*2 +$poor_count*1)/$total_assessments;
                }
                
        $percentage = ($grade/5 * 100);
        
        ?><strong><?php echo $field;?></strong>
        <span class="my-pull-up">&nbsp;
            <button href="#s<?php echo $question_id;?>" data-toggle="tab" class="btn btn-default btn-sm" title="scale">
                <i class="glyphicon glyphicon glyphicon-align-left"></i>
            </button>&nbsp;
            <button href="#p<?php echo $question_id;?>" data-toggle="tab" class="btn btn-default btn-sm" title="In Perccentage">
                <strong>%</strong>
            </button>
        </span><br>
         <div class="tab-content ">
             <div class="tab-pane fade in active" id="s<?php echo $question_id;?>"><?php
        if($percentage >= 80){?>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success my-resultBar-veritical-align" style="width: <?php echo $percentage;?>%">
                        <strong><?php echo $grade;?></strong>
                    </div>
                </div>
            <?php
        }elseif($percentage >= 60){
            ?>  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-primary my-resultBar-veritical-align" style="width: <?php echo $percentage;?>%">
                        <strong><?php echo $grade;?></strong>
                    </div>
                </div>
            <?php
        }elseif($percentage < 60){
            ?>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger my-resultBar-veritical-align" style="width: <?php echo $percentage;?>%">
                        <strong><?php echo $grade;?></strong>
                    </div>
                </div>
            <?php
        }
            ?></div>
              <div class="tab-pane fade" id="p<?php echo $question_id;?>"><?php
                Results::lecturerAssessmentInPercentage($excellent_percentage, $very_good_percentage, $good_percentage, $satisfactory_percentage, $poor_percentage);
            ?></div>
         </div><?php
        }
}