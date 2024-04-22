 <?php
  2 session_start();
  3 $_SESSION = array();
  4 session_destroy();
  5 header("Location: login.php");
  6 ?>
<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: login.php");
?>

