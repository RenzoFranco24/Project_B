<?php
session_start();
require 'credentials.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

$connection = mysqli_connect($servername, $username, $password, $db_name);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = mysqli_real_escape_string($connection, $_POST['table']);
    $id = $_POST['id'];
    $value = mysqli_real_escape_string($connection, $_POST['value']);

    $query = "UPDATE `$table` SET column_name = ? WHERE id = ?";
    $stmt = $connection->prepare($query);
    if ($stmt) {
        $stmt->bind_param('si', $value, $id);
        if (!$stmt->execute()) {
            echo "Error updating record: " . $stmt->error;
        } else {
            echo "Record updated successfully";
        }
        $stmt->close();
    } else {
        echo "Prepare failed: " . $connection->error;
    }
}
?>

