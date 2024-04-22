<?php
session_start();
include "credentials.php";  

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$connection = mysqli_connect($servername, $username, $password, $db_name);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = mysqli_real_escape_string($connection, $_POST['table']);
    $fields = $_POST['fields'];  

    $id = isset($_POST['id']) ? intval($_POST['id']) : null;
    $placeholders = [];
    $values = [];

    foreach ($fields as $field => $value) {
        $placeholders[] = "$field = ?";
        $values[] = $value;
    }

    if ($id) {
        
        $query = "UPDATE `$table` SET " . implode(', ', $placeholders) . " WHERE id = ?";
        $values[] = $id;  
    } else {
       
        $columns = array_keys($fields);
        $placeholders = array_fill(0, count($columns), '?');
        $query = "INSERT INTO `$table` (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
    }

    $stmt = $connection->prepare($query);
    $stmt->bind_param(str_repeat("s", count($values)), ...$values);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo $id ? "Record updated successfully." : "Record added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $connection->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);  
    exit();
}
?>
