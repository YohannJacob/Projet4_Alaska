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
    
    if (!empty($_POST)) {
        $req = $bdd->prepare('INSERT INTO livre(chapter_number, title, text_chapter) VALUES(:chapter_number, :title, :text_chapter)');
        $req->execute(array(
            'chapter_number'=> $_POST['chapter_number'], 
            'title' => $_POST['title'],
            'text_chapter' => $_POST['text_chapter'],
            
            ));
    }   

?>



<!-- ici on commence le HTML -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >

    <head>
        <title>Ecrire un chapitre</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- <link rel="stylesheet" href="style.css" /> -->
    </head>

    <body>

    <h1>Poster un chapitre</h1>
    <div class="content">
        <form action="post_chapter.php" method="POST">

            <p><label>chapter_number</label> : <input type="text" id="chapter_number" name="chapter_number"/></p>    
            <p><label>Titre du chapitre</label> : <input type="text" id="title" name="title"/></p>
            <p><label>Chapitre</label> : <textarea name="text_chapter" id="text_chapter" cols="30" rows="30"></textarea></p>
            
            <p><input type="submit" value="Valider" id="bt_post"/></p>

        </form>
    
    </div>
   </body>