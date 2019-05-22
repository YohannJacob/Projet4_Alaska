<?php
// Appel vers la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
// Gérer les erreurs
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Aller chercher les données dans la table
$reponse = $db->query('SELECT id FROM livre ORDER BY id DESC LIMIT 1');
$data = $reponse->fetch();
$reponse = $db->query('SELECT image_chapter FROM livre WHERE chapter_number = 1');
$image = $reponse->fetch();
?>


<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billet simple pour l'Alaska</title>
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
    <link href="menu.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container-fluid home">

        <!-- Menu -->
        <div class="row menunav">
            <div class="col-8 offset-1 col-sm-8 col-md-4 offset-md-1 back_home text_sans-serif"><a href="index.php">JEAN FORTEROCHE</a></div>
            <div class="col-md-4 offset-md-3"><?php include("menu.php"); ?></div>
        </div>

        <!-- Titre / sous titre -->
        <div class="row">
            <h1 class="col-11 offset-1 col-md-6 offset-md-1 titre">Billet simple pour l’Alaska</h1>
            <div class="col-11 offset-1 col-md-4 offset-md-1 sous-titre">Un livre-blog publié par Jean Forteroche</div>
        </div>

        <!-- photo  -->
        <div class="row photo">
            <div class="col-11 offset-1 col-md-7 offset-md-4"><img class="img-fluid" src="uploads/<?= htmlspecialchars($image['image_chapter']) ?>" alt="Un billet pour l'alaska, le blog de l'écrivain Jean Forteroche"></div>
        </div>
        <!-- Background -->
        
        <div class="row footer">
            <div class="col-md-8 rectangle bleu"></div>
            <div class="col-md-4"></div>
            <div class="col-md-8 last_chapter"><a href="chapter.php?chapitre=<?php echo $data['id']; ?>">Lire le dernier chapitre publié</a></div>

            <div class="col-md-4 all_chapter"><a href="all_chapter.php">Tous les chapitres</a></div>
        </div>

    </div>

</body>