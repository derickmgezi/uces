<?php
$assessment_detail = AssessmentDetail::first();
$colleges = College::all();
$all_departments = Department::all();
$all_courses = Course::all();
$all_assigned_courses = LecturerCourseAssignment::where("semister",$assessment_detail->semester)
                                                ->where("yr",$assessment_detail->academic_year)
                                                ->get();
$data_issues = array();
$issue_count = 0;

foreach($colleges as $college){
    $departments = Department::where('college_id',$college->id)
                            ->get();
    if(count($departments) == 0){
        $data_issues[$issue_count] = array('data_name'=>$college->college_name,'data_id'=>$college->id,'issue'=>'College has no department');
        $issue_count++;
    }
}

foreach($all_departments as $department){
    $courses = Course::where('department_id',$department->id)
                    ->get();
    if(count($courses) == 0){
        $data_issues[$issue_count] = array('data_name'=>$department->department_name,'data_id'=>$department->id,'issue'=>'Department has no courses');
        $issue_count++;
    }
}

foreach($all_courses as $course){
    $assigned_course = LecturerCourseAssignment::where('course',$course->id)
                                                ->get();
    if(count($assigned_course) == 0){
        $data_issues[$issue_count] = array('data_name'=>$course->course_name,'data_id'=>$course->id,'issue'=>'Course has not been assigned to any lecture');
        $issue_count++;
    }
}

foreach($all_assigned_courses as $assigned_course){
    $student_takes_course = StudentCourseEnrollment::where('enrolled_course_id',$assigned_course->id)
                                            ->get();
                                    
    if(count($student_takes_course) == 0){
        $data_issues[$issue_count] = array('data_name'=>Course::find($assigned_course->course)->course_name,'data_id'=>$assigned_course->id,'issue'=>'Course has not been assigned to any Student');
        $issue_count++;
    }
}
?>
@if(count($data_issues) > 0)
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th colspan="3" class="text-danger">Data with incomplete information</th>
            </tr>
        </thead>
        <thead>
            <tr>
                <th>Data Name</th>
                <th>Issue Type</th>
                <th><center>Solve Issue</center></th>
            </tr>
        </thead>
        @foreach($data_issues as $data_issue)
            <tr>
                <td><small class="text-primary"><strong>{{$data_issue['data_name']}}</strong></small></td>
                <td><small class="text-primary">{{$data_issue['issue']}}</small></td>
                <td>
                <center>
                    @if($data_issue['issue'] == 'Course has not been assigned to any lecture' || $data_issue['issue'] == 'Course has not been assigned to any Student')
                    <a class="btn btn-warning btn-xs disabled">pending ...</a>
                    @else
                    <a href="{{URL::to('user/solveDataIssue/'.$data_issue['data_id'].'/'.$data_issue['issue'])}}" class="btn btn-success btn-xs">solve</a>
                    @endif
                </center>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@else
<div class="alert alert-success">
    <small><strong>All Data is valid</strong></small>
</div>
@endif