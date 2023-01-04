<?php
// include '../controller/common.php'; // common kiem tra session
include '../common/database.php'; // database kết nối -> bắt buộc mọi controller phải có dòng này
include '../model/subject.php';
include '../model/teacher.php';


$subjects = get_all_subjects();
$teachers = get_all_teachers();

$errorsMissing = array('school_year' => '', 'subject_id' => '','teacher_id'=>'', 'week_day' => '', 'lession' => '','notes' => '');

if (isset($_POST['confirm_submit'])) {
    $school_year = $_POST['school_year'];
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];
    $week_day = $_POST['week_day'];
    $lession = $_POST['lession'];
    $notes = $_POST['notes'];

    if(!isset($school_year)){
        $errorsMissing['school_year'] = 'Hãy chọn năm học';
    }
    if(!isset($subject_id)){
        $errorsMissing['subject_id'] = 'Hãy chọn môn học';
    }
    if(!isset($teacher_id)){
        $errorsMissing['teacher_id'] = 'Hãy chọn giáo viên';
    }
    if(!isset($week_day)){
        $errorsMissing['week_day'] = 'Hãy chọn thứ trong tuần';
    }
    if(!isset($lession)){
        $errorsMissing['lession'] = 'Hãy chọn tiết học';
    }
    if(empty($notes)){
        $errorsMissing['notes'] = 'Hãy điền lưu ý';
    }

    if(empty($errorsMissing)){
        include_once "../views/schedule_add_confirm.php";
    } else {
        include_once "../views/schedule_add_input.php";
    }
} 
