<?php
session_start();
include("config.php");

if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: login.php");
    exit();
}

$utilisateurId = (int) $_SESSION["utilisateur_id"];

$listeQuiz = [

    "math" => [
        "titre" => "Mathématiques",

        "questions" => [
            [
                "question" => "Combien représentent 15 % de 200 ?",
                "options" => ["15", "30", "45"],
                "bonne_reponse" => "30"
            ],
            [
                "question" => "Quelle est la valeur de x dans l’équation 3x + 5 = 20 ?",
                "options" => ["5", "10", "15"],
                "bonne_reponse" => "5"
            ],
            [
                "question" => "Combien font 3/4 + 1/4 ?",
                "options" => ["1", "4/8", "2"],
                "bonne_reponse" => "1"
            ],
            [
                "question" => "Quel est le périmètre d’un rectangle de 8 cm de longueur et 5 cm de largeur ?",
                "options" => ["13 cm", "26 cm", "40 cm"],
                "bonne_reponse" => "26 cm"
            ],
            [
                "question" => "Combien font 2 à la puissance 4 ?",
                "options" => ["8", "12", "16"],
                "bonne_reponse" => "16"
            ],
            [
                "question" => "Quelle est la moyenne des nombres 12, 14 et 16 ?",
                "options" => ["13", "14", "15"],
                "bonne_reponse" => "14"
            ]
        ]
    ],

    "francais" => [
        "titre" => "Français",

        "questions" => [
            [
                "question" => "Quel est le sujet dans la phrase : « Les élèves révisent leur leçon » ?",
                "options" => [
                    "Les élèves",
                    "révisent",
                    "leur leçon"
                ],
                "bonne_reponse" => "Les élèves"
            ],
            [
                "question" => "Quelle phrase est correctement conjuguée au passé composé ?",
                "options" => [
                    "Nous avons terminé",
                    "Nous avons terminer",
                    "Nous sommes terminé"
                ],
                "bonne_reponse" => "Nous avons terminé"
            ],
            [
                "question" => "Quelle phrase respecte correctement l’accord du participe passé ?",
                "options" => [
                    "Elles sont arrivé",
                    "Elles sont arrivées",
                    "Elles ont arrivées"
                ],
                "bonne_reponse" => "Elles sont arrivées"
            ],
            [
                "question" => "Quel mot complète correctement la phrase : « ___ vas-tu après les cours ? »",
                "options" => ["Ou", "Où", "Ont"],
                "bonne_reponse" => "Où"
            ],
            [
                "question" => "Quelle est la nature grammaticale du mot « rapidement » ?",
                "options" => [
                    "Un adjectif",
                    "Un adverbe",
                    "Un verbe"
                ],
                "bonne_reponse" => "Un adverbe"
            ],
            [
                "question" => "Quelle phrase est correctement écrite ?",
                "options" => [
                    "Les enfant jouent dehors.",
                    "Les enfants joue dehors.",
                    "Les enfants jouent dehors."
                ],
                "bonne_reponse" => "Les enfants jouent dehors."
            ]
        ]
    ],

    "culture" => [
        "titre" => "Culture générale",

        "questions" => [
            [
                "question" => "En quelle année la République démocratique du Congo a-t-elle obtenu son indépendance ?",
                "options" => ["1950", "1960", "1970"],
                "bonne_reponse" => "1960"
            ],
            [
                "question" => "Quelle est la capitale du Nigeria ?",
                "options" => ["Lagos", "Abuja", "Accra"],
                "bonne_reponse" => "Abuja"
            ],
            [
                "question" => "Quel fleuve traverse principalement l’Égypte ?",
                "options" => [
                    "Le Congo",
                    "Le Nil",
                    "Le Niger"
                ],
                "bonne_reponse" => "Le Nil"
            ],
            [
                "question" => "Que signifie le sigle ONU ?",
                "options" => [
                    "Organisation des Nations unies",
                    "Organisation nationale universelle",
                    "Office des Nations unies"
                ],
                "bonne_reponse" => "Organisation des Nations unies"
            ],
            [
                "question" => "Quel est le plus grand continent du monde ?",
                "options" => [
                    "L’Afrique",
                    "L’Europe",
                    "L’Asie"
                ],
                "bonne_reponse" => "L’Asie"
            ],
            [
                "question" => "Qui est l’auteur du roman « Les Misérables » ?",
                "options" => [
                    "Victor Hugo",
                    "Molière",
                    "Jean de La Fontaine"
                ],
                "bonne_reponse" => "Victor Hugo"
            ]
        ]
    ],

    "sciences" => [
        "titre" => "Sciences et vie",

        "questions" => [
            [
                "question" => "Quel gaz les plantes absorbent-elles pendant la photosynthèse ?",
                "options" => [
                    "Le dioxyde de carbone",
                    "L’oxygène",
                    "L’hydrogène"
                ],
                "bonne_reponse" => "Le dioxyde de carbone"
            ],
            [
                "question" => "Quels éléments du sang transportent principalement l’oxygène ?",
                "options" => [
                    "Les globules rouges",
                    "Les globules blancs",
                    "Les plaquettes"
                ],
                "bonne_reponse" => "Les globules rouges"
            ],
            [
                "question" => "Quel est le pH approximatif de l’eau pure ?",
                "options" => ["5", "7", "10"],
                "bonne_reponse" => "7"
            ],
            [
                "question" => "À quelle température l’eau bout-elle normalement au niveau de la mer ?",
                "options" => [
                    "50 °C",
                    "100 °C",
                    "150 °C"
                ],
                "bonne_reponse" => "100 °C"
            ],
            [
                "question" => "Quelle force maintient les planètes autour du Soleil ?",
                "options" => [
                    "La gravité",
                    "L’électricité",
                    "Le magnétisme"
                ],
                "bonne_reponse" => "La gravité"
            ],
            [
                "question" => "Quelle molécule contient principalement l’information héréditaire ?",
                "options" => [
                    "L’ADN",
                    "L’eau",
                    "Le glucose"
                ],
                "bonne_reponse" => "L’ADN"
            ]
        ]
    ]
];

$matiere = $_GET["matiere"] ?? "math";

if (!isset($listeQuiz[$matiere])) {
    $matiere = "math";
}

$titre = $listeQuiz[$matiere]["titre"];
$questions = $listeQuiz[$matiere]["questions"];

$totalQuestions = count($questions);

$score = null;
$reussi = false;
$pourcentage = 0;

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $score = 0;

    foreach ($questions as $numero => $question) {

        $reponseUtilisateur =
            $_POST["reponses"][$numero] ?? "";

        if (
            $reponseUtilisateur ===
            $question["bonne_reponse"]
        ) {
            $score++;
        }
    }

    $reussi = $score >= 4;

    $pourcentage = round(
        ($score / $totalQuestions) * 100
    );

    $reussiNombre = $reussi ? 1 : 0;

    $sql = "
        INSERT INTO resultats_quiz
        (
            utilisateur_id,
            matiere,
            score,
            total_questions,
            reussi
        )
        VALUES (?, ?, ?, ?, ?)

        ON DUPLICATE KEY UPDATE

        score = GREATEST(score, VALUES(score)),
        total_questions = VALUES(total_questions),
        reussi = GREATEST(reussi, VALUES(reussi)),
        date_resultat = CURRENT_TIMESTAMP
    ";

    $requete = mysqli_prepare($conn, $sql);

    if ($requete) {

        mysqli_stmt_bind_param(
            $requete,
            "isiii",
            $utilisateurId,
            $matiere,
            $score,
            $totalQuestions,
            $reussiNombre
        );

        mysqli_stmt_execute($requete);
        mysqli_stmt_close($requete);
    }
}
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
        Quiz <?php echo htmlspecialchars($titre); ?> - RevizUp
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

    <div class="topbar">

        <h1>
            Quiz :
            <?php echo htmlspecialchars($titre); ?>
        </h1>

        <?php if ($score === null) { ?>

            <p>
                Répondez aux six questions.
                Il faut obtenir au moins quatre bonnes réponses
                pour réussir.
            </p>

        <?php } else { ?>

            <p>
                Voici le résultat de votre quiz.
            </p>

        <?php } ?>

    </div>

    <?php if ($score === null) { ?>

        <form
            method="POST"
            action="quiz.php?matiere=<?php
                echo urlencode($matiere);
            ?>"
            class="quiz-form"
        >

            <?php
            foreach (
                $questions as $numero => $question
            ) {
            ?>

                <div class="quiz-question">

                    <span class="quiz-number">

                        Question
                        <?php echo $numero + 1; ?>
                        sur
                        <?php echo $totalQuestions; ?>

                    </span>

                    <h3>

                        <?php
                        echo htmlspecialchars(
                            $question["question"]
                        );
                        ?>

                    </h3>

                    <div class="quiz-options">

                        <?php
                        foreach (
                            $question["options"] as $option
                        ) {
                        ?>

                            <label class="quiz-option">

                                <input
                                    type="radio"
                                    name="reponses[<?php
                                        echo $numero;
                                    ?>]"
                                    value="<?php
                                        echo htmlspecialchars($option);
                                    ?>"
                                    required
                                >

                                <span>
                                    <?php
                                    echo htmlspecialchars($option);
                                    ?>
                                </span>

                            </label>

                        <?php } ?>

                    </div>

                </div>

            <?php } ?>

            <button
                type="submit"
                class="quiz-submit"
            >
                Terminer le quiz
            </button>

        </form>

    <?php } else { ?>

        <div
            class="quiz-result <?php
                echo $reussi
                    ? "quiz-success"
                    : "quiz-fail";
            ?>"
        >

            <div class="quiz-result-icon">

                <?php
                echo $reussi
                    ? "🎉"
                    : "😔";
                ?>

            </div>

            <?php if ($reussi) { ?>

                <h2>
                    Félicitations !
                </h2>

                <p>
                    Vous avez réussi le quiz de

                    <strong>
                        <?php
                        echo htmlspecialchars($titre);
                        ?>
                    </strong>.
                </p>

            <?php } else { ?>

                <h2>
                    Quiz non réussi
                </h2>

                <p>
                    Désolé, vous n’avez pas obtenu
                    la note minimale.
                </p>

            <?php } ?>

            <div class="quiz-score">

                <?php echo $score; ?>
                /
                <?php echo $totalQuestions; ?>

            </div>

            <p class="quiz-percentage">

                <?php echo $pourcentage; ?> %

            </p>

            <?php if ($reussi) { ?>

                <p>
                    Cette matière est maintenant comptée
                    dans votre progression.
                </p>

                <div class="quiz-actions">

                    <a href="dashboard.php">
                        Voir ma progression
                    </a>

                    <a
                        href="cartes.php"
                        class="quiz-secondary"
                    >
                        Autres matières
                    </a>

                </div>

            <?php } else { ?>

                <p>
                    Il faut obtenir au moins quatre bonnes
                    réponses sur six. Vous pouvez recommencer.
                </p>

                <div class="quiz-actions">

                    <a
                        href="quiz.php?matiere=<?php
                            echo urlencode($matiere);
                        ?>"
                    >
                        Recommencer le quiz
                    </a>

                    <a
                        href="cartes.php"
                        class="quiz-secondary"
                    >
                        Retour aux matières
                    </a>

                </div>

            <?php } ?>

        </div>

    <?php } ?>

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