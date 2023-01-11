<?php
include '../controller/common.php';
include_once "../model/schedule.php";
include_once "../model/teacher.php";
include_once "../model/subject.php";
include_once '../common/database.php';

$_SESSION["schedule_id"] = $_GET["id"];
$schedule = get_schedule_by_id($_SESSION["schedule_id"]);
$errors = array('school_year' => '', 'subject_id' => '', 'teacher_id' => '', 'week_day' => '', 'lession' => '', 'notes' => '');
$school_year = $subject_id = $teacher_id = $week_day = $notes = '';
$lessions = array();

function checkData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$teachers = get_all_teachers();
$subjects = get_all_subjects();
// foreach($subjects as $subject){
//     echo $subject["name"];
// }
if (isset($_POST['confirm_edit'])) {
    if (empty($_POST['school_year'])) {
        $errors['school_year'] = "Hãy chọn năm học";
    } else {
        $school_year = $_POST['school_year'];
    }

    if (empty($_POST['subject_id'])) {
        $errors['subject_id'] = "Hãy chọn môn học";
    } else {
        $subject_id = $_POST['subject_id'];
    }

    if (empty($_POST['teacher_id'])) {
        $errors['teacher_id'] = "Hãy chọn giáo viên";
    } else {
        $teacher_id = $_POST['teacher_id'];
    }

    if (empty($_POST['week_day'])) {
        $errors['week_day'] = "Hãy chọn thứ";
    } else {
        $week_day = $_POST['week_day'];
    }

    if (empty($_POST['lession'])) {
        $errors['lession'] = "Hãy chọn tiết học";
    } else {
        foreach ($_POST['lession'] as $value) {
            $lessions[] = $value;
        }
    }

    if (empty($_POST['notes'])) {
        $errors['notes'] = "Hãy nhập chú ý";
    } else {
        $notes = $_POST['notes'];
    }
    $_SESSION['school_year'] = $_POST['school_year'];
    $_SESSION['subject_id'] = $_POST['subject_id'];
    $_SESSION['teacher_id'] = $_POST['teacher_id'];
    $_SESSION['week_day'] = $_POST['week_day'];
    $_SESSION['lession'] = isset($_POST['lession']) ? $_POST['lession'] : array();
    $_SESSION['notes'] = $_POST['notes'];
    if (!empty($_POST['school_year']) && !empty($_POST['subject_id']) && !empty($_POST['teacher_id']) && !empty($_POST['week_day']) && !empty($_POST['lession']) && !empty($_POST['notes'])) {

        include_once "../views/schedule_edit_confirm.php";
    } else {
        include_once "../views/schedule_edit_input.php";
    }
} else {
    include_once "../views/schedule_edit_input.php";
}
