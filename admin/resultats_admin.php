<?php
session_start();
include("../config.php");

if (!isset($_SESSION["admin_connecte"])) {
    header("Location: ../login.php");
    exit;
}

$requete = mysqli_query(
    $conn,
    "SELECT 
        resultats_quiz.id,
        resultats_quiz.matiere,
        resultats_quiz.score,
        resultats_quiz.total_questions,
        resultats_quiz.reussi,
        resultats_quiz.date_resultat,
        utilisateurs.nom,
        utilisateurs.email
    FROM resultats_quiz
    INNER JOIN utilisateurs
    ON resultats_quiz.utilisateur_id = utilisateurs.id
    ORDER BY resultats_quiz.date_resultat DESC"
);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Résultats des quiz - RevizUp</title>

    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

<header class="admin-header">

    <h1>RevizUp Admin</h1>

    <a href="dashboard_admin.php" class="deconnexion">
        Retour
    </a>

</header>


<main class="admin-container">

    <div class="table-container">

        <h2>Résultats des quiz</h2>

        <table>

            <thead>

                <tr>
                    <th>Utilisateur</th>
                    <th>Email</th>
                    <th>Matière</th>
                    <th>Score</th>
                    <th>Résultat</th>
                    <th>Date</th>
                </tr>

            </thead>

            <tbody>

            <?php while ($resultat = mysqli_fetch_assoc($requete)) { ?>

                <tr>

                    <td>
                        <?php echo htmlspecialchars($resultat["nom"]); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($resultat["email"]); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($resultat["matiere"]); ?>
                    </td>

                    <td>
                        <?php
                        echo $resultat["score"]
                        . " / "
                        . $resultat["total_questions"];
                        ?>
                    </td>

                    <td>

                        <?php
                        if ($resultat["reussi"] == 1) {
                            echo "Réussi";
                        } else {
                            echo "Échoué";
                        }
                        ?>

                    </td>

                    <td>
                        <?php echo $resultat["date_resultat"]; ?>
                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</main>

</body>

</html>
