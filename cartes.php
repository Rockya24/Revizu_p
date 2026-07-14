<?php
session_start();

if (!isset($_SESSION['nom'])) {
    header("Location: login.php");
    exit();
}

$nom = $_SESSION['nom'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Matières - RevizUp</title>

    <link rel="stylesheet" href="dashboard.css">
</head>

<body>

<button class="burger" onclick="ouvrirMenu()">☰</button>

<aside class="sidebar">
    <h2>RevizUp</h2>

    <a href="dashboard.php">Dashboard</a>
    <a href="cartes.php">Matières</a>
    <a href="logout.php">Déconnexion</a>
</aside>

<main class="main">

    <div class="topbar">
        <h1>Mes matières</h1>

        <p>
            Bonjour <?php echo htmlspecialchars($nom); ?>,
            choisissez une matière pour commencer votre révision.
        </p>
    </div>

    <div class="sections">

        <div class="box">
            <h3>📘 Mathématiques</h3>

            <p>
                Révisez les calculs, les opérations,
                la logique et la résolution de problèmes.
            </p>

            <a href="cours.php?matiere=math">
                Commencer
            </a>
        </div>

        <div class="box">
            <h3>📗 Français</h3>

            <p>
                Améliorez votre grammaire,
                votre orthographe et votre compréhension.
            </p>

            <a href="cours.php?matiere=francais">
                Commencer
            </a>
        </div>

        <div class="box">
            <h3>📙 Culture générale</h3>

            <p>
                Développez vos connaissances
                sur le monde, l’histoire et la société.
            </p>

            <a href="cours.php?matiere=culture">
                Commencer
            </a>
        </div>

        <div class="box">
            <h3>📕 Sciences et vie</h3>

            <p>
                Découvrez le corps humain,
                la nature et l’environnement.
            </p>

            <a href="cours.php?matiere=sciences">
                Commencer
            </a>
        </div>

    </div>

</main>

<script>
function ouvrirMenu() {
    document.querySelector(".sidebar").classList.toggle("active");
}
</script>

</body>
</html>