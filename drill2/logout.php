<?php
session_start();
session_destroy();
header('location: http://localhost/drill2/login.php');
exit();
?>