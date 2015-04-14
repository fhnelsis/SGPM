<?php
header('Content-Type: text/html; charset=UTF-8');
session_start();
session_destroy();
session_unset();
echo "<script>alert('Você saiu da aplicação!');top.location.href='index.php';</script>";
?>
