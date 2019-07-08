<?php $title = $chapter->title(); ?>
<?php ob_start(); ?>

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
            <div class="col-12 col-md-7 offset-md-4"><img class="img-fluid" src="public/uploads/<?= $chapter->imageChapter() ?>" alt="<?= $chapter->title() ?>"></div>
        </div>
    </div>

    <!-- Menu footer -->
    <div class="row background">
        <div class="col-12 col-md-8 rectangle <?= $chapter->couleur() ?>"></div>
        <div class="col-12 col-md-4"></div>
        <div class="col-12 col-md-4 offset-md-8 all_chapter fixed"><a href="index.php?action=allChapter">Liste des chapitres</a></div>
    </div>

    <!-- Contenu -->
    <div class="row">
        <div class="col-12 col-md-8 text">
            <div class="col-md-3 offset-md-1 marg_top-60 text_sans-serif">CHAPITRE N° <?= $chapter->chapterNumber() ?> </div>
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
                        <div class="col-md-11 offset-md-1 marg_top-30 pseudo"><?= $comment->pseudo() ?></div>
                        <div class="col-md-11 offset-md-1 comments"><?= $comment->comment() ?></div>
                        <div class="col-md-3 offset-md-8 alert_comment">
                            <form action="index.php?action=chapter&chapitre=<?= $_GET['chapitre'] ?>&comment=<?= $comment->id() ?>" method="POST">
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
                <form action="index.php?action=chapter&chapitre=<?php echo $chapter->id(); ?>" method="POST">
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

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>