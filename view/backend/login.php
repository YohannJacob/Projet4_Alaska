<?php $title = 'Connectez-vous à votre admin'; ?>
<?php ob_start(); ?>

<div class="container-fluid image_cover">
    <div class="row centered">
        <h1 class="col-10 offset-1 col-md-4 offset-md-1 hello">Bonjour. Merci de vous identifier.</h1>
        <div class="col-10 offset-1 col-md-6 offset-md-1 inscription">
            <form action="index.php?action=login" method="POST">

                <p><label>Pseudo :</label></p>
                <input type="text" id="pseudo" name="pseudo" />

                <p><label>Mot de passe :</label></p>
                <input type="password" id="pass" name="pass" />

                <input type="submit" value="Valider" id="bt_post" class="btn btn-primary marg_top-60" />

                <?php echo $errorLogin; ?>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>