<?php
session_start();
include "credentials.php";

if ($_SESSION['role'] == 'admin' && $_SERVER["REQUEST_METHOD"] == "POST") {
    $content = $_POST['content'];
    $sql = "INSERT INTO data (content) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $content);
    $stmt->execute();
    echo "New data added!";
    $stmt->close();
}
header("Location: dashboard.php");
?>

