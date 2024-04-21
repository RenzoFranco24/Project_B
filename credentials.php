<?php
      $username = 'ebrenna2';
      $password = 'Kitty1212#';
      $servername = 'localhost';
      $db_name = 'Marvel_Pookies';
      $conn = new mysqli($servername, $username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

