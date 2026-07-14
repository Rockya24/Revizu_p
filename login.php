<?php
session_start();
include("config.php");

$erreur = "";

if (isset($_POST["connecter"])) {

    $email = trim($_POST["email"] ?? "");
    $motDePasse = $_POST["mot_de_passe"] ?? "";

    if ($email === "" || $motDePasse === "") {

        $erreur = "Veuillez remplir tous les champs.";

    } else {

        $sql = "
            SELECT id, nom, email
            FROM utilisateurs
            WHERE email = ?
            AND mot_de_passe = ?
            LIMIT 1
        ";

        $requete = mysqli_prepare($conn, $sql);

        if ($requete) {

            mysqli_stmt_bind_param(
                $requete,
                "ss",
                $email,
                $motDePasse
            );

            mysqli_stmt_execute($requete);

            $resultat = mysqli_stmt_get_result($requete);
            $utilisateur = mysqli_fetch_assoc($resultat);

            if ($utilisateur) {

                session_regenerate_id(true);

                $_SESSION["utilisateur_id"] =
                    (int) $utilisateur["id"];

                $_SESSION["nom"] =
                    $utilisateur["nom"];

                $_SESSION["email"] =
                    $utilisateur["email"];

                header("Location: dashboard.php");
                exit;

            } else {

                $erreur = "Email ou mot de passe incorrect.";
            }

            mysqli_stmt_close($requete);

        } else {

            $erreur = "Erreur pendant la connexion.";
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
        href="forme.css"
    >
</head>

<body>

<header>

    <h1>RevizUp</h1>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="inscriptions.php">Inscription</a>
    </nav>

</header>

<section>

    <h2>Connexion</h2>

    <?php if ($erreur !== "") { ?>

        <p class="erreur">
            <?php echo htmlspecialchars($erreur); ?>
        </p>

    <?php } ?>

    <form method="POST" action="login.php">

        <input
            type="email"
            name="email"
            placeholder="Votre email"
            value="<?php
                echo htmlspecialchars(
                    $_POST["email"] ?? ""
                );
            ?>"
            required
        >

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

    <p>
        Vous n’avez pas encore de compte ?
        <a href="inscriptions.php">
            Créer un compte
        </a>
    </p>

</section>

</body>

</html>