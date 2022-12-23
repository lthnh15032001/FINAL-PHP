<?php


if (isset($_POST['confirm_submit'])) {
    $school_year = $_POST['school_year'];
    $subject_id = $_POST['subject_id'];
    $teacher_id = $_POST['teacher_id'];
    $week_day = $_POST['week_day'];
    $lession = $_POST['lession'];
    $notes = $_POST['notes'];

    if(!isset($school_year)){
        $this->error['school_year'] = 'Hãy chọn năm học';
    }
    if(!isset($subject_id)){
        $this->error['subject_id'] = 'Hãy chọn môn học';
    }
    if(!isset($teacher_id)){
        $this->error['teacher_id'] = 'Hãy chọn giáo viên';
    }
    if(!isset($week_day)){
        $this->error['week_day'] = 'Hãy chọn thứ trong tuần';
    }
    if(!isset($lession)){
        $this->error['lession'] = 'Hãy chọn tiết học';
    }
    if(empty($notes)){
        $this->error['notes'] = 'Hãy điền lưu ý';
    }

    if(empty($this->error)){
        include_once "../views/schedule_add_confirm.php";
    } else {
        include_once "../views/schedule_add_input.php";
    }
    
} 
