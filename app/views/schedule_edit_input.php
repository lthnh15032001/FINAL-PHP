<?php
include("../common/database.php");
include("../common/define.php");

?>

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
        <form action="../controller/schedule_edit_input.php?id=<?php echo $_SESSION["schedule_id"] ?>" method="post" class="mt-5 mb-5 border border-primary rounded p-5">
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="year">Khóa học</label>
                <div class="col-sm-6">

                    <select id="school_year" class="form-control" name="school_year">
                        <option <?php empty($_SESSION['school_year']) ? "selected" : "" ?> value="">
                            <--- Chọn năm học--->
                        </option>
                        <?php
                        $school_year = constant('YEAR');
                        $schedule_schoolyear = (isset($_SESSION['school_year'])) ? $_SESSION['school_year'] : $schedule['school_year'];

                        foreach ($school_year as $key => $value) {
                            $selected = ($value == $schedule_schoolyear ? "selected" : "");
                        ?>
                            <option <?php echo $selected; ?> value="<?= $value ?>"><?= $value ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="text-danger font-weight-bold">
                        <?php echo $errors['school_year'];
                        ?>
                    </span>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="subject">Môn học</label>
                <div class="col-sm-6">

                    <select name="subject_id" id="subject" class="form-control">
                        <option <?php empty($_SESSION['subject_id']) ? "selected" : "" ?> value="">
                            <--- Chọn môn học --->
                        </option>

                        <?php
                        $schedule_subject = (isset($_SESSION['subject_id'])) ? $_SESSION['subject_id'] : $schedule['subject_id'];

                        foreach ($subjects as $subject) {
                            if ($subject["id"] == $schedule_subject) {

                                echo '<option selected value="' . $subject["id"] . '">' . $subject["name"] . '</option>';
                            } else {
                                echo '<option value="' . $subject["id"] . '">' . $subject["name"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <span class="text-danger font-weight-bold">
                        <?php echo $errors['subject_id'];
                        ?>
                    </span>
                </div>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-2" for="teacher">Giáo viên</label>
                <div class="col-sm-6">
                    <select name="teacher_id" id="teacher" class="form-control">
                        <option value="">
                            <--- Chọn giáo viên --->
                        </option>

                        <?php
                        $schedule_teacher = (isset($_SESSION['teacher_id'])) ? $_SESSION['teacher_id'] : $schedule['teacher_id'];
                        foreach ($teachers as $teacher) {
                            if ($teacher["id"] == $schedule_teacher) {

                                echo '<option selected value="' . $teacher["id"] . '">' . $teacher["name"] . '</option>';
                            } else {
                                echo '<option value="' . $teacher["id"] . '">' . $teacher["name"] . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <span class="text-danger font-weight-bold">
                        <?php echo $errors['teacher_id'];
                        ?>
                    </span>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="weekday">Thứ</label>
                <div class="col-sm-6">

                    <select id="school_year" class="form-control" name="week_day">
                        <option <?php empty($_SESSION['week_day']) ? "selected" : "" ?> value="">
                            <--- Chọn Thứ--->
                        </option>
                        <?php
                        $weekday = constant('WEEKDAY');
                        $schedule_weekday = isset($_SESSION['week_day']) ? $_SESSION['week_day'] : $schedule['week_day'];
                        foreach ($weekday as $key => $value) {
                            $selected = ($value == $schedule_weekday ? "selected" : "");
                        ?>
                            <option <?php echo $selected; ?> value="<?= $value ?>"><?= $value ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <span class="text-danger font-weight-bold col-sm-10">
                        <?php echo $errors['week_day'];
                        ?>
                    </span>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="lession">Tiết</label>
                <div class="col-sm-10 d-flex justify-content-between flex-column">
                    <div class="d-flex">
                        <?php
                        $lession = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
                        $lessionArr = isset($_SESSION['lession']) ? $_SESSION['lession'] : explode(",", $schedule['lession']);

                        foreach ($lession as  $value) {
                            $checked = (in_array($value, $lessionArr) ? "checked" : "");
                        ?>
                            <div class='form-check me-4'>
                                <input name='lession[]' class='form-check-input' type='checkbox' value='<?php echo $value; ?>' id='lession<?php echo $value; ?>' <?php echo $checked ?>>
                                <label class='form-check-label' for='lession<?php echo $value; ?>'>
                                    Tiết <?php echo $value; ?>
                                </label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div>
                        <span class="text-danger font-weight-bold">
                            <?php echo $errors['lession'];
                            ?>
                        </span>
                    </div>
                </div>
            </div>

            <div class="form-group row mt-4">
                <label class="col-sm-2" for="notes">Chú ý</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="notes" name="notes" rows="5"><?php echo isset($_SESSION['notes']) ? $_SESSION['notes'] : $schedule["notes"] ?></textarea>
                    <span class="text-danger font-weight-bold">
                        <?php echo $errors['notes'];
                        ?>
                    </span>
                </div>
            </div>
            <div class="mt-5 d-flex justify-content-center">
                <button type="submit" class="btn btn-primary btn-lg pe-5 ps-5" name="confirm_edit">Xác nhận</button>
            </div>
        </form>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>