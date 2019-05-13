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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">


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
                    <div class="col-md-10 offset-md-2 marg_top-60 text_sans-serif">
                        <a href="index.php">JEAN FORTEROCHE</a>
                    </div>
                    <div class="col-md-8 offset-md-2 marg_top-60">
                        <a href="#">AJOUTER UN CHAPITRE</a>
                    </div>
                    <div class="col-md-8 offset-md-2 marg_top-60">
                        <a href="#">PERSONALISER LE BLOG</a>
                        <i class="fas fa-pencil-alt"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-7 offset-md-1">
                <h1 class="text_serif marg_top-60 titre_manager">Bienvenue sur votre espace de gestion.</h1>
                <p class="marg_top-15">Ici vous pourrez administrer les contenus de votre blog.</p>

                <div class="content marg-top">
                    <div class="row marg_top-15">
                        <!-- Colonne derniers Chapitres postés -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-11 titre_module_chapitre">LES DERNIERS CHAPITRES POSTÉS</div>

                                <!-- Modules chapitre -->
                                <div class="col-md-11 marg_top-30">
                                    <div class="row contenu_module_chapitre">
                                        <!-- Contenu Num chapitre, titre et date de publication -->
                                        <div class="col-md-8 contenu_padding ">
                                        <div class="row">
                                                <h5 class="col-md-12">Chapitre N°</h5>
                                                <p class="col-md-12 titre_module">Titre, titre, titre, titre, titre, titre, titre, titre, titre</p>
                                                <p class="col-md-12 date_publi">Date publication</p>
                                            </div>
                                        </div>

                                        <!-- Les boutons -->
                                        <div class="col-md-4 separation_gauche">
                                            <div class="row">
                                                <p class="col-md-12 bouton_module modifier">Modifier</p>
                                                <p class="col-md-12 bouton_module supprimer">Supprimer</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <!-- Colonne derniers Commentaires postés -->
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-11 titre_module_commentaires">LES DERNIERS COMMENTAIRES POSTÉS</div>

                                <!-- Modules chapitre -->
                                <div class="col-md-12 marg_top-30">UN MODULE</div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
</body>