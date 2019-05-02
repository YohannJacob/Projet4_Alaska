<?php
session_start();
// Appel vers la base de donnée
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
// Gérer les erreurs
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (!empty($_POST)) {
    $req = $bdd->prepare('INSERT INTO livre(chapter_number, title, text_chapter, couleur) VALUES(:chapter_number, :title, :text_chapter, :couleur)');
    $req->execute(array(
        'chapter_number' => $_POST['chapter_number'],
        'title' => $_POST['title'],
        'text_chapter' => $_POST['text_chapter'],
        'couleur' => $_POST['couleur'],
    ));
}

?>



<!-- ici on commence le HTML -->
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container-fluid home">
        <div class="row">
            <div class="col-md-3 rectangle bleu back_home text_sans-serif ">
                <div class="col- md-2 offset-md-1 marg-top">
                    <a href="index.php">JEAN FORTEROCHE</a>
                </div>
            </div>

            <div class="col-md-9">
                <h1 class="text_serif marg-top">Ajouter un chapitre</h1>
                <div class="content">
                    <form action="post_chapter.php" method="POST">

                        <p><label>Numéro de chapitre</label> : <input type="text" id="chapter_number" name="chapter_number" /></p>
                        <p><label>Titre du chapitre</label> : <input type="text" id="title" name="title" /></p>
                        <p><label>Chapitre</label> : <textarea name="text_chapter" id="text_chapter" cols="100" rows="20"></textarea></p>
                        <label>Couleur de fond :</label>
                        <p><input type="checkbox" name="couleur" value="jaune" />Jaune / <input type="checkbox" name="couleur" value="rouge" />Rouge /
                            <input type="checkbox" name="couleur" value="vert" />Vert /
                            <input type="checkbox" name="couleur" value="bleu" />Bleu /
                            <input type="submit" value="Valider" id="bt_post" /></p>

                    </form>

                </div>
            </div>
        </div>



    </div>
</body>