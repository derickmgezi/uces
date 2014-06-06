<?php 
$users = User::all();
$users_with_issues = array();
$count = 0;
?>
@foreach($users as $user)
    @if($user->user_type == 'Student')
        <?php
        $student_credentials = Student::find($user->id);
        $student_assessment_credentials = StudentAssessment::where('reg_no',$user->id)
                                                            ->get();
        ?>
        @if(count($student_credentials) == 0)
            <?php
            $users_with_issues[$count] = array('user_id'=>$user->id,'issue'=>'Student has no department');
            $count++;
            ?>
        @elseif(count($student_assessment_credentials) == 0)
            <?php
            $users_with_issues[$count] = array('user_id'=>$user->id,'issue'=>'Student has no course');
            $count++;
            ?>
        @endif
    @elseif($user->user_type == 'Lecturer')
         <?php
        $lecturer_credentials = Lecturer::find($user->id);
        $lecturer_assessment_credentials = LecturerCourseAssessment::where('lecturer_id',$user->id)
                                                            ->get();
        ?>
        @if(count($lecturer_credentials) == 0)
            <?php
            $users_with_issues[$count] = array('user_id'=>$user->id,'issue'=>'Lecturer has no department');
            $count++;
            ?>
        @elseif(count($lecturer_assessment_credentials) == 0)
            <?php
            $users_with_issues[$count] = array('user_id'=>$user->id,'issue'=>'Lecturer not assigned a course');
            $count++;
            ?>
        @endif
    @elseif($user->user_type == 'Head of Department')
         <?php
        $head_credentials = HeadOfDepartment::find($user->id);
        ?>
        @if(count($head_credentials) == 0)
            <?php
            $users_with_issues[$count] = array('user_id'=>$user->id,'issue'=>'Head of Department has not been assign a department');
            $count++;
            ?>
        @endif
    @elseif($user->user_type == 'QAB Staff')
         <?php
        $QAB_credentials = QAB::find($user->id);
        ?>
        @if(count($QAB_credentials) == 0)
            <?php
            $users_with_issues[$count] = array('user_id'=>$user->id,'issue'=>'This QAB Staff has not been assigned a position');
            $count++;
            ?>
        @endif
    @endif
@endforeach
@if(count($users_with_issues) > 0)
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th colspan="3" class="text-primary">Users with incomplete credentials</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Issue Type</th>
                <th><center>Solve Issue</center></th>
            </tr>
        </thead>
        @foreach($users_with_issues as $user_with_issue)
            <tr>
                <td><small><strong>{{User::find($user_with_issue['user_id'])->title.' '.User::find($user_with_issue['user_id'])->first_name.' '.User::find($user_with_issue['user_id'])->midlle_name.' '.User::find($user_with_issue['user_id'])->last_name}}</strong></small></td>
                <td><small class="text-primary">{{$user_with_issue['issue']}}</small></td>
                <td><center><a href="{{URL::to('user/solveUserIssue/'.$user_with_issue['user_id'])}}" class="btn btn-success btn-xs">solve</a</center></td>
            </tr>
        @endforeach
    </table>
</div>
@else
<div class="alert alert-success">
    <small><strong>All users have valid credentials</strong></small>
</div>
@endif