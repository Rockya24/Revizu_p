<?php
session_start();

unset($_SESSION["admin_id"]);
unset($_SESSION["admin_nom"]);
unset($_SESSION["admin_connecte"]);

header("Location: ../login.php");
exit;
?>