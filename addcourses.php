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

    // Rank Validation
    if (checkRequiredField('duration')) {
        $duration = trim($_POST['duration']);
    } else {
        $err['duration'] = 'Enter duration';
    }

    // Status Validation
    $status =$_POST['status'];

    // If no errors, add record
    if (count($err) == 0) {
        if (addCategory($name, $duration, $status)) {
            $err['success'] = 'Category added successfully';
        } else {
            $err['failed'] = 'Category addition failed';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>
<body>
    <h1>Add Course</h1>
    <?php echo displayErrorMessage($err, 'failed'); ?>
    <?php echo displaySuccessMessage($err, 'success'); ?>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Add Course Information</legend>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
                <?php echo displayErrorMessage($err, 'name'); ?><br><br>
            </div>
            <div class="form-group">
                <label for="duration">duration</label>
                <input type="number" name="duration" class="form-control">
                <?php echo displayErrorMessage($err, 'duration'); ?><br><br>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="radio" name="status" value="1"> Active
                <input type="radio" name="status" value="0" checked> Inactive
            </div><br><br>

            <div class="form-group">
                <input type="submit" name="save" value="Save " class="form-control">
            </div>
        </fieldset>
    </form>
</body>
</html>
