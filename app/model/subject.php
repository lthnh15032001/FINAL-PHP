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

    $sql  = "SELECT * FROM subjects ORDER BY subjects.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function get_subject_name_by_id($id) //READ
{
    global $connection;

    $sql  = "SELECT name FROM subjects WHERE id = '$id'";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function search_subjects_by_year_and_keyword($school_year, $keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.school_year = '$school_year' 
    AND (subjects.name LIKE '%$keyword%' OR subjects.description LIKE '%$keyword%') ORDER BY subjects.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function search_subjects_by_year($school_year) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.school_year = '$school_year' ORDER BY subjects.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function search_subjects_by_keyword($keyword) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.name LIKE '%$keyword%' OR subjects.description LIKE '%$keyword%' ORDER BY subjects.id DESC";

    $result = $connection->query($sql);
    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $row;
}

function edit_subject($id, $subject_name, $subject_year, $subject_note, $subject_avatar) //UPDATE
{
    global $connection;

    $sql = "UPDATE subjects
            SET name = '$subject_name',
            avatar = '$subject_avatar',
            description = '$subject_note',
            school_year = '$subject_year'
            WHERE id = $id";
    $connection->query($sql);
    return true;
}

function delete_subject($id) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM subjects
            WHERE subjects.id=$id";
    $connection->query($sql);

    return true;
}

function get_last_subject_id()
{
    global $connection;

    $last_id = $connection->insert_id;

    return $last_id;
}

function get_by_subject_id($id) //READ
{
    global $connection;

    $sql  = "SELECT * FROM subjects WHERE subjects.id = $id  LIMIT 1";

    $result = $connection->query($sql);
    $row = mysqli_fetch_assoc($result);

    return $row;
}
