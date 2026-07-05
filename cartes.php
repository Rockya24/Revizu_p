<?php
session_start();

$nom = "Utilisateur";

if(isset($_SESSION['nom'])){
    $nom = $_SESSION['nom'];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Matières - RevizUp</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<button class="burger" onclick="ouvrirMenu()">☰</button>

<aside class="sidebar">
    <h2>RevizUp</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="cartes.php">Matières</a>
    <a href="revisions.php">Révisions</a>
    <a href="logout.php">Déconnexion</a>
</aside>

<main class="main">

    <div class="topbar">
        <div>
            <h1>Mes matières</h1>
            <p>Choisissez une matière pour réviser.</p>
        </div>
    </div>

    <div class="sections">

        <div class="box">
            <h3>📘 Mathématiques</h3>
            <p>Calculs, logique et résolution de problèmes.</p>
            <a href="#">Commencer</a>
        </div>

        <div class="box">
            <h3>📗 Français</h3>
            <p>Grammaire, orthographe et compréhension.</p>
            <a href="#">Commencer</a>
        </div>

        <div class="box">
            <h3>📙 Culture générale</h3>
            <p>Questions générales et connaissances du monde.</p>
            <a href="#">Commencer</a>
        </div>

        <div class="box">
            <h3>📕 Sciences et vie</h3>
            <p>Corps humain, nature et environnement.</p>
            <a href="#">Commencer</a>
        </div>

    </div>

</main>

<script>
function ouvrirMenu(){
    document.querySelector(".sidebar").classList.toggle("active");
}
</script>

</body>
</html>