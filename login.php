<?php
include("config.php");

if(isset($_POST['connecter'])){
    $email = $_POST['email'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $sql = "SELECT * FROM utilisateurs 
            WHERE email='$email' 
            AND mot_de_passe='$mot_de_passe'";

    $resultat = mysqli_query($conn, $sql);

    if(mysqli_num_rows($resultat) > 0){

    $utilisateur = mysqli_fetch_assoc($resultat);

    session_start();
    $_SESSION['nom'] = $utilisateur['nom'];
    $_SESSION['email'] = $utilisateur['email'];

    header("Location: dashboard.php");
    exit();

}else{
    $erreur = "Email ou mot de passe incorrect";
}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion - RevizUp</title>
    <link rel="stylesheet" href="forme.css">
</head>
<body>

<header>
    <h1>RevizUp</h1>

    <nav>
        <a href="index.php">Accueil</a>
        <a href="login.php">Connexion</a>
        <a href="inscriptions.php">Inscription</a>
    </nav>
</header>

<section>
    <h2>Connexion</h2>

    <?php
    if(isset($erreur)){
        echo "<p class='erreur'>$erreur</p>";
    }
    ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Votre email" required>

        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>

        <button type="submit" name="connecter">Se connecter</button>
    </form>
</section>

</body>
</html>