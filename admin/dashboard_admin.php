<?php
session_start();
include("../config.php");

if (!isset($_SESSION["admin_connecte"])) {
    header("Location: ../login.php");
    exit;
}

$requeteUtilisateurs = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM utilisateurs"
);

$donneesUtilisateurs = mysqli_fetch_assoc($requeteUtilisateurs);
$totalUtilisateurs = $donneesUtilisateurs["total"];

$requeteQuiz = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM resultats_quiz"
);

$donneesQuiz = mysqli_fetch_assoc($requeteQuiz);
$totalQuiz = $donneesQuiz["total"];


$listeUtilisateurs = mysqli_query(
    $conn,
    "SELECT id, nom, email FROM utilisateurs ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Administration - RevizUp</title>

    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

<header class="admin-header">

    <h1>RevizUp Admin</h1>

    <a href="logout_admin.php" class="deconnexion">
        Déconnexion
    </a>

</header>


<main class="admin-container">

    <h2>Tableau de bord</h2>

    <p class="bienvenue">
        Bienvenue,
        <?php echo htmlspecialchars($_SESSION["admin_nom"]); ?>
    </p>

<div class="menu-admin">

    <a href="dashboard_admin.php">
        Accueil
    </a>

    <a href="resultats_admin.php">
        Voir les résultats des quiz
    </a>

    <a href="logout_admin.php">
        Déconnexion
    </a>

</div>

    <div class="statistiques">

        <div class="stat-card">

            <h3>Utilisateurs inscrits</h3>

            <p>
                <?php echo $totalUtilisateurs; ?>
            </p>

        </div>


        <div class="stat-card">

            <h3>Quiz effectués</h3>

            <p>
                <?php echo $totalQuiz; ?>
            </p>

        </div>

    </div>



    <div class="table-container">

        <h2>Liste des utilisateurs</h2>

        <table>

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

            </thead>


            <tbody>

            <?php while ($utilisateur = mysqli_fetch_assoc($listeUtilisateurs)) { ?>

                <tr>

                    <td>
                        <?php echo $utilisateur["id"]; ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($utilisateur["nom"]); ?>
                    </td>

                    <td>
                        <?php echo htmlspecialchars($utilisateur["email"]); ?>
                    </td>

                    <td>

                    <a
                        href="supprimer_utilisateur.php?id=<?php echo $utilisateur["id"]; ?>"
                        class="supprimer"
                        onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');"
>
                        Supprimer
</a>
<a href="resultats_admin.php">
    Voir les résultats des quiz
</a>
                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</main>

</body>
</html>
