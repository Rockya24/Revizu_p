<?php
session_start();
include("config.php");

$erreur = "";

if (isset($_POST["connecter"])) {

    $identifiant = trim($_POST["identifiant"] ?? "");
    $motDePasse = $_POST["mot_de_passe"] ?? "";

    if ($identifiant === "" || $motDePasse === "") {

        $erreur = "Veuillez remplir tous les champs.";

    } else {

        $sqlAdmin =  "SELECT id, nom, identifiant
                    FROM administrateurs
                    WHERE identifiant = ?
                    AND mot_de_passe = ?
                    LIMIT 1";

        $requeteAdmin = mysqli_prepare($conn, $sqlAdmin);

        mysqli_stmt_bind_param(
            $requeteAdmin,
            "ss",
            $identifiant,
            $motDePasse
        );

        mysqli_stmt_execute($requeteAdmin);

        $resultatAdmin = mysqli_stmt_get_result($requeteAdmin);

        $admin = mysqli_fetch_assoc($resultatAdmin);


        if ($admin) {

            session_regenerate_id(true);

            $_SESSION["admin_id"] = $admin["id"];
            $_SESSION["admin_nom"] = $admin["nom"];
            $_SESSION["admin_connecte"] = true;

            header("Location: admin/dashboard_admin.php");
            exit;
        }


        $sqlUtilisateur = "SELECT id, nom, email
                        FROM utilisateurs
                        WHERE email = ?
                        AND mot_de_passe = ?
                        LIMIT 1";

        $requeteUtilisateur = mysqli_prepare(
            $conn,
            $sqlUtilisateur
        );

        mysqli_stmt_bind_param(
            $requeteUtilisateur,
            "ss",
            $identifiant,
            $motDePasse
        );

        mysqli_stmt_execute($requeteUtilisateur);

        $resultatUtilisateur =
            mysqli_stmt_get_result($requeteUtilisateur);

        $utilisateur =
            mysqli_fetch_assoc($resultatUtilisateur);


        if ($utilisateur) {

            session_regenerate_id(true);

            $_SESSION["utilisateur_id"] =
                $utilisateur["id"];

            $_SESSION["nom"] =
                $utilisateur["nom"];

            $_SESSION["email"] =
                $utilisateur["email"];

            header("Location: dashboard.php");
            exit;

        } else {

            $erreur =
                "Identifiant ou mot de passe incorrect.";
        }
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

    <title>Connexion - RevizUp</title>

    <link
        rel="stylesheet"
        href="css/admin.css"
    >

</head>

<body>


<header class="admin-header">

    <h1>RevizUp</h1>

</header>


<main class="login-admin">

<section class="login-card">

    <h2>Connexion</h2>


    <?php if ($erreur !== "") { ?>

        <p class="erreur">

            <?php
            echo htmlspecialchars($erreur);
            ?>

        </p>

    <?php } ?>


    <form
        method="POST"
        action=""
    >


        <label>
            Email ou identifiant
        </label>

        <input
            type="text"
            name="identifiant"
            placeholder="Email ou identifiant"
            required
        >


        <label>
            Mot de passe
        </label>

        <input
            type="password"
            name="mot_de_passe"
            placeholder="Mot de passe"
            required
        >


        <button
            type="submit"
            name="connecter"
        >

            Se connecter

        </button>


    </form>


</section>

</main>


</body>

</html>
