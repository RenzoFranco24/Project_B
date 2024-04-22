<?php
session_start();
include "credentials.php";  
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['table']) && isset($_GET['id'])) {
    $table = mysqli_real_escape_string($connection, $_GET['table']);
    $id = intval($_GET['id']);

    $connection = mysqli_connect($servername, $username, $password, $db_name);
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = "DELETE FROM `$table` WHERE id = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting record.";
    }

    $stmt->close();
    $connection->close();
    header('Location: ' . $_SERVER['HTTP_REFERER']);  
    exit();
}
?>
