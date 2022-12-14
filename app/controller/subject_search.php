<?php
include '../controller/common.php';
include '../common/database.php'; 
include '../model/subject.php';
include '../common/define.php';

if(isset($_GET["delete_subject"])) {
    $id = $_GET["delete_subject"];
    delete_subject($id);
    header('Location: ./subject_search.php');
}

$row = get_all_subjects(); 
if (isset($_GET["subject_search"])) {
    $school_year_key = $_GET["school_year"];
    $keyword_value = $_GET["keyword"];
    
    if($school_year_key == '' and $keyword_value != ''){
        $row = search_subjects_by_keyword($keyword_value);
    }elseif($school_year_key != '' and $keyword_value == ''){
        $row = search_subjects_by_year($school_year_key);
    }elseif($school_year_key != '' and $keyword_value != ''){
        $row = search_subjects_by_year_and_keyword($school_year_key, $keyword_value); 
    } 

    if(isset($_GET['school_year'])){
        $_SESSION['school_year'] = $_GET['school_year'];
    }

    if(isset($_GET['keyword'])){
        $_SESSION['keyword'] = $_GET['keyword'];
    }

}

include "../views/subject_search.php";

unset($_SESSION['school_year']);
unset($_SESSION['keyword']);
?>