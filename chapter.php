<?php
session_start();
// Appel vers la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root');
}
// Gérer les erreurs
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Aller chercher les données dans la table
$req = $db->prepare('SELECT * FROM livre WHERE id = ?');
$req->execute(array($_GET['chapitre']));

if (!empty($_POST)) {
    $validation = true;

    if (empty($_POST['pseudo'])) {
        $erreurPseudo = 'le pseudo est vide';
        $validation = false;
    }
    if (empty($_POST['comment'])) {
        $erreurComment = 'le commentaire est vide';
        $validation = false;
    }
    if ($validation == true) {
        $req2 = $db->prepare('INSERT INTO Comments(pseudo, comment, id_article) VALUES(:pseudo, :comment, :id_article)');
        $req2->execute(array(
            'pseudo' => $_POST['pseudo'],
            'comment' => $_POST['comment'],
            'id_article' => $_GET['chapitre'],
        ));
        header('Location: chapter.php?chapitre=' . $_GET['chapitre']);
        exit();
    }
}
?>


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
    <?php while ($data = $req->fetch()) { ?>

        <!-- POURQUOI AUCUN DE MES LIENS NE FONCTIONNENT ??? -->
        <div class="container-fluid">
            <!-- Menu -->
            <div class="row menunav"> test chapter comment

                <div class="col-md-10 offset-md-1 back_home text_sans-serif"><a href="index.php">JEAN FORTEROCHE</a></div>
                <div class="col-md-1"><i class="fas fa-bars"></i></div>
            </div>

            <div class="contenu">
                <!-- Titre / sous titre -->
                <div class="row">
                    <h1 class="col-md-6 offset-md-1 titre"><?= htmlspecialchars($data['title']) ?> </h1>
                    <div class="col-md-4 offset-md-1 sous-titre">Un livre-blog publié par Jean Forteroche</div>
                </div>

                <!-- photo  -->
                <div class="row photo_chapter">
                    <div class="col-md-7 offset-md-4"><img class="img-fluid" src="uploads/<?= htmlspecialchars($data['image_chapter']) ?>" alt="Alaska"></div>
                </div>
            </div>

            <!-- Menu footer -->
            <div class="row background">
                <div class="col-md-8 rectangle <?= htmlspecialchars($data['couleur']) ?>"></div>
                <div class="col-md-4"></div>
                <div class="col-md-4 offset-md-8 all_chapter fixed"><a href="all_chapter.php">Liste des chapitres</a></div>
            </div>

            <!-- Contenu -->
            <div class="row">
                <div class="col-md-8 text">
                    <div class="col-md-3 offset-md-1 marg_top-60 text_sans-serif">CHAPITRE N° <?= htmlspecialchars($data['chapter_number']) ?> </div>
                    <div class="col-md-10 offset-md-1 marg_top-60 text_serif">
                        <?= $data['text_chapter'] ?>
                    </div>
                    <div class="col md-12">
                        <div class="row">
                            <div class="col-md-5 offset-md-1 marg_top-60 prev">Chapitre précédent</div>
                            <div class="col-md-4 offset-md-1 marg_top-60 next">Chapitre suivant</div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Commentaires -->
            <div class="row">
                <div class="col-md-8 text grey_line">
                    <div class="col-md-3 offset-md-1 marg_top-60 text_sans-serif">commentaires</div>
                    <div class="col md-12">
                        <div class="row">
                            <div class="col-md-11 offset-md-1 marg_top-60 pseudo">Pseudo</div>
                            <div class="col-md-11 offset-md-1 comments">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>
                            <div class="col-md-3 offset-md-8 alert_comment">Signaler</div>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 add_comment">
                    <div class="col-md-11 title_add_comment"> Ajouter votre commentaire</div>
                    <div class="col-md-11">
                        <form action="chapter.php?chapitre=<?php echo $data['id']; ?>" method="POST">
                            <div class="col-md-11 form-group">
                                <p><input type="text" id="pseudo" name="pseudo" placeholder="Pseudo" class="form-control commentaire_form" /></p>
                                <?php if (isset($erreurPseudo)) { ?>
                                    <p> <?= $erreurPseudo ?> </p>
                                <?php } ?>
                                <p><textarea name="comment" id="comment" placeholder="Votre commentaire..." class="form-control commentaire_form"></textarea></p>

                                <button class="btn btn-primary" type="submit" id="bt_post">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
</body>

</html>