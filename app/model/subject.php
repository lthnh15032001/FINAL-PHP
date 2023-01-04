<?php
include_once "../common/database.php";
// CRUD

/**
 * @param $subject_name
 * @param $school_year
 * @param $subject_note
 * @param $subject_avatar
 * @return bool|mysqli_result
 */
function add_subject($subject_name, $school_year, $subject_note, $subject_avatar) //CREAT
{
    global $connection;

    $sql = "INSERT INTO subjects (name, avatar, description, school_year)
VALUES ('{$subject_name}', '{$subject_avatar}', '{$subject_note}', '{$school_year}')";

    $result = $connection->query($sql);
    return $result;
}

function get_all_subjects() //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects";

    $result = $connection->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);

    return $row;
}

function get_some_subjects($school_year, $keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.school_year = '$school_year' 
    AND (subjects.name LIKE '%$keyword%' OR subjects.description LIKE '%$keyword%')";

    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    return $row;
}

function edit_subject($params) //UPDATE
{
    global $connection;

    $sql = "UPDATE `subjects`
            SET ...
            WHERE ...";
    /*
    ....
    */
}

function delete_subject($params) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM `subjects`
            WHERE ...";
    /*
    ....
    */
}
?>