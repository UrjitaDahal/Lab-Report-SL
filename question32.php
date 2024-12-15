<?php
$conn = new mysqli("localhost", "root", "", "urjita_05_sl");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function setupDatabase($conn)
{
    $createTableSQL = "CREATE TABLE IF NOT EXISTS records (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        rank VARCHAR(100) NOT NULL,
        status ENUM('active', 'inactive') NOT NULL,
        image VARCHAR(255),
        created_by VARCHAR(100) NOT NULL,
        updated_by VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableSQL) === TRUE) {
        echo "Database setup successful.<br>";
    } else {
        die("Error setting up database: " . $conn->error);
    }
}

setupDatabase($conn);


function addRecord($conn, $name, $rank, $status, $image, $created_by)
{
    $stmt = $conn->prepare("INSERT INTO records (name, rank, status, image, created_by) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $rank, $status, $image, $created_by);

    if ($stmt->execute()) {
        echo "Record added successfully. <br>";
    } else {
        echo "Error adding record: " . $stmt->error;
    }
    $stmt->close();
}


function listRecords($conn)
{
    $result = $conn->query("SELECT * FROM records");

    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Created By</th>
                    <th>Updated By</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Actions</th>
                </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['rank']}</td>
                    <td>{$row['status']}</td>
                    <td><img src='{$row['image']}' alt='image' width='50'></td>
                    <td>{$row['created_by']}</td>
                    <td>{$row['updated_by']}</td>
                    <td>{$row['created_at']}</td>
                    <td>{$row['updated_at']}</td>
                    <td>
                        <a href='?edit={$row['id']}'>Edit</a> |
                        <a href='?delete={$row['id']}'>Delete</a>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No records found.";
    }
}


function updateRecord($conn, $id, $name, $rank, $status, $image, $updated_by)
{
    $stmt = $conn->prepare("UPDATE records SET name = ?, rank = ?, status = ?, image = ?, updated_by = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $name, $rank, $status, $image, $updated_by, $id);

    if ($stmt->execute()) {
        echo "Record updated successfully.<br>";
    } else {
        echo "Error updating record: " . $stmt->error;
    }
    $stmt->close();
}


function deleteRecord($conn, $id)
{
    $stmt = $conn->prepare("DELETE FROM records WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Record deleted successfully.<br>";
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
    $stmt->close();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
      
        addRecord($conn, $_POST['name'], $_POST['rank'], $_POST['status'], $_POST['image'], $_POST['created_by']);
    } elseif (isset($_POST['update'])) {
        
        updateRecord($conn, $_POST['id'], $_POST['name'], $_POST['rank'], $_POST['status'], $_POST['image'], $_POST['updated_by']);
    }
}

if (isset($_GET['delete'])) {
  
    deleteRecord($conn, $_GET['delete']);
}


listRecords($conn);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record Management</title>
</head>

<body>
    <h2>Add New Record</h2><br>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Rank:</label>
        <input type="text" name="rank" required><br>

        <label>Status:</label>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br>

        <label>Image URL:</label>
        <input type="text" name="image"><br>

        <label>Created By:</label>
        <input type="text" name="created_by" required><br>

        <button type="submit" name="add">Add Record</button>
    </form><br><br>

    <h2>Update Record</h2><br><br>
    <form method="POST" action="">
        <label>ID:</label>
        <input type="number" name="id" required><br>

        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Rank:</label>
        <input type="text" name="rank" required><br>

        <label>Status:</label>
        <select name="status">
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select><br>

        <label>Image URL:</label>
        <input type="text" name="image"><br>

        <label>Updated By:</label>
        <input type="text" name="updated_by" required><br>

        <button type="submit" name="update">Update Record</button>
    </form>
</body>

</html>