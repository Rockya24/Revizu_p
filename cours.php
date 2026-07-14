<?php
session_start();


if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: login.php");
    exit();
}


$cours = [

    "math" => [
        "titre" => "Mathématiques",

        "texte" => "Les mathématiques développent le raisonnement logique. Elles permettent de résoudre des problèmes à partir des nombres, des opérations et des règles.

Les opérations de base sont l’addition, la soustraction, la multiplication et la division.

L’addition sert à réunir des quantités : 5 + 3 = 8.

La multiplication est une addition répétée : 4 × 2 signifie 4 ajouté deux fois, donc 8.

Pour réussir un exercice, il faut lire l’énoncé, identifier les données, choisir la bonne opération et vérifier le résultat."
    ],

    "francais" => [
        "titre" => "Français",

        "texte" => "Le français permet de bien lire, écrire et communiquer.

Une phrase commence par une majuscule et se termine par un point. Elle contient souvent un sujet, un verbe et un complément.

Exemple : L’élève révise sa leçon.

En grammaire, le sujet indique de qui ou de quoi on parle. Le verbe exprime l’action.

En orthographe, il faut respecter les accords, le singulier, le pluriel et la bonne écriture des mots.

Par exemple, un cheval devient des chevaux."
    ],

    "culture" => [
        "titre" => "Culture générale",

        "texte" => "La culture générale regroupe les connaissances utiles sur le monde, la société, l’histoire, la géographie et la vie quotidienne.

Elle aide une personne à comprendre son environnement et à développer son esprit critique.

Kinshasa est la capitale de la République démocratique du Congo.

La RDC est située en Afrique centrale et possède de nombreuses richesses naturelles.

La culture générale permet aussi de mieux participer aux discussions et de comprendre les événements de la société."
    ],

    "sciences" => [
        "titre" => "Sciences et vie",

        "texte" => "Les sciences permettent de comprendre le corps humain, la nature et l’environnement.

Le corps humain possède plusieurs organes essentiels.

Les poumons assurent la respiration en permettant l’entrée de l’oxygène.

Le cœur pompe le sang et l’envoie dans toutes les parties du corps.

L’eau est indispensable à la vie et bout normalement à 100 °C.

Les sciences nous aident à mieux comprendre la santé, l’hygiène et les phénomènes naturels."
    ]
];

$matiere = $_GET["matiere"] ?? "math";


if (!isset($cours[$matiere])) {
    $matiere = "math";
}

$data = $cours[$matiere];
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        <?php echo htmlspecialchars($data["titre"]); ?> - RevizUp
    </title>

    <link rel="stylesheet" href="dashboard.css">

</head>

<body>

<button
    class="burger"
    onclick="ouvrirMenu()"
>
    ☰
</button>

<aside class="sidebar">

    <h2>RevizUp</h2>

    <a href="dashboard.php">
        Dashboard
    </a>

    <a href="cartes.php">
        Matières
    </a>

    <a href="logout.php">
        Déconnexion
    </a>

</aside>

<main class="main">

    <header class="topbar">

        <h1>
            <?php echo htmlspecialchars($data["titre"]); ?>
        </h1>

        <p>
            Lisez attentivement le cours avant de commencer le quiz.
        </p>

    </header>

    <section class="course-card">

        <span class="course-label">
            Résumé du cours
        </span>

        <h2>
            Petit cours
        </h2>

        <div class="course-text">

            <?php
            echo nl2br(
                htmlspecialchars($data["texte"])
            );
            ?>

        </div>

        <div class="course-actions">

            <a
                href="quiz.php?matiere=<?php
                    echo urlencode($matiere);
                ?>"
                class="course-start"
            >
                Commencer le quiz
            </a>

            <a
                href="cartes.php"
                class="course-back"
            >
                Retour aux matières
            </a>

        </div>

    </section>

</main>

<script>
function ouvrirMenu() {
    document
        .querySelector(".sidebar")
        .classList
        .toggle("active");
}
</script>

</body>

</html>