<?php

class Assess{
    public static function intructor($reg_no, $course, $academic_year, $week) {
        ?>
        <form class="table-responsive" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Part A: The Instructor</th>
                        <th class="text-success">5</th>
                        <th class="text-primary">4</th>
                        <th class="text-info">3</th>
                        <th class="text-warning">2</th>
                        <th class="text-danger pull-right">1</th>
                    </tr>
                </thead>
                <tr>
                    <td class="text-info">Instructor’s preparedness on the subject matter</td>
                    <td><input type="radio" name="B1" value="5"></td>
                    <td><input type="radio" name="B1" value="4"></td>
                    <td><input type="radio" name="B1" value="3"></td>
                    <td><input type="radio" name="B1" value="2"></td>
                    <td><input type="radio" name="B1" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Instructor’s possession of up-to-date skills and knowledge in the subject matter</td>
                    <td><input type="radio" name="B2" value="5"></td>
                    <td><input type="radio" name="B2" value="4"></td>
                    <td><input type="radio" name="B2" value="3"></td>
                    <td><input type="radio" name="B2" value="2"></td>
                    <td><input type="radio" name="B2" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Instructor’s mode of delivery of the subject matter (techniques and styles)</td>
                    <td><input type="radio" name="B3" value="5"></td>
                    <td><input type="radio" name="B3" value="4"></td>
                    <td><input type="radio" name="B3" value="3"></td>
                    <td><input type="radio" name="B3" value="2"></td>
                    <td><input type="radio" name="B3" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Instructor’s fairness in grading of assignments and tests against marking scheme</td>
                    <td><input type="radio" name="B4" value="5"></td>
                    <td><input type="radio" name="B4" value="4"></td>
                    <td><input type="radio" name="B4" value="3"></td>
                    <td><input type="radio" name="B4" value="2"></td>
                    <td><input type="radio" name="B4" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Instructor’s capacity to provide timely feedback on assignments and tests</td>
                    <td><input type="radio" name="B5" value="5"></td>
                    <td><input type="radio" name="B5" value="4"></td>
                    <td><input type="radio" name="B5" value="3"></td>
                    <td><input type="radio" name="B5" value="2"></td>
                    <td><input type="radio" name="B5" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Instructor’s attendance in the class</td>
                    <td><input type="radio" name="B6" value="5"></td>
                    <td><input type="radio" name="B6" value="4"></td>
                    <td><input type="radio" name="B6" value="3"></td>
                    <td><input type="radio" name="B6" value="2"></td>
                    <td><input type="radio" name="B6" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Instructor’s availability for consultations</td>
                    <td><input type="radio" name="B7" value="5"></td>
                    <td><input type="radio" name="B7" value="4"></td>
                    <td><input type="radio" name="B7" value="3"></td>
                    <td><input type="radio" name="B7" value="2"></td>
                    <td><input type="radio" name="B7" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Manner in which the Instructor interacts with students</td>
                    <td><input type="radio" name="B8" value="5"></td>
                    <td><input type="radio" name="B8" value="4"></td>
                    <td><input type="radio" name="B8" value="3"></td>
                    <td><input type="radio" name="B8" value="2"></td>
                    <td><input type="radio" name="B8" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Adequacy of Instructor’s guidance on learning materials</td>
                    <td><input type="radio" name="B9" value="5"></td>
                    <td><input type="radio" name="B9" value="4"></td>
                    <td><input type="radio" name="B9" value="3"></td>
                    <td><input type="radio" name="B9" value="2"></td>
                    <td><input type="radio" name="B9" value="1"></td>
                </tr>
                <tr>
                    <td class="text-info">Extent to which the Instructor relates the course to your area of study</td>
                    <td><input type="radio" name="B10" value="5"></td>
                    <td><input type="radio" name="B10" value="4"></td>
                    <td><input type="radio" name="B10" value="3"></td>
                    <td><input type="radio" name="B10" value="2"></td>
                    <td><input type="radio" name="B10" value="1"></td>
                </tr>
                <tr>
                    <td colspan="6" class="text-info">
                        Please give additional comments, if any, on the Instructor
                        <textarea class="form-control" rows="3" name="B11" value=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" align="right"><button name="instructor_assessment" type="submit" class="btn btn-primary btn-sm">Continue</button></td>
                </tr>
                <tr hidden>
                    <td colspan="" align="center"><input class="pull-left" type="text" name="course" value="<?php echo $course; ?>" ><input type="text" name="week" value="<?php echo $week; ?>" ><input class="pull-right" type="text" name="academic_year" value="<?php echo $academic_year; ?>" ></td>
                    <td colspan="5" align="center"><input type="text" name="reg_no" value="<?php echo $reg_no; ?>" ></td>
                </tr>
            </table>
        </form>
        <?php
    }
    
    public static function course($reg_no, $course, $academic_year, $week) {
        ?>
        <form class="table-responsive" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Part B: The Course</th>
                        <th>5</th>
                        <th>4</th>
                        <th>3</th>
                        <th>2</th>
                        <th>1</th>
                    </tr>
                </thead>
                <tr>
                    <td>How clear was the objective of the course?</td>
                    <td><input type="radio" name="B1" value="5"></td>
                    <td><input type="radio" name="B1" value="4"></td>
                    <td><input type="radio" name="B1" value="3"></td>
                    <td><input type="radio" name="B1" value="2"></td>
                    <td><input type="radio" name="B1" value="1"></td>
                </tr>
                <tr>
                    <td>How well was the course content coverage?</td>
                    <td><input type="radio" name="B2" value="5"></td>
                    <td><input type="radio" name="B2" value="4"></td>
                    <td><input type="radio" name="B2" value="3"></td>
                    <td><input type="radio" name="B2" value="2"></td>
                    <td><input type="radio" name="B2" value="1"></td>
                </tr>
                <tr>
                    <td>How good was the mode of assessment?</td>
                    <td><input type="radio" name="B3" value="5"></td>
                    <td><input type="radio" name="B3" value="4"></td>
                    <td><input type="radio" name="B3" value="3"></td>
                    <td><input type="radio" name="B3" value="2"></td>
                    <td><input type="radio" name="B3" value="1"></td>
                </tr>
                <tr>
                    <td>How useful were the teaching methods? (Class participation, demonstration, etc.)</td>
                    <td><input type="radio" name="B4" value="5"></td>
                    <td><input type="radio" name="B4" value="4"></td>
                    <td><input type="radio" name="B4" value="3"></td>
                    <td><input type="radio" name="B4" value="2"></td>
                    <td><input type="radio" name="B4" value="1"></td>
                </tr>
                <tr>
                    <td>How useful were the lecture notes and handouts?</td>
                    <td><input type="radio" name="B5" value="5"></td>
                    <td><input type="radio" name="B5" value="4"></td>
                    <td><input type="radio" name="B5" value="3"></td>
                    <td><input type="radio" name="B5" value="2"></td>
                    <td><input type="radio" name="B5" value="1"></td>
                </tr>
                <tr>
                    <td>How well did the course link theory and practice?</td>
                    <td><input type="radio" name="B6" value="5"></td>
                    <td><input type="radio" name="B6" value="4"></td>
                    <td><input type="radio" name="B6" value="3"></td>
                    <td><input type="radio" name="B6" value="2"></td>
                    <td><input type="radio" name="B6" value="1"></td>
                </tr>
                <tr>
                    <td>How relevant was the course to the job market?</td>
                    <td><input type="radio" name="B7" value="5"></td>
                    <td><input type="radio" name="B7" value="4"></td>
                    <td><input type="radio" name="B7" value="3"></td>
                    <td><input type="radio" name="B7" value="2"></td>
                    <td><input type="radio" name="B7" value="1"></td>
                </tr>
                <tr>
                    <td>How well did the course meet your expectations?</td>
                    <td><input type="radio" name="B8" value="5"></td>
                    <td><input type="radio" name="B8" value="4"></td>
                    <td><input type="radio" name="B8" value="3"></td>
                    <td><input type="radio" name="B8" value="2"></td>
                    <td><input type="radio" name="B8" value="1"></td>
                </tr>
                <tr>
                    <td colspan="6" >
                       Please suggest on how to improve on the delivery of the course
                        <textarea class="form-control" rows="3" name="B11" value=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" align="right"><button name="course_assessment" type="submit" class="btn btn-primary btn-sm">Continue</button></td>
                </tr>
                <tr hidden>
                    <td colspan="" align="center"><input class="pull-left" type="text" name="course" value="<?php echo $course; ?>" ><input type="text" name="week" value="<?php echo $week; ?>" ><input class="pull-right" type="text" name="academic_year" value="<?php echo $academic_year; ?>" ></td>
                    <td colspan="5" align="center"><input type="text" name="reg_no" value="<?php echo $reg_no; ?>" ></td>
                </tr>
            </table>
        </form>
        <?php
    }
    
    public static function environmment($reg_no, $course, $academic_year, $week) {
    ?>
        <form class="table-responsive" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Part C: The Learning Environment and Facilities</th>
                        <th>5</th>
                        <th>4</th>
                        <th>3</th>
                        <th>2</th>
                        <th>1</th>
                    </tr>
                </thead>
                <tr>
                    <td>Adequacy of space in lecture room for teaching and learning</td>
                    <td><input type="radio" name="B1" value="5"></td>
                    <td><input type="radio" name="B1" value="4"></td>
                    <td><input type="radio" name="B1" value="3"></td>
                    <td><input type="radio" name="B1" value="2"></td>
                    <td><input type="radio" name="B1" value="1"></td>
                </tr>
                <tr>
                    <td>Quality of lecture room for teaching and learning</td>
                    <td><input type="radio" name="B2" value="5"></td>
                    <td><input type="radio" name="B2" value="4"></td>
                    <td><input type="radio" name="B2" value="3"></td>
                    <td><input type="radio" name="B2" value="2"></td>
                    <td><input type="radio" name="B2" value="1"></td>
                </tr>
                <tr>
                    <td>Adequacy of tables and chairs in classroom</td>
                    <td><input type="radio" name="B3" value="5"></td>
                    <td><input type="radio" name="B3" value="4"></td>
                    <td><input type="radio" name="B3" value="3"></td>
                    <td><input type="radio" name="B3" value="2"></td>
                    <td><input type="radio" name="B3" value="1"></td>
                </tr>
                <tr>
                    <td>Quality of tables and chairs in classroom</td>
                    <td><input type="radio" name="B4" value="5"></td>
                    <td><input type="radio" name="B4" value="4"></td>
                    <td><input type="radio" name="B4" value="3"></td>
                    <td><input type="radio" name="B4" value="2"></td>
                    <td><input type="radio" name="B4" value="1"></td>
                </tr>
                <tr>
                    <td>Physical conditions of blackboard/whiteboard in classroom</td>
                    <td><input type="radio" name="B5" value="5"></td>
                    <td><input type="radio" name="B5" value="4"></td>
                    <td><input type="radio" name="B5" value="3"></td>
                    <td><input type="radio" name="B5" value="2"></td>
                    <td><input type="radio" name="B5" value="1"></td>
                </tr>
                <tr>
                    <td>Adequacy of lighting in the classroom</td>
                    <td><input type="radio" name="B6" value="5"></td>
                    <td><input type="radio" name="B6" value="4"></td>
                    <td><input type="radio" name="B6" value="3"></td>
                    <td><input type="radio" name="B6" value="2"></td>
                    <td><input type="radio" name="B6" value="1"></td>
                </tr>
                <tr>
                    <td>Availability of books and journals related to the course</td>
                    <td><input type="radio" name="B7" value="5"></td>
                    <td><input type="radio" name="B7" value="4"></td>
                    <td><input type="radio" name="B7" value="3"></td>
                    <td><input type="radio" name="B7" value="2"></td>
                    <td><input type="radio" name="B7" value="1"></td>
                </tr>
                    <td colspan="6" >
                       Please give additional comments, if any, on the learning environment and facilities
                        <textarea class="form-control" rows="3" name="B11" value=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" align="right"><button name="environment_assessment" type="submit" class="btn btn-primary btn-sm">Finish</button></td>
                </tr>
                <tr hidden>
                    <td colspan="" align="center"><input class="pull-left" type="text" name="course" value="<?php echo $course; ?>" ><input type="text" name="week" value="<?php echo $week; ?>" ><input class="pull-right" type="text" name="academic_year" value="<?php echo $academic_year; ?>" ></td>
                    <td colspan="5" align="center"><input type="text" name="reg_no" value="<?php echo $reg_no; ?>" ></td>
                </tr>
            </table>
        </form>
        <?php
    }
    
    public static function students($course, $academic_year, $week) {
        ?>
        <form class="table-responsive" method="post" action="user/assessClass">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Assess your class</th>
                        <th class="">5</th>
                        <th>4</th>
                        <th>3</th>
                        <th>2</th>
                        <th>1</th>
                    </tr>
                </thead>
                <tr>
                    <td>
                        Class’ preparedness on the subject matter
                        <?php if($errors->has('A1')){ ?>
                        <div class="text-danger pull-right"><strong>required</strong></div>
                        <?php } ?>
                    </td>
                    <td><input type="radio" name="A1" value="5"></td>
                    <td><input type="radio" name="A1" value="4"></td>
                    <td><input type="radio" name="A1" value="3"></td>
                    <td><input type="radio" name="A1" value="2"></td>
                    <td><input type="radio" name="A1" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Class’ possession of up-to-date skills and knowledge in the subject matter
                        
                        
                        
                    </td>
                    <td><input type="radio" name="A2" value="5"></td>
                    <td><input type="radio" name="A2" value="4"></td>
                    <td><input type="radio" name="A2" value="3"></td>
                    <td><input type="radio" name="A2" value="2"></td>
                    <td><input type="radio" name="A2" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Class’ mode of interaction of the subject matter (techniques and styles)
                        
                        
                        
                    </td>
                    <td><input type="radio" name="A3" value="5"></td>
                    <td><input type="radio" name="A3" value="4"></td>
                    <td><input type="radio" name="A3" value="3"></td>
                    <td><input type="radio" name="A3" value="2"></td>
                    <td><input type="radio" name="A3" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Class’ attendance
                        
                        
                        
                    </td>
                    <td><input type="radio" name="A4" value="5"></td>
                    <td><input type="radio" name="A4" value="4"></td>
                    <td><input type="radio" name="A4" value="3"></td>
                    <td><input type="radio" name="A4" value="2"></td>
                    <td><input type="radio" name="A4" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Class’ capacity to provide timely feedback on assignments and tests
                        
                        
                        
                    </td>
                    <td><input type="radio" name="A5" value="5"></td>
                    <td><input type="radio" name="A5" value="4"></td>
                    <td><input type="radio" name="A5" value="3"></td>
                    <td><input type="radio" name="A5" value="2"></td>
                    <td><input type="radio" name="A5" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Class’ frequent consultations
                    </td>
                    <td><input type="radio" name="A6" value="5"></td>
                    <td><input type="radio" name="A6" value="4"></td>
                    <td><input type="radio" name="A6" value="3"></td>
                    <td><input type="radio" name="A6" value="2"></td>
                    <td><input type="radio" name="A6" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Adequacy of Class’ using guidance on learning materials
                    </td>
                    <td><input type="radio" name="A7" value="5"></td>
                    <td><input type="radio" name="A7" value="4"></td>
                    <td><input type="radio" name="A7" value="3"></td>
                    <td><input type="radio" name="A7" value="2"></td>
                    <td><input type="radio" name="A7" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Manner in which the Class interacts with Instructor
                    </td>
                    <td><input type="radio" name="A8" value="5"></td>
                    <td><input type="radio" name="A8" value="4"></td>
                    <td><input type="radio" name="A8" value="3"></td>
                    <td><input type="radio" name="A8" value="2"></td>
                    <td><input type="radio" name="A8" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Extent to which the Class relates the course to the area of study
                    </td>
                    <td><input type="radio" name="A9" value="5"></td>
                    <td><input type="radio" name="A9" value="4"></td>
                    <td><input type="radio" name="A9" value="3"></td>
                    <td><input type="radio" name="A9" value="2"></td>
                    <td><input type="radio" name="A9" value="1"></td>
                </tr>
                <tr>
                    <td>
                        Extent to which the Class relates the course to the area of study
                        
                        
                        
                    </td>
                    <td><input type="radio" name="A10" value="5"></td>
                    <td><input type="radio" name="A10" value="4"></td>
                    <td><input type="radio" name="A10" value="3"></td>
                    <td><input type="radio" name="A10" value="2"></td>
                    <td><input type="radio" name="A10" value="1"></td>
                </tr>
                <tr>
                    <td colspan="6" >
                        General Remarks
                        <textarea class="form-control" rows="3" name="A11" value=""></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="6" align="right"><button name="submit" type="submit" class="btn btn-primary btn-sm">Submit</button></td>
                </tr>
                <tr hidden>
                    <td colspan="" align="center">
                        <input class="pull-left" type="text" name="course" value="<?php echo $course; ?>" >
                        <input type="text" name="week" value="<?php echo $week; ?>" ><input class="pull-right" type="text" name="academic_year" value="<?php echo $academic_year; ?>" ></td>
                </tr>
            </table>
        </form>
        <?php
    }
}

