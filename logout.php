<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: Marvel_Pookies.php");
?>


