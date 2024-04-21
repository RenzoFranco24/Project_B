<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

include "credentials.php";

header("Location: Marvel_Pookies.php");
if ($_SESSION['role'] == 'admin') {
    echo "<h2>Admin Area</h2>";
    echo "<form action='add_data.php' method='post'>
            <input type='text' name='content' placeholder='Enter new content'>
            <input type='submit' value='Add Data'>
          </form>";
}
?>

