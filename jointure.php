<?php
session_start();
// Appel vers la base de donnée
try {
    $db = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root');
}
// Gérer les erreurs
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$reponse = $db->query('SELECT * FROM commentaires, livre');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php while ($data = $reponse->fetch()) { ?>
        <p> id de la base livre = <?php echo $data['id']; ?> </p>

        <p> peudo = <?php echo $data['pseudo']; ?> </p>
        <p> Commentaire = <?php echo $data['comment']; ?> </p>
        <p> titre du livre = <?php echo $data['title']; ?> </p>
        <p> date du commentaire = <?php echo $data['date_comment']; ?> </p>
        <p> id du chapitre = <?php echo $data['id_chapter']; ?> </p>
    <?php } ?>
</body>

</html>