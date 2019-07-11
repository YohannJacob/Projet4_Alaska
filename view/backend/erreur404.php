<?php $title = 'Création de votre espace administrateur'; ?>
<?php ob_start(); ?>

<div class="container-fluid image_cover">
    <div class="row centered">
        <h1 class="col-10 offset-1 col-md-4 offset-md-1 hello">Erreur 404. Cette page n'existe pas.</h1>
        <div class="col-10 offset-1 col-md-6 offset-md-1 inscription">
            <div class="col-md-12 form-group">
                <nav>
                    <ul class="back">
                        <li><a href="index.php"><i class="fas fa-igloo"></i>Retourner sur la Home</a></li>
                        <li><a href="index.php?action=login">Connectez-vous à votre manager</a></li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>