<?php
require_once 'function.php';
$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['edtid'];
    if (checkRequiredField('name')) {
        $name = $_POST['name'];
    } else {
        $err['name'] = 'Enter name';
    }

    if (checkRequiredField('course_id')) {
        $course_id = $_POST['course_id'];
    } else {
        $err['course_id'] = 'Enter course';
    }

    if (checkRequiredField('fee')) {
        $fee = $_POST['fee'];
    } else {
        $err['fee'] = 'Enter fee';
    }

    if (checkRequiredField('rollno')) {
        $rollno = $_POST['rollno'];
    } else {
        $err['rollno'] = 'Enter roll number';
    }

    if (checkRequiredField('phone')) {
        $phone = $_POST['phone'];
    } else {
        $err['phone'] = 'Enter phone';
    }

    if (checkRequiredField('address')) {
        $address = $_POST['address'];
    } else {
        $err['address'] = 'Enter address';
    }

    if (checkRequiredField('dob')) {
        $dob = $_POST['dob'];
    } else {
        $err['dob'] = 'Enter date of birth';
    }

    $status = $_POST['status'];

    if (count($err) == 0) {
        if (updateStudent($id, $name, $course_id, $fee, $rollno, $phone, $address, $dob, $status)) {
            $err['success'] = 'Student update success';
        } else {
            $err['failed'] = 'Student update failed';
        }
    }
}

if (isset($_GET['edtid']) && is_numeric($_GET['edtid'])) {
    $record = getStudentById($_GET['edtid']);
    if (!$record) {
        die('Student not found');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
</head>
<body>
   
 <?php  echo displayErrorMessage($err,'failed')?>
 <?php  echo displaySuccessMessage($err,'success')?>
 <form action="" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Edit Student Information</legend>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $record['name'] ?>">
            <?php  echo displayErrorMessage($err,'name')?>
        </div>
        <div class="form-group">
            <label for="course_id">Course</label>
            <input type="number" name="course_id" class="form-control" value="<?php echo $record['course_id'] ?>">
            <?php  echo displayErrorMessage($err,'course_id')?>
        </div>
        <div class="form-group">
            <label for="fee">Fee</label>
            <input type="number" name="fee" class="form-control" value="<?php echo $record['fee'] ?>">
            <?php  echo displayErrorMessage($err,'fee')?>
        </div>
        <div class="form-group">
            <label for="rollno">Roll No</label>
            <input type="text" name="rollno" class="form-control" value="<?php echo $record['rollno'] ?>">
            <?php  echo displayErrorMessage($err,'rollno')?>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $record['phone'] ?>">
            <?php  echo displayErrorMessage($err,'phone')?>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $record['address'] ?>">
            <?php  echo displayErrorMessage($err,'address')?>
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="date" name="dob" class="form-control" value="<?php echo $record['dob'] ?>">
            <?php  echo displayErrorMessage($err,'dob')?>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <?php if ($record['status'] == 1) { ?>
                <input type="radio" name="status" value="1" class="form-control" checked>Active
                <input type="radio" name="status" value="0" class="form-control" >De-Active
            <?php } else { ?>
                <input type="radio" name="status" value="1" class="form-control">Active
                <input type="radio" name="status" value="0" class="form-control" checked>De-Active
            <?php } ?>
            <?php  echo displayErrorMessage($err,'status')?>
        </div>
        <div class="form-group">
            <input type="submit" name="save" value="Update Student" class="form-control">
        </div>
    </fieldset>
 </form>
</body>
</html>