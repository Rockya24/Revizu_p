<?php
session_start();
include("../config.php");

if (!isset($_SESSION["admin_connecte"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_GET["id"])) {

    $id = (int) $_GET["id"];

    $requete = mysqli_prepare(
        $conn,
        "DELETE FROM utilisateurs WHERE id = ?"
    );

    mysqli_stmt_bind_param(
        $requete,
        "i",
        $id
    );

    mysqli_stmt_execute($requete);

    mysqli_stmt_close($requete);
}

header("Location: dashboard_admin.php");
exit;
?>