<?php
include_once 'valida.php';
unset($_SESSION['username']);
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
$extra = 'index.php'; // pagina para onde redicionar.
header("Location: http://$host$uri/$extra");
?>
