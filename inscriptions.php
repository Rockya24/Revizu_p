<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - RevizUp</title>
    <link rel="stylesheet" href="forme.css">
</head>
<body>

<header>
    <h1>RevizUp</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="login.php">Connexion</a>
        <a href="inscription.php">Inscription</a>
    </nav>
</header>

<section>
    <h2>Créer un compte</h2>

    <form method="POST" action="">
        <input type="text" name="nom" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>

        <button type="submit">S'inscrire</button>
    </form>
</section>

</body>
</html>