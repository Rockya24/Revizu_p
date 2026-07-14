<?php
session_start();

$matiere = $_GET['matiere'] ?? "math";

$cours = [
    "math" => [
        "titre" => "Mathématiques",
        "texte" => "Les mathématiques développent le raisonnement logique. Elles permettent de résoudre des problèmes à partir des nombres, des opérations et des règles. Les opérations de base sont l’addition, la soustraction, la multiplication et la division. L’addition sert à réunir des quantités : 5 + 3 = 8. La multiplication est une addition répétée : 4 × 2 signifie 4 ajouté deux fois, donc 8. Pour réussir un exercice, il faut lire l’énoncé, identifier les données, choisir la bonne opération et vérifier le résultat."
    ],
    "francais" => [
        "titre" => "Français",
        "texte" => "Le français permet de bien lire, écrire et communiquer. Une phrase commence par une majuscule et se termine par un point. Elle contient souvent un sujet, un verbe et un complément. Exemple : L’élève révise sa leçon. En grammaire, le sujet indique de qui ou de quoi on parle. Le verbe exprime l’action. En orthographe, il faut respecter les accords, le singulier, le pluriel et la bonne écriture des mots. Par exemple, un cheval devient des chevaux."
    ],
    "culture" => [
        "titre" => "Culture générale",
        "texte" => "La culture générale regroupe les connaissances utiles sur le monde, la société, l’histoire, la géographie et la vie quotidienne. Elle aide à comprendre son environnement. Kinshasa est la capitale de la République Démocratique du Congo. La RDC est située en Afrique centrale et possède de nombreuses richesses naturelles. La culture générale permet aussi de développer l’esprit critique et de mieux participer aux discussions."
    ],
    "sciences" => [
        "titre" => "Sciences et vie",
        "texte" => "Les sciences et vie permettent de comprendre le corps humain, la nature et l’environnement. Le corps humain possède plusieurs organes essentiels. Les poumons permettent la respiration en faisant entrer l’oxygène. Le cœur pompe le sang et l’envoie dans tout le corps. L’eau est indispensable à la vie et bout à 100°C dans des conditions normales. Les sciences aident à mieux comprendre la santé, l’hygiène et les phénomènes naturels."
    ]
];

$data = $cours[$matiere];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cours - RevizUp</title>
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
        <h1><?php echo $data["titre"]; ?></h1>
        <p>Lisez le cours avant de commencer le quiz.</p>
    </div>

    <div class="box">
        <h2>Petit cours</h2>
    <div class="cours-texte">
        <p><?php echo nl2br($data["texte"]); ?></p>
    </div>
    </div>
    <br>

        <a href="quiz.php?matiere=<?php echo $matiere; ?>">Commencer le quiz</a>
        <a href="cartes.php">Retour</a>
    </div>
</main>

<script>
function ouvrirMenu(){
    document.querySelector(".sidebar").classList.toggle("active");
}
</script>

</body>
</html>