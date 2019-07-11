<?php $title = $chapter->title(); ?>
<?php ob_start(); ?>
<div class="container-fluid home">
    <!-- Menu -->
    <div class="row menunav">
        <div class="col-8 offset-1 col-sm-8 col-md-4 offset-md-1 back_home text_sans-serif"><a href="index.php">JEAN FORTEROCHE</a></div>
        <div class="col-md-4 offset-md-3"> <?php include("menu.php"); ?> </div>
    </div>

    <!-- Titre / sous titre -->
    <div class="row ">
        <h1 class="col-md-6 offset-md-1 titre">Billet simple pour l’Alaska</h1>
        <div class="col-md-4 offset-md-1 sous-titre">Un livre-blog publié par Jean Forteroche</div>

    </div>

    <!-- photo  -->
    <div class="row photo">
        <div class="col-12 col-md-6 offset-md-4"><img class="img-fluid" src="public/uploads/<?= $chapter->imageChapter() ?>" alt="Billet simple pour l’Alaska"></div>
    </div>
    <!-- Background -->

    <div class="row footer">
        <div class="col-md-8 rectangle bleu"></div>
        <div class="col-md-4"></div>
        <div class="col-md-8 last_chapter"><a href="index.php?action=chapter&chapitre=<?= $chapter->id(); ?>">Lire le dernier chapitre publié</a></div>

        <div class="col-md-4 all_chapter"><a href="index.php?action=allChapter">Tous les chapitres</a></div>
    </div>

</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>