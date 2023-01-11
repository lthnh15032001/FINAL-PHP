<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sửa thời khóa biểu</title>
</head>

<body>

    <?php
    include '../common/navbar.php';
    ?>
    <div class="container">
        <h1 class="text-center mt-5">Sửa thời khóa biểu</h1>
        <form action="../controller/schedule_edit_confirm.php" method="POST" class="mt-5 mb-5 border border-primary rounded p-5">
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="year">Khóa học</label>
                <div class="col-sm-6">
                    <?php
                    echo '<input type="text" name="school_year" class="form-control-plaintext" value="' . $_SESSION['school_year'] . '">';
                    ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="subject">Môn học</label>
                <div class="col-sm-6">

                    <?php
                    echo '<input type="text" name="subject_id" class="form-control-plaintext" value="' . get_subject_name_by_id($_SESSION['subject_id'])['name'] . '">';
                    ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher">Giáo viên</label>
                <div class="col-sm-6">

                    <?php
                    echo '<input type="text" name="teacher_id" class="form-control-plaintext" value="' . get_teacher_name_by_id($_SESSION['teacher_id'])['name'] . '">';
                    ?>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="weekday">Thứ</label>
                <div class="col-sm-6">

                    <?php
                    echo '<input type="text" name="week_day" class="form-control-plaintext" value="' . $_SESSION['week_day'] . '">';
                    ?>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="lession">Tiết</label>
                <div class="col-sm-10 d-flex">
                    <?php

                    $lessionArr = isset($_SESSION['lession']) ? $_SESSION['lession'] : explode(",", $schedule['lession']);
                    foreach ($lessionArr as  $value) {
                    ?>

                        <p class='me-4' for='lession<?php echo $value; ?>'>
                            Tiết <?php echo $value; ?>
                        </p>
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="note">Chú ý</label>
                <div class="col-sm-10">
                    <?php
                    echo '<textarea name="notes" readonly class="form-control" id="note" rows="5">' . $_SESSION['notes'] . '</textarea>';
                    ?>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-around">
                <button type="button" class="btn btn-primary btn-lg pe-5 ps-5" onclick="javascript:history.go(-1)">Sửa lại</button>
                <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="edit_schedule">Sửa</button>
            </div>
        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>