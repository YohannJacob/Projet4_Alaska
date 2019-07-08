<?php $title = 'Manager de votre blog'; ?>
<?php ob_start(); ?>

<div class="container-fluid home">
    <div class="row">
        <div class="col-md-3 menu bleu">
            <div class="row">
                <div class="col-md-9 offset-md-2 marg_top-60 d-flex justify-content-center text_sans-serif back_home">
                    <a href="index.php?action=admin">JEAN FORTEROCHE</a>
                </div>

                <div class="col-8 offset-2 col-md-9 offset-md-2 marg_top-60 bouton_manager ">
                    <div class="row ">
                        <div class="col-md-12  ">
                            <a href="index.php?action=postChapter" class="nounderline">
                                <button type="button" class="btn btn-block">
                                    PUBLIER
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </a>
                        </div>

                        <div class="col-md-12 marg_top-30">
                            <a href="index.php" class="nounderline">
                                <button type="button" class="btn btn-block ">
                                    visiter
                                </button>
                            </a>
                        </div>

                        <div class="col-md-12 marg_top-30">
                            <a href="index.php?action=logOut" class="nounderline">
                                <button type="button" class="btn btn-block ">
                                    Log out
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-7 offset-md-1">
            <h1 class="text_serif marg_top-60 titre_manager"><?php echo $_SESSION['pseudo'] . ', bienvenue sur votre espace de gestion.' ?> </h1>
            <p class="marg_top-15">Ici vous pourrez administrer les contenus de votre blog.</p>

            <div class="content">
                <div class="row marg_top-30">
                    <!-- Colonne derniers Chapitres postés -->
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-11 titre_module_top jaune">LES DERNIERS CHAPITRES POSTÉS</div>

                            <!-- Modules chapitre -->
                            <?php foreach ($listChapter as $chapter) {  ?>

                                <!-- Modal -->
                                <div class="modal fade" id="delete_post<?= $chapter->id() ?>" tabindex="-1" role="dialog" aria-labelledby="delete_postLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete_postLabel">Suppression d'un chapitre</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous certain de vouloir supprimer ce chapitre ?<br>Merci de confirmer votre choix.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                                                <a href="index.php?action=admin&DEL=<?= $chapter->id() ?>">
                                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-11 marg_top-30">
                                    <div class="row contenu_module_chapitre">
                                        <!-- Contenu Num chapitre, titre et date de publication -->
                                        <div class="col-md-8 contenu_padding ">
                                            <div class="row ">
                                                <h5 class="col-md-12">Chapitre N° <?= $chapter->chapterNumber() ?> </h5>
                                                <p class="col-md-12 titre_module"> <?= $chapter->title() ?> </p>
                                                <p class="col-md-12 datePubli">Publié le <?= $chapter->datePubli() ?> </p>
                                            </div>
                                        </div>

                                        <!-- Les boutons -->
                                        <div class="col-md-4 separation_gauche">
                                            <div class="row">
                                                <button type="button" class="col-md-12 btn btn-light bouton_modules_chapitre modifier"> <a href="index.php?action=updateChapter&chapitre=<?php echo $chapter->id() ?>">Modifier</a></button>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="col-md-12 btn btn-light bouton_modules_chapitre supprimer" data-toggle="modal" data-target="#delete_post<?= $chapter->id() ?>">Supprimer</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>



                    <div class="col-md-6">

                        <!-- Colonne commentaires à valider -->
                        <div class="row">
                            <div class="col-md-11 titre_module_top rouge">Commentaires à valider</div>

                            <!-- Module comment à valider -->
                            <?php foreach ($listCommentReported as $commentReported) { ?>

                                <!-- Modal comments pour validation -->
                                <div class="modal fade" id="validate_comment<?= $commentReported->id() ?>" tabindex="-1" role="dialog" aria-labelledby="validate_postLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="validate_postLabel">Validation d'un commentaire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Vous êtes sur le point de valider ce commentaire, êtes vous certain de votre choix ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                                                <a href="index.php?action=admin&VALIDATE_COMMENT=<?= $commentReported->id() ?>">
                                                    <button type="button" class="btn btn-danger">Valider</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal comments pour suppression-->
                                <div class="modal fade" id="delete_comment<?= $commentReported->id() ?>" tabindex="-1" role="dialog" aria-labelledby="delete_postLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete_postLabel">Suppression d'un commentaire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous certain de vouloir supprimer ce commentaire ?<br>Merci de confirmer votre choix.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                                                <a href="index.php?action=admin&DEL_COMMENT=<?= $commentReported->id() ?>">
                                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-11 marg_top-30">
                                    <div class="row contenu_module_comments">
                                        <!-- Contenu Num chapitre, titre et date de publication -->

                                        <div class="col-md-8 contenu_padding ">
                                            <div class="row">

                                                <p class="col-md-12 titre_module"> <?= $commentReported->comment() ?></p>
                                                <p class="col-md-12 datePubli">Publié le <?= $commentReported->dateComment() ?> </p>
                                                <p class="col-md-12 datePubli">Par <?= $commentReported->pseudo() ?></p>

                                            </div>
                                        </div>

                                        <!-- Les boutons -->
                                        <div class="col-md-4 separation_gauche">
                                            <div class="row">
                                                <button type="button" class="col-md-12 btn btn-light bouton_modules_comment modifier" data-toggle="modal" data-target="#validate_comment<?= $commentReported->id() ?>">Valider</button>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="col-md-12 btn btn-light bouton_modules_comment supprimer" data-toggle="modal" data-target="#delete_comment<?= $commentReported->id() ?>">Supprimer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <!-- Colonne tous les derniers commmentaires postés -->
                        <div class="row">
                            <div class="col-md-11 titre_module_top grey marg_top-30">LES DERNIERS COMMENTAIRES POSTÉS</div>

                            <!-- Module tous les comments -->
                            <?php foreach ($listComment as $comment) { ?>

                                <!-- Modal comments pour validation -->
                                <div class="modal fade" id="validate_comment" tabindex="-1" role="dialog" aria-labelledby="validate_postLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="validate_postLabel">Validation d'un commentaire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Vous êtes sur le point de valider ce commentaire, êtes vous certain de votre choix ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                                                <a href="index.php?action=admin&VALIDATE_COMMENT=<?= $comment->id() ?>">
                                                    <button type="button" class="btn btn-danger">Valider</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal comments pour suppression-->
                                <div class="modal fade" id="delete_comment<?= $comment->id() ?>" tabindex="-1" role="dialog" aria-labelledby="delete_postLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="delete_postLabel">Suppression d'un commentaire</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes-vous certain de vouloir supprimer ce commentaire ?<br>Merci de confirmer votre choix.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-dismiss="modal">Annuler</button>
                                                <a href="index.php?action=admin&DEL_COMMENT=<?= $comment->id() ?>">
                                                    <button type="button" class="btn btn-danger">Supprimer</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-11 marg_top-30">
                                    <div class="row contenu_module_comments">
                                        <!-- Contenu Num chapitre, titre et date de publication -->

                                        <div class="col-md-8 contenu_padding ">
                                            <div class="row">

                                                <p class="col-md-12 titre_module"> <?= $comment->comment() ?></p>
                                                <p class="col-md-12 datePubli">Publié le <?= $comment->dateComment() ?> </p>
                                                <p class="col-md-12 datePubli">Par <?= $comment->pseudo() ?></p>

                                            </div>
                                        </div>

                                        <!-- Les boutons -->
                                        <div class="col-md-4 separation_gauche">
                                            <div class="row bouton_100h ">
                                                <button type="button" class="col-md-12 btn supprimer_comment" data-toggle="modal" data-target="#delete_comment<?= $comment->id() ?>">Supprimer</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>