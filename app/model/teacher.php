<?php
include_once "../common/database.php";

date_default_timezone_set('Asia/Ho_Chi_Minh');
// CRUD


function add_teacher($name, $specialized, $degree, $teacher_image, $note) //CREAT
{
    global $connection;
    $date = date("Y-m-d H:i:s");
    $sql  = "INSERT INTO `teachers` (name, avatar, description, specialized, degree, created) VALUES('{$name}', '{$teacher_image}', '{$note}', '{$specialized}', '{$degree}', '{$date}')";
    $result = $connection->query($sql);
    return $result;
}

function get_all_teachers() //READ
{
    global $connection;

    $sql  = "SELECT * FROM `teachers`";

    $result = $connection->query($sql);
    $row = $result->fetch_all(MYSQLI_ASSOC);
    return $row;
}

function get_some_teachers($params) //READ
{
    global $connection;

    $sql  = "SELECT * FROM `teachers`
            WHERE ... AND ...";

    $result = $connection->query($sql);
    $row = $result->fetch_array(MYSQLI_ASSOC);

    return $row;
}

function edit_teacher($params) //UPDATE
{
    global $connection;

    $sql = "UPDATE `teachers`
            SET ...
            WHERE ...";
    /*
    ....
    */
    return true;
}

function delete_teacher($params) //DELETE
{
    global $connection;

    $sql  = "DELETE FROM `teachers`
            WHERE ...";
    /*
    ....
    */
    return true;
}

function get_last_id(){
    global $connection;

    $last_id = $connection->insert_id;

    return $last_id;
}
?>