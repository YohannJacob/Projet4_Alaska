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

// function upload($index, $destination, $maxsize, $extensions)
// {
//     //Test1: fichier correctement uploadé
//     if (!isset($_FILES[$index]) or $_FILES[$index]['error'] == 0);
//     echo ('erreur');
//     //Test2: taille limite
//     if ($maxsize !== FALSE and $_FILES[$index]['size'] > $maxsize) return FALSE;
//     //Test3: extension
//     $ext = substr(strrchr($_FILES[$index]['name'], '.'), 1);
//     if ($extensions !== FALSE and !in_array($ext, $extensions)) return FALSE;
//     //Déplacement
//     return move_uploaded_file($_FILES[$index]['tmp_name'], $destination);
// };

// $upload1 = upload('image_chapter','uploads/test',15360, array('png','gif','jpg','jpeg') );

// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['image_chapter']) AND $_FILES['image_chapter']['error'] == 0)
{
// Testons si le fichier n'est pas trop gros
if ($_FILES['image_chapter']['size'] <= 1000000)
{
    echo'trop gros';
// Testons si l'extension est autorisée
$infosfichier = pathinfo($_FILES['image_chapter']['name']);
$extension_upload = $infosfichier['extension'];
$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
if (in_array($extension_upload, $extensions_autorisees))
{
// On peut valider le fichier et le stocker définitivement
move_uploaded_file($_FILES['image_chapter']['tmp_name'], 'uploads/' . basename($_FILES['image_chapter']['name']));
echo "L'envoi a bien été effectué !";
}
}
}


if (!empty($_POST)) {

    $req = $db->prepare('INSERT INTO livre(chapter_number, title, text_chapter, couleur, image_chapter) VALUES(:chapter_number, :title, :text_chapter, :couleur, :image_chapter)');
    $req->execute(array(
        'chapter_number' => $_POST['chapter_number'],
        'title' => $_POST['title'],
        'text_chapter' => $_POST['text_chapter'],
        'couleur' => $_POST['couleur'],
        'image_chapter' => $_FILES['image_chapter']['name'],

    ));
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">

    <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=1rd4c31fs388eba9s75t6mispfypt4631kcx8z32nkwte487"></script>

    <script>
        tinymce.init({
            selector: '#text_chapter'
            // content_css : '/style.css'

        });
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container-fluid home">
        <div class="row menu">
            <div class="col-md-3 bleu">
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
                <h1 class="text_serif marg_top-60 titre_manager">Ajouter un chapitre</h1>
                <div class="content marg-top">

                    <form action="post_chapter.php" method="POST" enctype="multipart/form-data">
                        <div class="row marg_top-60">
                            <div class="col-md-9 form-group">
                                <input type="text" placeholder="Titre du chapitre" id="title" name="title" class="form-control manager_form" />
                            </div>

                            <div class="col-md-3 form-group">

                                <input type="text" placeholder="N° de chapitre" id="chapter_number" name="chapter_number" class="form-control manager_form" />
                            </div>
                        </div>

                        <div class="form-group">
                            <h4 class="marg_top-30">Contenu du chapitre :</h4>
                            <textarea name="text_chapter" id="text_chapter" cols="50" rows="15" class="form-control manager_form marg_top-30"></textarea>
                        </div>

                        <div class="form-group ">
                            <h4 class="marg_top-30">Couleur de fond :</h4>
                            <div class="row">
                                <div class="col-md-3 radio marg_top-15">
                                    <label for="jaune" class="radio radio_marg"><input type="radio" name="couleur" value="jaune" class="radio_marg" /> Jaune </label>
                                </div>

                                <div class="col-md-3 radio marg_top-15">
                                    <label for="Rouge" class="radio radio_marg"><input type="radio" name="couleur" value="rouge" class="radio_marg" /> Rouge </label>
                                </div>

                                <div class="col-md-3 radio marg_top-15">
                                    <label for="Vert" class="radio radio_marg"><input type="radio" name="couleur" value="vert" class="radio_marg" /> Vert </label>
                                </div>

                                <div class="col-md-3 radio marg_top-15">
                                    <label for="Bleu" class="radio radio_marg"><input type="radio" name="couleur" value="bleu" class="radio_marg" /> Bleu </label>
                                </div>

                            </div>
                        </div>

                        <div class="form-group ">
                            <h4 class="marg_top-30">Ajouter une photo :</h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="file" name="image_chapter" class="marg_top-15" />
                                </div>
                                <div class="col-md-2 offset-md-2">
                                    <button class="btn btn-primary" type="submit" id="bt_post">Envoyer</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>