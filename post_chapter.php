<?php
session_start();
// Appel vers la base de donnée
    try
    {
       $bdd = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    // Gérer les erreurs
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    // Aller chercher les données dans la table
    $reponse = $bdd->query('SELECT chapter_number, title, text_chapter FROM livre');

    // a ce stade on crée une conditions pour ne pas afficher le code si jamais la data pseudo et message_post n'existe pas. Ces donnnées n'existant que lorsque le formulaire est rempli 
    if (!empty($_POST)) {
        // si le post n'est pas vide on insert le contenu du formulaire dans la table
        $req = $bdd->prepare('INSERT INTO livre (chapter_number, title, text_chapter) VALUES(:chapter_number, :title, : text_chapter)');
        $req->execute(array(
            'chapter_number'=> $_POST['chapter_number'], 
            'title' => $_POST['title'],
            'text_chapter' => $_POST['text_chapter'],
            ));
        // et dans ce cas on affiche la raffraichit la page en l'ouvrant à nouveau ;
        header('Location: post_chapter.php');
    }   
?>


<!-- ici on commence le HTML -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

    <head>
        <title>Ecrire un chapitre</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>

    <h1>Poster un chapitre</h1>
    <div class="content">
        <form action="post_chapter.php" method="post">

            <p><label>N° de chapitre</label> : <input type="text" id="chapter_number" name="chapter_number"/></p>    
            <p><label>Titre du chapitre</label> : <input type="text" id="title" name="title"/></p>
            <p><label>Chapitre</label> : <textarea name="Veuillez écrire votre texte dans cette espace" id="text_chapter" cols="30" rows="30"></textarea></p>
            
            <p><input type="submit" value="Valider" id="bt_post"/></p>

        </form>
        <!-- cette parti inclu du html donc on ouvre à nouveau les balises PHP -->
        <!-- on va créer une boucle pour afficher les messages. Attention concaténation un peu spécifique à utiliser tout le temps : "?="" equivaut "?php echo" -->

        <ul class="post">
            <?php while ($donnees = $reponse->fetch()){ ?>
                <li>
                <p id="date"> <?= htmlspecialchars($donnees['title']) ?> </p>
                <div id="message">
                    <p id="pseudo"> <?= htmlspecialchars($donnees['chapter_number']) ?> </strong> : </p> 
                    <p id="post"> <?= htmlspecialchars($donnees['text_chapter']) ?> </p>
                </div>
                </li>
            <?php } ?>

        </ul>
    </div>
   </body>