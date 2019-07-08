<?php $title = 'Ajouter un chapitre'; ?>
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

        <div class="col-10 offset-1 col-md-7 offset-md-1">
            <h1 class="text_serif marg_top-60 titre_manager">Ajouter un chapitre</h1>
            <div class="content marg-top">
                <div class="row marg_top-15">
                    <div class="col-md-9">

                        <?php if (isset($erreurTitle)) { ?>
                            <p class="problem"> • <?= $erreurTitle ?> </p>
                        <?php } ?>
                        <?php if (isset($erreurChapNumber)) { ?>
                            <p class="problem"> • <?= $erreurChapNumber ?> </p>
                        <?php } ?>
                        <?php if (isset($erreurText)) { ?>
                            <p class="problem"> • <?= $erreurText ?> </p>
                        <?php } ?>
                        <?php if (isset($erreurCouleur)) { ?>
                            <p class="problem"> • <?= $erreurCouleur ?> </p>
                        <?php } ?>
                        <?php if (isset($erreurImage)) { ?>
                            <p class="problem"> • <?= $erreurImage ?> </p>
                        <?php } ?>
                        <?php if (isset($erreurTailleImage)) { ?>
                            <p class="problem"> • <?= $erreurTailleImage ?> </p>
                        <?php } ?>
                        <?php if (isset($erreurFormatImage)) { ?>
                            <p class="problem"> • <?= $erreurFormatImage ?> </p>
                        <?php } ?>
                    </div>
                </div>
                <form action="index.php?action=postChapter" method="POST" enctype="multipart/form-data">
                    <div class="row marg_top-60">
                        <div class="col-md-9 form-group">
                            <input type="text" placeholder="Titre du chapitre" id="title" name="title" class="form-control manager_form" value="<?php if (isset($_POST['title'])) {
                                                                                                                                                    echo $_POST['title'];
                                                                                                                                                } ?>" />
                        </div>

                        <div class="col-md-3 form-group">
                            <input type="text" placeholder="N° de chapitre" id="chapterNumber" name="chapterNumber" class="form-control manager_form" value="<?php if (isset($_POST['chapterNumber'])) {
                                                                                                                                                                    echo $_POST['chapterNumber'];
                                                                                                                                                                } ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 class="marg_top-30">Contenu du chapitre :</h4>
                        <textarea name="textChapter" id="textChapter" cols="50" rows="15" class="form-control manager_form marg_top-30"> <?php if (isset($_POST['textChapter'])) {
                                                                                                                                                echo $_POST['textChapter'];
                                                                                                                                            } ?> </textarea>
                    </div>

                    <div class="form-group ">
                        <h4 class="marg_top-30">Couleur de fond :</h4>
                        <div class="row">
                            <div class="col-md-3 radio marg_top-15">
                                <label for="jaune" class="radio radio_marg"><input type="radio" name="couleur" value="jaune" class="radio_marg" <?php if (isset($_POST['couleur'])) {
                                                                                                                                                    if ($_POST['couleur'] == "jaune") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }
                                                                                                                                                } ?> /> Jaune </label>
                            </div>

                            <div class="col-md-3 radio marg_top-15">
                                <label for="Rouge" class="radio radio_marg"><input type="radio" name="couleur" value="rouge" class="radio_marg" <?php if (isset($_POST['couleur'])) {
                                                                                                                                                    if ($_POST['couleur'] == "rouge") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }
                                                                                                                                                } ?> /> Rouge </label>
                            </div>

                            <div class="col-md-3 radio marg_top-15">
                                <label for="Vert" class="radio radio_marg"><input type="radio" name="couleur" value="vert" class="radio_marg" <?php if (isset($_POST['couleur'])) {
                                                                                                                                                    if ($_POST['couleur'] == "vert") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }
                                                                                                                                                } ?> /> Vert </label>
                            </div>

                            <div class="col-md-3 radio marg_top-15">
                                <label for="Bleu" class="radio radio_marg"><input type="radio" name="couleur" value="bleu" class="radio_marg" <?php if (isset($_POST['couleur'])) {
                                                                                                                                                    if ($_POST['couleur'] == "bleu  ") {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    }
                                                                                                                                                } ?> /> Bleu </label>
                            </div>
                            <div class="col-md-12 marg_top-15">

                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <h4 class="marg_top-30">Ajouter une photo :</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <input type="file" name="imageChapter" class="marg_top-15" />
                            </div>

                            <div class="col-md-2 offset-md-2">
                                <button class="btn btn-primary" type="submit" id="bt_post">Envoyer</button>
                            </div>
                            <div class="col-md-12 marg_top-15">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script type="text/javascript">
    $(".menu").click(function() {
        $(this).toggleClass("clicked");
    });
</script>