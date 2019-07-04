<?php $title = 'Voyage en alaska : tous les chapitres'; ?>
<?php ob_start(); ?>


<div class="container-fluid">
    <!-- Menu -->
    <div class="row menunav">
        <div class="col-md-4 offset-md-1 back_home text_sans-serif"><a href="index.php">JEAN FORTEROCHE</a></div>
        <div class="col-md-4 offset-md-3"><?php include("menu.php"); ?></div>
    </div>
    <?php foreach ($listChapter as $chapter) {  ?>
        <!-- Contenu -->
        <div class="contenu">
            <!-- Titre / sous titre -->
            <a href="index.php?action=chapter&chapitre=<?= $chapter->id() ?>">
                <div class="row">
                    <div class="col-md-6 offset-md-1 chapter text_sans-serif">Chapitre N° <?= $chapter->chapter_number() ?></div>
                    <h1 class="col-md-6 offset-md-1 titre"><?= $chapter->title() ?></h1>
                    <aside class="col-md-6 offset-md-1 bt_lire"><i class="fas fa-book-reader"></i> Lire le chapitre </aside>
                </div>
            </a>
            <!-- photo  -->
            <div class="row photo_chapter">
                <div class="col-12 col-md-7 offset-md-4"><img class="img-fluid" src="public/uploads/<?= $chapter->image_chapter() ?>" alt="<?= $chapter->title() ?>"></div>
            </div>
        </div>

        <!-- Background -->
        <div class="row background">
            <div class="col-12 col-md-8 rectangle <?= $chapter->couleur() ?>"></div>
        </div>
    <?php } ?>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>