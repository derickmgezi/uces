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
        elseif ($grade >= 4) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar my-resultBar-veritical-align" style="width: 80%"></div>
            </div>
            <?php
        }
        elseif ($grade >= 3) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-info my-resultBar-veritical-align" style="width: 60%"></div>
            </div>
            <?php
        }
        elseif ($grade >= 2) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-warning my-resultBar-veritical-align" style="width: 40%"></div>
            </div>
            <?php
        }
        elseif ($grade >= 1) {
            ?>
            <strong><?php echo $field; ?></strong><br>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-danger my-resultBar-veritical-align" style="width: 20%"></div>
            </div>
            <?php
        }
    }

    public static function lecturerAssessmentInPercentage($excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count) {
            $total_assessments = $excellent_count + $very_good_count + $good_count + $satisfactory_count + $poor_count;
            $excellent_percentage = 0;
            $very_good_percentage = 0;
            $good_percentage = 0;
            $satisfactory_percentage = 0;
            $poor_percentage = 0;
            
            if($total_assessments !=0){
                        //Generating percentages
                        $excellent_percentage = ($excellent_count/$total_assessments )*100;
                        $very_good_percentage = ($very_good_count/$total_assessments )*100;
                        $good_percentage = ($good_count/$total_assessments )*100;
                        $satisfactory_percentage = ($satisfactory_count/$total_assessments )*100;
                        $poor_percentage = ($poor_count/$total_assessments )*100;
                }
            ?>
            <div class="progress progress-striped active">
                <div class="progress-bar progress-bar-success my-resultBar-veritical-align" style="width: <?php echo $excellent_percentage . '%'; ?>">
                   <strong><?php if ($excellent_percentage != 0) echo round($excellent_percentage) . '%'; ?></strong>
                </div>
                <div class="progress-bar my-resultBar-veritical-align" style="width: <?php echo $very_good_percentage . '%'; ?>">
                    <strong><?php if ($very_good_percentage != 0) echo round($very_good_percentage) . '%'; ?></strong>
                </div>
                <div class="progress-bar progress-bar-info my-resultBar-veritical-align" style="width: <?php echo $good_percentage . '%'; ?>">
                    <strong><?php if ($good_percentage != 0) echo round($good_percentage) . '%'; ?></strong>
                </div>
                <div class="progress-bar progress-bar-warning my-resultBar-veritical-align" style="width: <?php echo $satisfactory_percentage . '%'; ?>">
                    <strong><?php if ($satisfactory_percentage != 0) echo round($satisfactory_percentage) . '%'; ?></strong>
                </div>
                <div class="progress-bar progress-bar-danger my-resultBar-veritical-align" style="width: <?php echo $poor_percentage . '%'; ?>">
                    <strong><?php if ($poor_percentage != 0) echo round($poor_percentage) . '%'; ?></strong>
                </div>
            </div>
            <?php
        }
    
    public static function lecturerAssessment($question_id,$field,$grade) {
        $percentage = ($grade/5 * 100);
        
        ?><strong><small><?php echo $field;?></small></strong>
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
                        <strong><?php echo round($grade,1);?></strong>
                    </div>
                </div>
            <?php
        }elseif($percentage >= 60){
            ?>  <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-primary my-resultBar-veritical-align" style="width: <?php echo $percentage;?>%">
                        <strong><?php echo round($grade,1);?></strong>
                    </div>
                </div>
            <?php
        }elseif($percentage < 60){
            ?>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger my-resultBar-veritical-align" style="width: <?php echo $percentage;?>%">
                        <strong><?php echo round($grade,1);?></strong>
                    </div>
                </div>
            <?php
        }
            ?></div>
              <div class="tab-pane fade" id="p<?php echo $question_id;?>"><?php
                //Results::lecturerAssessmentInPercentage($excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count);
            ?></div>
         </div><?php
        }
        
        public static function instructorAssessments($question_id,$field, $excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count, $grade) {
            $total_assessments = $excellent_count + $very_good_count + $good_count + $satisfactory_count + $poor_count;

            $percentage = ($grade/5 * 100);

            ?><strong><small><?php echo $field;?></small></strong>
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
                            <strong><?php echo round($grade,1);?></strong>
                        </div>
                    </div>
                <?php
            }elseif($percentage >= 60){
                ?>  <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-primary my-resultBar-veritical-align" style="width: <?php echo $percentage;?>%">
                            <strong><?php echo round($grade,1);?></strong>
                        </div>
                    </div>
                <?php
            }elseif($percentage < 60){
                ?>
                    <div class="progress progress-striped active">
                        <div class="progress-bar progress-bar-danger my-resultBar-veritical-align" style="width: <?php echo $percentage;?>%">
                            <strong><?php echo round($grade,1);?></strong>
                        </div>
                    </div>
                <?php
            }
                ?></div>
                  <div class="tab-pane fade" id="p<?php echo $question_id;?>"><?php
                    Results::lecturerAssessmentInPercentage($excellent_count, $very_good_count, $good_count, $satisfactory_count, $poor_count);
                ?></div>
             </div><?php
        }
}