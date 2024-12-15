<?php
require_once 'function.php';

$err = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Name Validation
    if (checkRequiredField('name')) {
        $name = trim($_POST['name']);
    } else {
        $err['name'] = 'Enter name';
    }

    // Course Validation
    if (checkRequiredField('course_id')) {
        $course_id = trim($_POST['course_id']);
        // Retrieve the course name using the course_id
        $course = getCourseById($course_id); // Add this function in your `function.php`
        if ($course) {
            $course_name = $course['title'];
        } else {
            $err['course_id'] = 'Invalid course selected';
        }
    } else {
        $err['course_id'] = 'Please select a course';
    }

    // Fee Validation
    if (checkRequiredField('fee')) {
        $fee = trim($_POST['fee']);
        if (!is_numeric($fee) || $fee < 0) {
            $err['fee'] = 'Enter valid fee amount';
        }
    } else {
        $err['fee'] = 'Enter fee amount';
    }

    // Roll Number Validation
    if (checkRequiredField('rollno')) {
        $rollno = trim($_POST['rollno']);
    } else {
        $err['rollno'] = 'Enter roll number';
    }

    // Phone Validation
    if (checkRequiredField('phone')) {
        $phone = trim($_POST['phone']);
        if (strlen($phone) != 10 || !is_numeric($phone)) {
            $err['phone'] = 'Enter valid 10-digit phone number';
        }
    } else {
        $err['phone'] = 'Enter phone number';
    }

    // Address Validation (optional field)
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';

    // Date of Birth Validation
    if (checkRequiredField('dob')) {
        $dob = trim($_POST['dob']);
        if (!strtotime($dob)) {
            $err['dob'] = 'Enter valid date of birth';
        }
    } else {
        $err['dob'] = 'Enter date of birth';
    }

    // Status Validation
    $status = isset($_POST['status']) ? $_POST['status'] : 0;

    // If no errors, add record
    if (count($err) == 0) {
        if (addStudent($name, $course_id, $course_name, $fee, $rollno, $phone, $address, $dob, $status)) {
            $err['success'] = 'Student added successfully';
        } else {
            $err['failed'] = 'Student addition failed';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
   
</head>

<body>
    <h1>Add Student</h1>
    <?php echo displayErrorMessage($err, 'failed'); ?>
    <?php echo displaySuccessMessage($err, 'success'); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add Student Information</legend>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
                <?php echo displayErrorMessage($err, 'name'); ?>
            </div>

            <div class="form-group">
                <label for="course_id">Select Course</label>
                <select name="course_id" class="form-control">
                    <option value="">--Select Course--</option>
                    <?php
                    $courses = getAllCourses();
                    if ($courses) {
                        foreach ($courses as $course) {
                            echo "<option value='" . $course['id'] . "'>" . $course['title'] . "</option>";
                        }
                    }
                    ?>
                </select>
                <?php echo displayErrorMessage($err, 'course_id'); ?>
            </div>

            <div class="form-group">
                <label for="fee">Fee Amount</label>
                <input type="number" step="0.01" name="fee" class="form-control">
                <?php echo displayErrorMessage($err, 'fee'); ?>
            </div>

            <div class="form-group">
                <label for="rollno">Roll Number</label>
                <input type="number" name="rollno" class="form-control">
                <?php echo displayErrorMessage($err, 'rollno'); ?>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" maxlength="10" class="form-control">
                <?php echo displayErrorMessage($err, 'phone'); ?>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" class="form-control">
                <?php echo displayErrorMessage($err, 'dob'); ?>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <input type="radio" name="status" value="1"> Active
                <input type="radio" name="status" value="0" checked> Inactive
            </div>

            <div class="form-group">
                <input type="submit" name="save" value="Save " class="form-control">
            </div>
        </fieldset>
    </form>
</body>

</html>