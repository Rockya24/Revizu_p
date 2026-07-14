<?php
session_start();

$matiere = $_GET['matiere'] ?? "math";
$score = null;

$quiz = [
    "math" => [
        "titre" => "Mathématiques",
        "q1" => ["question" => "Combien font 5 + 3 ?", "reponse" => "8", "choix" => ["6", "8", "10"]],
        "q2" => ["question" => "Combien font 4 × 2 ?", "reponse" => "8", "choix" => ["6", "8", "12"]]
    ],
    "francais" => [
        "titre" => "Français",
        "q1" => ["question" => "Quel est le pluriel de cheval ?", "reponse" => "chevaux", "choix" => ["chevals", "chevaux", "chevaus"]],
        "q2" => ["question" => "Une phrase commence par quoi ?", "reponse" => "une majuscule", "choix" => ["une minuscule", "une virgule", "une majuscule"]]
    ],
    "culture" => [
        "titre" => "Culture générale",
        "q1" => ["question" => "Quelle est la capitale de la RDC ?", "reponse" => "Kinshasa", "choix" => ["Goma", "Kinshasa", "Lubumbashi"]],
        "q2" => ["question" => "La RDC est située en quelle partie de l’Afrique ?", "reponse" => "Afrique centrale", "choix" => ["Afrique centrale", "Afrique du Nord", "Afrique australe"]]
    ],
    "sciences" => [
        "titre" => "Sciences et vie",
        "q1" => ["question" => "Quel organe permet de respirer ?", "reponse" => "les poumons", "choix" => ["le cœur", "les poumons", "l’estomac"]],
        "q2" => ["question" => "L’eau bout à combien de degrés ?", "reponse" => "100°C", "choix" => ["50°C", "100°C", "200°C"]]
    ]
];

$data = $quiz[$matiere];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $score = 0;

    if($_POST["q1"] == $data["q1"]["reponse"]){
        $score++;
    }

    if($_POST["q2"] == $data["q2"]["reponse"]){
        $score++;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Quiz - RevizUp</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>

<button class="burger" onclick="ouvrirMenu()">☰</button>

<aside class="sidebar">
    <h2>RevizUp</h2>
    <a href="dashboard.php">Dashboard</a>
    <a href="cartes.php">Matières</a>
    <a href="revisions.php">Révisions</a>
    <a href="logout.php">Déconnexion</a>
</aside>

<main class="main">

    <div class="topbar">
        <h1>Quiz : <?php echo $data["titre"]; ?></h1>
        <p>Répondez aux questions puis validez.</p>
    </div>

    <div class="box">

        <?php if($score !== null){ ?>
            <h2>Résultat : <?php echo $score; ?> / 2</h2>
            <p>
                <?php
                if($score == 2){
                    echo "Excellent travail !";
                }elseif($score == 1){
                    echo "Bon effort, continuez à réviser.";
                }else{
                    echo "Relisez le cours et réessayez.";
                }
                ?>
            </p>
            <br>
        <?php } ?>

        <form method="POST">
            <h3>Question 1</h3>
            <p><?php echo $data["q1"]["question"]; ?></p>

            <?php foreach($data["q1"]["choix"] as $choix){ ?>
                <label>
                    <input type="radio" name="q1" value="<?php echo $choix; ?>" required>
                    <?php echo $choix; ?>
                </label><br>
            <?php } ?>

            <br>

            <h3>Question 2</h3>
            <p><?php echo $data["q2"]["question"]; ?></p>

            <?php foreach($data["q2"]["choix"] as $choix){ ?>
                <label>
                    <input type="radio" name="q2" value="<?php echo $choix; ?>" required>
                    <?php echo $choix; ?>
                </label><br>
            <?php } ?>

            <br>

            <button type="submit">Valider le quiz</button>
            <a href="cours.php?matiere=<?php echo $matiere; ?>">Relire le cours</a>
        </form>

    </div>

</main>

<script>
function ouvrirMenu(){
    document.querySelector(".sidebar").classList.toggle("active");
}
</script>

</body>
</html>