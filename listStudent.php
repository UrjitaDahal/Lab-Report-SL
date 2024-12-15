<?php
require_once 'function.php';

$err = [];
if (isset($_GET['delid']) && is_numeric($_GET['delid'])) {
    if (getStudentById($_GET['delid'])) {
        if(deleteStudent($_GET['delid'])){
            $err['success'] =  'Student deleted success';
        } else {
            $err['failed'] = 'Student delete Failed';
        }
    } else {
        $err['failed'] = 'Student not found';
    }
}
$records = getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    
</head>
<body>
    <h1 align="center">List Record</h1>
    <a href="addstudent.php" class="text-light no-decor ">Add record</a>
    <?php  echo displayErrorMessage($err,'failed')?>
    <?php  echo displaySuccessMessage($err,'success')?>
    <table width="100%" border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Course</th>
            <th>Fee</th>
            <th>Roll No</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Date of Birth</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($records as $key => $record) { ?>
            <tr>
                <td><?php echo $key+1 ?></td>
                <td><?php echo $record['name']; ?></td>
                <td><?php echo $record['course_name']; ?></td>
                <td><?php echo $record['fee']; ?></td>
                <td><?php echo $record['rollno']; ?></td>
                <td><?php echo $record['phone']; ?></td>
                <td><?php echo $record['address']; ?></td>
                <td><?php echo $record['dob']; ?></td>
                <td>
                    <a href="editStudent.php?edtid=<?php echo $record['id'] ?>">Edit</a>
                    <a href="liststudent.php?delid=<?php echo $record['id'] ?>">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>