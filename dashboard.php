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
    <title>Tableau de bord - RevizUp</title>
    <link rel="stylesheet" href="dashboard.css">
</head><body>

<button class="burger" onclick="ouvrirMenu()">☰</button>

<aside class="sidebar">
    <h2>RevizUp</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="cartes.php">Matières</a>
    <a href="logout.php">Déconnexion</a>
</aside>

<main class="main">
    <div class="topbar">
    <h1>Bienvenue, <?php echo $nom; ?> 😊</h1>
    </div>

    <div class="stats">
        <div class="stat">
            <h3>📚 Matières</h3>
            <strong>3</strong>
            <p>Matières enregistrées</p>
        </div>
        <div class="stat">
            <h3>📈 Progression</h3>
            <strong>40%</strong>
            <p>Révisions terminées</p>
        </div>
    </div>

    <div class="sections">
        <div class="box">
            <h3>Matières</h3>
            <p>Ajoutez et organisez vos matières de cours.</p>
            <a href="cartes.php">Gérer les matières</a>
        </div>

    </div>
</main>

<script>
function ouvrirMenu(){
    document.querySelector(".sidebar").classList.toggle("active");
}
</script>

</body>