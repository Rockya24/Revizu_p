<?php
session_start();

$matiere = $_GET['matiere'] ?? "math";

$titres = [
    "math" => "Mathématiques",
    "francais" => "Français",
    "culture" => "Culture générale",
    "sciences" => "Sciences et vie"
];

$titre = $titres[$matiere] ?? "Quiz";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz - RevizUp</title>
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
        <h1>Quiz : <?php echo $titre; ?></h1>
        <p>Répondez aux questions ci-dessous.</p>
    </div>

    <div class="box">
        <form method="POST">

            <h3>Question 1</h3>
            <p>Combien font 5 + 3 ?</p>

            <label><input type="radio" name="q1" value="6"> 6</label><br>
            <label><input type="radio" name="q1" value="8"> 8</label><br>
            <label><input type="radio" name="q1" value="10"> 10</label><br><br>

            <h3>Question 2</h3>
            <p>Combien font 4 × 2 ?</p>

            <label><input type="radio" name="q2" value="6"> 6</label><br>
            <label><input type="radio" name="q2" value="8"> 8</label><br>
            <label><input type="radio" name="q2" value="12"> 12</label><br><br>

            <button type="submit">Valider</button>
        </form>
    </div>

</main>

<script>
function ouvrirMenu(){
    document.querySelector(".sidebar").classList.toggle("active");
}
</script>

</body>
</html>