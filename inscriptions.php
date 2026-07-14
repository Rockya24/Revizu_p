<?php
include("config.php");

$message = "";

if (isset($_POST['inscrire'])) {

    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $mot_de_passe = trim($_POST['mot_de_passe']);

    if ($nom == "" || $email == "" || $mot_de_passe == "") {
        $message = "Veuillez remplir tous les champs.";
    } else {

        $verification = mysqli_query(
            $conn,
            "SELECT * FROM utilisateurs WHERE email='$email'"
        );

        if (mysqli_num_rows($verification) > 0) {
            $message = "Cette adresse e-mail est déjà utilisée.";
        } else {

            $sql = "INSERT INTO utilisateurs(nom, email, mot_de_passe)
                    VALUES('$nom', '$email', '$mot_de_passe')";

            if (mysqli_query($conn, $sql)) {
                header("Location: login.php");
                exit();
            } else {
                $message = "Une erreur est survenue pendant l'inscription.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inscription - RevizUp</title>

    <link rel="stylesheet" href="forme.css">
</head>

<body>

<header>
    <div class="logo">
        <h1>RevizUp</h1>
        <span>Révisez intelligemment.</span>
    </div>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="login.php">Connexion</a>
        <a href="inscriptions.php">Inscription</a>
    </nav>
</header>

<section>
    <h2>Créer un compte</h2>

    <?php if ($message != "") { ?>
        <p class="erreur">
            <?php echo $message; ?>
        </p>
    <?php } ?>

    <form method="POST" action="">

        <input
            type="text"
            name="nom"
            placeholder="Votre nom"
            required
        >

        <input
            type="email"
            name="email"
            placeholder="Votre e-mail"
            required
        >

        <input
            type="password"
            name="mot_de_passe"
            placeholder="Mot de passe"
            required
        >

        <button type="submit" name="inscrire">
            S'inscrire
        </button>

        <p class="form-link">
            Vous avez déjà un compte ?
            <a href="login.php">Se connecter</a>
        </p>

    </form>
</section>

</body>
</html>