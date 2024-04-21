<?php
session_start();
include "credentials.php";

if ($_SESSION['role'] == 'admin' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $new_content = $_POST['new_content'];
    $sql = "UPDATE data SET content = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_content, $id);
    $stmt->execute();
    echo "Data updated!";
    $stmt->close();
    header("Location: dashboard.php");
}
?>

