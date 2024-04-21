<?php
session_start();
include "credentials.php";

if ($_SESSION['role'] == 'admin' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sql = "DELETE FROM data WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    echo "Data deleted!";
    $stmt->close();
    header("Location: dashboard.php");
}
?>

