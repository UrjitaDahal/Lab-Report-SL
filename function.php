<?php
date_default_timezone_set('Asia/Kathmandu');

// Global Database Connection
$conn = new mysqli('localhost', 'root', '', 'question33');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function checkRequiredField($index)
{
    if (isset($_POST[$index]) && !empty(trim($_POST[$index]))) {
        return true;
    }
    return false;
}

function displayErrorMessage($error, $index)
{
    if (array_key_exists($index, $error)) {
        return "<span class='error'>" . $error[$index] . " </span>";
    }
    return false;
}

function matchPattern($var, $pattern)
{
    return preg_match($pattern, $var);
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function displaySuccessMessage($error, $index)
{
    if (array_key_exists($index, $error)) {
        return "<span class='success'>" . $error[$index] . " </span>";
    }
    return false;
}

function addCategory($t, $d, $s)
{
    global $conn; // Use global connection
    try {
        $cdate = date('Y-m-d H:i:s');
        $sql = "INSERT INTO courses (title, duration, status, created_at) VALUES ('$t', $d, $s, '$cdate')";
        $conn->query($sql);
        return ($conn->insert_id > 0 && $conn->affected_rows == 1);
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function getAllBookCategory()
{
    global $conn;
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    $data = [];
    if ($result->num_rows > 0) {
        while ($record = $result->fetch_assoc()) {
            $data[] = $record;
        }
    }
    return $data;
}

function getBookCategoryById($id)
{
    global $conn;
    $sql = "SELECT * FROM courses WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    }
    return false;
}

function getStudentById($id)
{
    global $conn;
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    }
    return false;
}

function getAllCourses()
{
    global $conn;
    $sql = "SELECT id, title FROM courses WHERE status = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
}

function getAllStudents()
{
    global $conn;
    $sql = "SELECT * FROM students WHERE status = 1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
}

function deleteCategory($id)
{
    global $conn;
    $sql = "DELETE FROM courses WHERE id = $id";
    $conn->query($sql);
    return ($conn->affected_rows == 1);
}

function deleteStudent($id)
{
    global $conn;
    $sql = "DELETE FROM students WHERE id = $id";
    $conn->query($sql);
    return ($conn->affected_rows == 1);
}

function updateCategory($i, $t, $d, $s)
{
    global $conn;
    $ud = date('Y-m-d H:i:s');
    $sql = "UPDATE courses SET title = '$t', duration = '$d', status = '$s', updated_at = '$ud' WHERE id = $i";
    $conn->query($sql);
    return ($conn->affected_rows == 1);
}

function updateStudent($i, $n, $c, $f, $r, $p, $a, $d, $s)
{
    global $conn;
    $ud = date('Y-m-d H:i:s');
    $sql = "UPDATE students SET 
            name = '$n', course_id = '$c', fee = '$f', rollno = '$r', phone = '$p', 
            address = '$a', dob = '$d', status = '$s', updated_at = '$ud' 
            WHERE id = $i";
    $conn->query($sql);
    return ($conn->affected_rows == 1);
}

function printStatus($s)
{
    return ($s == 1) ? 'Active' : 'DeActive';
}


function addStudent($name, $course_id, $course_name, $fee, $rollno, $phone, $address, $dob, $status)
{
    global $conn;
    $cdate = date('Y-m-d H:i:s');
    $sql = "INSERT INTO students (name, course_id, course_name, fee, rollno, phone, address, dob, status, created_at) 
            VALUES ('$name', '$course_id', '$course_name', '$fee', '$rollno', '$phone', '$address', '$dob', '$status', '$cdate')";
    $result = $conn->query($sql);
    return ($result);
}

function getCourseById($id)
{
    global $conn;
    $sql = "SELECT * FROM courses WHERE id = $id";
    $result = $conn->query($sql);
    if ($result && $result->num_rows == 1) {
        return $result->fetch_assoc();
    }
    return false;
}
