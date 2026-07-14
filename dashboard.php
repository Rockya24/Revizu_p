<?php
session_start();
include("config.php");

if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: login.php");
    exit();
}

$utilisateurId = (int) $_SESSION["utilisateur_id"];
$nom = $_SESSION["nom"] ?? "Utilisateur";

$nombreMatieres = 4;
$matieresReussies = 0;

$sqlProgression = "
    SELECT COUNT(*)
    FROM resultats_quiz
    WHERE utilisateur_id = ?
    AND reussi = 1
";

$requeteProgression = mysqli_prepare(
    $conn,
    $sqlProgression
);

mysqli_stmt_bind_param(
    $requeteProgression,
    "i",
    $utilisateurId
);

mysqli_stmt_execute($requeteProgression);

mysqli_stmt_bind_result(
    $requeteProgression,
    $matieresReussies
);

mysqli_stmt_fetch($requeteProgression);
mysqli_stmt_close($requeteProgression);

$progression = round(
    ($matieresReussies / $nombreMatieres) * 100
);

$progression = min($progression, 100);

$sqlActivites = "
    SELECT
        matiere,
        score,
        total_questions,
        reussi,
        date_resultat
    FROM resultats_quiz
    WHERE utilisateur_id = ?
    ORDER BY date_resultat DESC
    LIMIT 3
";

$requeteActivites = mysqli_prepare(
    $conn,
    $sqlActivites
);

mysqli_stmt_bind_param(
    $requeteActivites,
    "i",
    $utilisateurId
);

mysqli_stmt_execute($requeteActivites);

$resultatActivites = mysqli_stmt_get_result(
    $requeteActivites
);

$activites = [];

while (
    $activite = mysqli_fetch_assoc($resultatActivites)
) {
    $activites[] = $activite;
}

mysqli_stmt_close($requeteActivites);

$nomsMatieres = [
    "math" => "Mathématiques",
    "francais" => "Français",
    "culture" => "Culture générale",
    "sciences" => "Sciences et vie"
];
?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Tableau de bord - RevizUp</title>

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
            Bienvenue,
            <?php echo htmlspecialchars($nom); ?> 😊
        </h1>

        <p>
            Consultez vos résultats et continuez votre apprentissage.
        </p>

    </header>

    <div class="resume-grid">

        <article class="resume-card">

            <div class="resume-icon">
                📚
            </div>

            <div class="resume-content">

                <h2>Matières</h2>

                <strong>
                    <?php echo $nombreMatieres; ?>
                </strong>

                <p>
                    Matières disponibles
                </p>

            </div>

        </article>

        <article class="resume-card">

            <div class="resume-icon">
                📈
            </div>

            <div class="resume-content">

                <h2>Progression</h2>

                <strong>
                    <?php echo $progression; ?> %
                </strong>

                <p>
                    <?php echo $matieresReussies; ?>
                    matière(s) réussie(s) sur
                    <?php echo $nombreMatieres; ?>
                </p>

                <div class="progression-bar">

                    <div
                        class="progression-value"
                        style="--progression: <?php
                            echo $progression;
                        ?>%;"
                    ></div>

                </div>

            </div>

        </article>

    </div>

    <div class="dashboard-grid">

        <section class="dashboard-card">

            <span class="dashboard-badge">
                Apprentissage
            </span>

            <h2>Mes matières</h2>

            <p>
                Choisissez une matière, consultez son cours
                et réalisez ensuite le quiz.
            </p>

            <a href="cartes.php">
                Voir les matières
            </a>

        </section>

        <section class="activity-card">

            <div class="activity-header">

                <div>

                    <span class="dashboard-badge">
                        Historique
                    </span>

                    <h2>Dernières activités</h2>

                </div>

                <span class="activity-count">
                    <?php echo count($activites); ?>
                </span>

            </div>

            <?php if (count($activites) > 0) { ?>

                <div class="activity-list">

                    <?php foreach ($activites as $activite) { ?>

                        <?php
                        $codeMatiere = $activite["matiere"];

                        $nomMatiere =
                            $nomsMatieres[$codeMatiere]
                            ?? ucfirst($codeMatiere);

                        $estReussi =
                            (int) $activite["reussi"] === 1;

                        $dateResultat = date(
                            "d/m/Y à H:i",
                            strtotime(
                                $activite["date_resultat"]
                            )
                        );
                        ?>

                        <div class="activity-item">

                            <div
                                class="activity-icon <?php
                                    echo $estReussi
                                        ? "activity-success"
                                        : "activity-failure";
                                ?>"
                            >

                                <?php
                                echo $estReussi
                                    ? "✓"
                                    : "×";
                                ?>

                            </div>

                            <div class="activity-info">

                                <h3>
                                    <?php
                                    echo htmlspecialchars(
                                        $nomMatiere
                                    );
                                    ?>
                                </h3>

                                <p>

                                    <?php if ($estReussi) { ?>

                                        Vous avez réussi ce quiz avec

                                    <?php } else { ?>

                                        Vous devez recommencer ce quiz :

                                    <?php } ?>

                                    <strong>
                                        <?php
                                        echo (int) $activite["score"];
                                        ?>
                                        /
                                        <?php
                                        echo (int) $activite["total_questions"];
                                        ?>
                                    </strong>

                                </p>

                                <small>
                                    <?php
                                    echo htmlspecialchars(
                                        $dateResultat
                                    );
                                    ?>
                                </small>

                            </div>

                            <a
                                href="quiz.php?matiere=<?php
                                    echo urlencode($codeMatiere);
                                ?>"
                                class="activity-link"
                            >
                                <?php
                                echo $estReussi
                                    ? "Revoir"
                                    : "Recommencer";
                                ?>
                            </a>

                        </div>

                    <?php } ?>

                </div>

            <?php } else { ?>

                <div class="activity-empty">

                    <div class="activity-empty-icon">
                        📝
                    </div>

                    <h3>
                        Aucune activité pour le moment
                    </h3>

                    <p>
                        Terminez votre premier quiz pour voir
                        votre résultat apparaître ici.
                    </p>

                    <a href="cartes.php">
                        Commencer un quiz
                    </a>

                </div>

            <?php } ?>

        </section>

    </div>

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