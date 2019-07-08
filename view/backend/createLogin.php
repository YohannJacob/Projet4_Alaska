<?php $title = 'Création de votre espace administrateur'; ?>
<?php ob_start(); ?>

    <div class="container-fluid image_cover">
        <div class="row centered">
            <h1 class="col-10 offset-1 col-md-4 offset-md-1 hello">Bonjour.<br>Sur cette page vous pouvez créer votre compte.</h1>
            <div class="col-10 offset-1 col-md-6 offset-md-1 inscription">
                <form action="index.php?action=createLogin" method="POST" enctype="multipart/form-data">
                    <div class="col-md-12 form-group">
                        <h2>Veuillez choisir votre identifiant et mot de passe.</h2>

                        <p><label>Pseudo : </label></p>
                        <input type="text" id="pseudo" name="pseudo" />

                        <p><label>Mot de passe :</label></p>
                        <input type="password" id="pass" name="pass" required />

                        <p><label>Confirmation mot de passe :</label></p>
                        <input type="password" id="passVerif" name="passVerif" required />

                        <p><label>Email :</label></p>
                        <input type="text" id="mail" name="mail" />

                        <p><input type="submit" value="Valider" id="bt_post" class="btn btn-primary marg_top-60" /></p>

                        <?php echo $errorCreatePseudo; ?>
                        <?php echo $errorCreateMail; ?>
                        <?php echo $errorCreateMdp; ?>
                        <?php echo $errorCreateMailForm; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>