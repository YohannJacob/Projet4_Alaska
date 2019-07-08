<?php
// Appel vers la base de donnée
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
// Gérer les erreurs
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$errorLogin = false;

session_start();
require 'model/User.php';
require 'model/UsersManager.php';

if (!empty($_SESSION)) {
    header('location: index.php?action=admin');
}


//  Récupération de l'utilisateur et de son pass hashé
if (!empty($_POST)) {
    $req = new UsersManager();
    $resultat = $req->getUser($_POST['pseudo']);

    // $req = $bdd->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo');
    // $req->execute(array(
    //     'pseudo' => $_POST['pseudo']
    // ));
    // $resultat = $req->fetch();



    if ($resultat == false) {
        $errorLogin = "<p style=\"color: red;\">L'identifiant ou le mot de passe ne sont pas valides !</p>";
    } else {
        $isPasswordCorrect = password_verify($_POST['pass'], $resultat->pass());
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat->id();
            $_SESSION['pseudo'] = $_POST['pseudo'];

            header('location: index.php?action=admin');
        } else {
            $errorLogin = "<p style=\"color: red;\">L'identifiant ou le mot de passe ne sont pas valides !</p>";
        }
    }
}

?>

<!-- ici on commence le HTML -->
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Billet simple pour l'Alaska</title>
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
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/menu.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container-fluid image_cover">
        <div class="row centered">
            <h1 class="col-10 offset-1 col-md-4 offset-md-1 hello">Bonjour. Merci de vous identifier.</h1>
            <div class="col-10 offset-1 col-md-6 offset-md-1 inscription">
                <form action="connexion.php" method="POST">

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
</body>