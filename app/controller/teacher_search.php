<?php
include '../controller/common.php';
include '../common/database.php'; 
include '../model/teacher.php';
include '../common/define.php';

if(isset($_GET["delete_teacher"])) {
    $id = $_GET["delete_teacher"];
    delete_teacher($id);
    header('Location: ./teacher_search.php');
}

$row = get_all_teachers(); 
if (isset($_GET["teacher_search"])) {
    $specialized_value = $_GET["specialized"];
    $keyword_value = $_GET["teacher_keyword"];
    
    if($specialized_value != '' and $keyword_value == ''){
        $row = search_teachers_by_specialized($specialized_value);
    }elseif($specialized_value == '' and $keyword_value != ''){
        $row = search_teachers_by_keyword($keyword_value);
    }elseif($specialized_value != '' and $keyword_value != ''){
        $row = search_teachers_by_specialized_and_keyword($specialized_value, $keyword_value); 
    }
} 

include "../views/teacher_search.php";

?>