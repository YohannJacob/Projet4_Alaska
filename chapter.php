<?php
session_start();
require 'model/Commentaires.php';
require 'model/CommentairesManager.php';
require 'model/Chapter.php';
require 'model/ChapterManager.php';

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
        $commentaire = new Commentaires([
            'pseudo' => $_POST['pseudo'],
            'comment' => $_POST['comment'],
            'id_chapter' => $_GET['chapitre'],
        ]);

        $CommentairesManager = new CommentairesManager();
        $CommentairesManager->add($commentaire);
        header('Location: chapter.php?chapitre=' . $_GET['chapitre']);
        exit();
    }
}

$CommentairesManager = new CommentairesManager();
$listComment = $CommentairesManager->getList($_GET['chapitre']);


// Aller chercher les données dans la table
$chapterManager = new ChapterManager();
$chapter = $chapterManager->get($_GET['chapitre']);

//Signaler un commentaire en lui donnant un report = 1
if (isset($_GET['comment'])) {
    $commentaire = new Commentaires([
        'report' => 1,
    ]);

    $CommentairesManager = new CommentairesManager();
    $CommentairesManager->update($_GET['comment']);
    header('Location: chapter.php?chapitre=' . $_GET['chapitre']);
    exit();
}
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


    <div class="container-fluid">
        <!-- Menu -->
        <div class="row menunav">
            <div class="col-8 offset-1 col-sm-8 col-md-4 offset-md-1 back_home text_sans-serif"><a href="index.php">JEAN FORTEROCHE</a></div>
            <div class="col-md-4 offset-md-3"><?php include("menu.php"); ?></div>
        </div>

        <div class="contenu">
            <!-- Titre / sous titre -->
            <div class="row">
                <h1 class="col-12 offset-1 col-md-6 offset-md-1 titre"><?= $chapter->title() ?> </h1>
            </div>

            <!-- photo  -->
            <div class="row photo_chapter">
                <div class="col-12 col-md-7 offset-md-4"><img class="img-fluid" src="uploads/<?= $chapter->image_chapter() ?>" alt="<?= $chapter->title() ?>"></div>
            </div>
        </div>

        <!-- Menu footer -->
        <div class="row background">
            <div class="col-12 col-md-8 rectangle <?= $chapter->couleur() ?>"></div>
            <div class="col-12 col-md-4"></div>
            <div class="col-12 col-md-4 offset-md-8 all_chapter fixed"><a href="all_chapter.php">Liste des chapitres</a></div>
        </div>

        <!-- Contenu -->
        <div class="row">
            <div class="col-12 col-md-8 text">
                <div class="col-md-3 offset-md-1 marg_top-60 text_sans-serif">CHAPITRE N° <?= $chapter->chapter_number() ?> </div>
                <div class="col-md-10 offset-md-1 marg_top-60 text_serif">
                    <?= $chapter->text_chapter() ?>
                </div>
            </div>
        </div>

        <!-- Commentaires -->
        <div class="row">
            <div class="col-md-8 text grey_line">
                <div class="col-md-3 offset-md-1 marg_top-60 text_sans-serif">commentaires</div>
                <div class="col md-12">
                    <div class="row">
                        <?php foreach ($listComment as $comment) { ?>
                            <div class="col-md-11 offset-md-1 marg_top-30 pseudo"><?= $comment->id() ?></div>
                            <div class="col-md-11 offset-md-1 comments"><?= $comment->comment() ?></div>
                            <div class="col-md-3 offset-md-8 alert_comment">
                                <form action="chapter.php?chapitre=<?= $_GET['chapitre'] ?>&comment=<?= $comment->id() ?>" method="POST">
                                    <button class="btn btn-primary" type="submit" id="signaler" name="signaler">signaler</button>
                                </form>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 add_comment">
                <div class="col-md-11 title_add_comment"> Ajouter votre commentaire</div>
                <div class="col-md-11">
                    <form action="chapter.php?chapitre=<?php echo $chapter->id(); ?>" method="POST">
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

</body>

</html>