<?php
session_start();
// Appel vers la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
// Gérer les erreurs
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
// Aller chercher les données dans la table
$reponse = $db->query('SELECT * FROM livre ORDER BY chapter_number DESC');
$reponse2 = $db->query('SELECT * FROM commentaires ORDER BY report DESC');

if (!empty($_GET['DEL'])) {
    $reponse3 = $db->prepare('DELETE FROM livre WHERE id = ?');
    $reponse3->execute(array($_GET['DEL']));   
        header('Location: manager.php');
        exit();
    }
    ?>


    <!-- ici on commence le HTML -->
    <!DOCTYPE html>
    <html lang="fr">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manager de votre site</title>
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
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>
        <div class="container-fluid home">
            <div class="row">
                <div class="col-md-3 menu bleu">
                    <div class="row">
                        <div class="col-md-8 offset-md-2 marg_top-60 d-flex justify-content-center text_sans-serif back_home">
                            <a href="manager.php">JEAN FORTEROCHE</a>
                        </div>


                        <div class="col-md-8 offset-md-2 marg_top-60 d-flex justify-content-center bouton_manager">
                            <a href="post_chapter.php">
                                <button type="button" class="btn d-flex justify-content-center">
                                    AJOUTER UN CHAPITRE
                                    <i class="fas fa-plus-circle"></i>
                                </button>
                            </a>
                            <p><a href="deconnexion.php">Vous déconnecter</a></p>
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
                                    <div class="col-md-11 titre_module_chapitre">LES DERNIERS CHAPITRES POSTÉS</div>

                                    <!-- Modules chapitre -->
                                    <?php while ($data = $reponse->fetch()) { ?>

                                        <!-- Modal -->
                                        <div class="modal fade" id="delete_post" tabindex="-1" role="dialog" aria-labelledby="delete_postLabel" aria-hidden="true">
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
                                                        <a href="manager.php?DEL=<?= $data['id'] ?>">
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
                                                        <h5 class="col-md-12">Chapitre N° <?= htmlspecialchars($data['chapter_number']) ?> </h5>
                                                        <p class="col-md-12 titre_module"> <?= htmlspecialchars($data['title']) ?> </p>
                                                        <p class="col-md-12 date_publi">Publié le <?= htmlspecialchars($data['date_publi']) ?> </p>
                                                    </div>
                                                </div>

                                                <!-- Les boutons -->
                                                <div class="col-md-4 separation_gauche">
                                                    <div class="row">
                                                        <button type="button" class="col-md-12 btn btn-light bouton_modules modifier"> <a href="update-chapter.php?chapitre=<?php echo $data['id']; ?>">Modifier</a></button>

                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="col-md-12 btn btn-light bouton_modules supprimer" data-toggle="modal" data-target="#delete_post">Supprimer</button>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                            <!-- Colonne derniers Commentaires postés -->
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-11 titre_module_commentaires">LES DERNIERS COMMENTAIRES POSTÉS</div>

                                    <!-- Modules chapitre -->
                                    <?php while ($data2 = $reponse2->fetch()) { ?>
                                        <div class="col-md-11 marg_top-30">
                                            <div class="row contenu_module_comments">
                                                <!-- Contenu Num chapitre, titre et date de publication -->

                                                <div class="col-md-8 contenu_padding ">
                                                    <div class="row">

                                                        <p class="col-md-12 titre_module"> <?= htmlspecialchars($data2['comment']) ?></p>
                                                        <p class="col-md-12 date_publi">Publié le <?= htmlspecialchars($data2['date_comment']) ?> </p>
                                                        <p class="col-md-12 date_publi">Par <?= htmlspecialchars($data2['pseudo']) ?></p>

                                                    </div>
                                                </div>

                                                <!-- Les boutons -->
                                                <div class="col-md-4 separation_gauche">
                                                    <div class="row">
                                                        <p class="col-md-12 bouton_module modifier">Valider</p>
                                                        <p class="col-md-12 bouton_module supprimer">Modérer</p>
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
    </body>