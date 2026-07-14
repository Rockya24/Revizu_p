<?php
session_start();


if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: login.php");
    exit();
}


$cours = [

    "math" => [
        "titre" => "Mathématiques",

        "texte" => "Les mathématiques permettent de résoudre des problèmes à partir des nombres, des opérations et des formules.

1. Le pourcentage

Un pourcentage représente une partie sur 100. Pour calculer 15 % de 200, on effectue :

15 × 200 ÷ 100 = 30.

Ainsi, 15 % de 200 représente 30.

2. Les équations

Une équation contient une valeur inconnue, souvent représentée par la lettre x.

Exemple : 3x + 5 = 20.

On retire d’abord 5 aux deux membres : 3x = 15.

Ensuite, on divise par 3 : x = 5.

3. Les fractions

Pour additionner deux fractions qui ont le même dénominateur, on additionne leurs numérateurs.

Exemple : 3/4 + 1/4 = 4/4 = 1.

4. Le périmètre d’un rectangle

Le périmètre représente la longueur totale du contour d’une figure.

La formule du périmètre d’un rectangle est :

P = 2 × (longueur + largeur).

Pour un rectangle de 8 cm de longueur et 5 cm de largeur :

P = 2 × (8 + 5) = 26 cm.

5. Les puissances

Une puissance indique qu’un nombre est multiplié plusieurs fois par lui-même.

Exemple : 2 à la puissance 4 signifie :

2 × 2 × 2 × 2 = 16.

6. La moyenne

Pour calculer une moyenne, on additionne toutes les valeurs puis on divise la somme par le nombre de valeurs.

Exemple : la moyenne de 12, 14 et 16 est :

(12 + 14 + 16) ÷ 3 = 42 ÷ 3 = 14."
    ],

    "francais" => [
        "titre" => "Français",

        "texte" => "Le français permet de lire, d’écrire et de communiquer correctement.

1. Le sujet dans une phrase

Le sujet indique la personne, l’animal ou la chose qui accomplit l’action exprimée par le verbe.

Dans la phrase « Les élèves révisent leur leçon », le sujet est « Les élèves » et le verbe est « révisent ».

2. Le passé composé

Le passé composé est formé avec un auxiliaire, avoir ou être, suivi du participe passé du verbe.

Exemple :

Nous avons terminé notre travail.

Le verbe « terminer » devient « terminé » au participe passé.

3. L’accord du participe passé avec être

Lorsque le passé composé est formé avec l’auxiliaire être, le participe passé s’accorde généralement avec le sujet.

Exemples :

Il est arrivé.

Elle est arrivée.

Ils sont arrivés.

Elles sont arrivées.

4. La différence entre « ou » et « où »

« Ou » sans accent exprime un choix.

Exemple : Veux-tu du thé ou du café ?

« Où » avec un accent indique généralement un lieu.

Exemple : Où vas-tu après les cours ?

5. L’adverbe

L’adverbe précise le sens d’un verbe, d’un adjectif ou d’un autre adverbe.

De nombreux adverbes se terminent par « ment ».

Exemple : L’élève répond rapidement.

Dans cette phrase, « rapidement » est un adverbe.

6. L’accord entre le sujet et le verbe

Le verbe doit s’accorder avec son sujet.

Exemple au singulier :

L’enfant joue dehors.

Exemple au pluriel :

Les enfants jouent dehors."
    ],

    "culture" => [
        "titre" => "Culture générale",

        "texte" => "La culture générale rassemble les connaissances importantes sur l’histoire, la géographie, les institutions et la littérature.

1. L’indépendance de la RDC

La République démocratique du Congo a obtenu son indépendance le 30 juin 1960.

Avant cette date, le pays était une colonie belge.

2. La capitale du Nigeria

Le Nigeria est un pays situé en Afrique de l’Ouest.

Sa capitale est Abuja. Lagos est cependant la ville la plus peuplée et l’un des principaux centres économiques du pays.

3. Le Nil

Le Nil est un grand fleuve africain qui traverse notamment l’Égypte.

Il a joué un rôle très important dans le développement de la civilisation égyptienne.

4. L’Organisation des Nations unies

Le sigle ONU signifie Organisation des Nations unies.

Cette organisation a été créée pour favoriser la paix, la coopération entre les États et la défense des droits humains.

5. Le plus grand continent

L’Asie est le plus grand continent du monde par sa superficie et sa population.

Elle comprend notamment la Chine, l’Inde, le Japon et plusieurs autres pays.

6. Victor Hugo

Victor Hugo est un écrivain français.

Il est notamment l’auteur du roman « Les Misérables », une œuvre qui traite de la pauvreté, de la justice et de la société."
    ],

    "sciences" => [
        "titre" => "Sciences et vie",

        "texte" => "Les sciences permettent de comprendre le corps humain, les êtres vivants, la matière et l’univers.

1. La photosynthèse

La photosynthèse est le processus par lequel les plantes fabriquent leur nourriture grâce à la lumière.

Pendant ce processus, elles absorbent principalement le dioxyde de carbone et rejettent de l’oxygène.

2. Les globules rouges

Le sang contient notamment des globules rouges, des globules blancs et des plaquettes.

Les globules rouges transportent principalement l’oxygène des poumons vers les différentes parties du corps.

3. Le pH de l’eau pure

Le pH permet de mesurer si une substance est acide, neutre ou basique.

Une valeur inférieure à 7 indique généralement une substance acide.

Une valeur de 7 est neutre.

L’eau pure possède donc un pH approximatif de 7.

4. La température d’ébullition de l’eau

Au niveau de la mer, l’eau bout normalement à 100 °C.

À cette température, l’eau liquide se transforme progressivement en vapeur.

5. La gravité

La gravité est une force d’attraction entre les corps.

Elle maintient les personnes et les objets sur la Terre. Elle permet également aux planètes de rester en orbite autour du Soleil.

6. L’ADN

L’ADN est une molécule qui contient l’information héréditaire des êtres vivants.

Cette information participe à la transmission de certaines caractéristiques des parents aux enfants."
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