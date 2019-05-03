<?php
// Appel vers la base de donnée
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
// Gérer les erreurs
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Aller chercher les données dans la table
$reponse = $bdd->query('SELECT chapter_number, date_publi, title, text_chapter, couleur FROM livre ORDER BY date_publi');
?>


<!-- ici on commence le HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billet simple pour l'Alaska - Chapitre N°</title> <!-- Inserer en PHP le num de cchapitre -->
    <meta name="description" content="Un billet pour l'alaska, le blog de l'écrivain Jean Forteroche">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@billetalaska" />
    <meta name="twitter:title" content="Un billet pour l'alaska, le blog de l'écrivain Jean Forteroche" />
    <meta name="twitter:description" content="Un billet pour l'alaska, le blog de l'écrivain Jean Forteroche" />
    <meta name="twitter:image:src" content="http://www.yohannjacob.fr/Openclassrooms/Projet4/img/photo1.jpg" />

    <!-- Open Graph data -->
    <meta property="og:title" content="Un billet pour l'alaska, le blog de l'écrivain Jean Forteroche" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.yohannjacob.fr/Openclassrooms/Projet4/index.html" />
    <meta property="og:image" content="http://www.yohannjacob.fr/Openclassrooms/Projet4//images/equipe.jpg" />
    <meta property="og:description" content="Un billet pour l'alaska, le blog de l'écrivain Jean Forteroche" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container-fluid">
        <!-- Menu -->
        <div class="row menunav">
            <div class="col-md-10 offset-md-1 back_home text_sans-serif"><a href="index.php">JEAN FORTEROCHE</a></div>
            <div class="col-md-1"><i class="fas fa-bars"></i></div>
        </div>
        <?php while ($donnees = $reponse->fetch()) { ?>

            <!-- Contenu -->
            <div class="contenu">
                <!-- Titre / sous titre -->
                <div class="row">
                    <div class="col-md-6 offset-md-1 chapter text_sans-serif">Chapitre N° <?= htmlspecialchars($donnees['chapter_number']) ?></div>
                    <a href="chapter.php?chapitre=<?php echo $donnees['chapter_number']; ?>">
                        <div class="col-md-4 offset-md-1 titre"><?= htmlspecialchars($donnees['title']) ?></div>
                    </a>
                </div>

                <!-- photo  -->
                <div class="row photo">
                    <div class="col-md-7 offset-md-4"><img class="img-fluid" src="img/photo1.jpg" alt="Alaska"></div>
                </div>

            </div>

            <!-- Background -->
            <div class="row background">
                <div class="col-md-8 rectangle <?= htmlspecialchars($donnees['couleur']) ?>"></div>
            </div>

        <?php } ?>
    </div>
</body>