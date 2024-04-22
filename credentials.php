<?php
  $username = 'ebrenna2';
  $password = 'Kitty1212#';
  $servername = 'localhost';
  $db_name = 'Marvel_Pookies';
  $charset = 'utf8mb4';
  $conn = new mysqli($servername, $username, $password, $db_name);
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $dsn = "mysql:host=$servername;dbname=$db_name;charset=$charset";
  $options = [
      PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES   => false,
  ];

  try {
      $pdo = new PDO($dsn, $username, $password, $options);
  } catch (\PDOException $e) {
      die("Connection failed: " . $e->getMessage());
  }
?>

