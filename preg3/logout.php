<?php
session_start();
// echo $_SESSION["usuario"];
session_destroy();
header("Location: /preg3/login.php");
?>

