<?php
session_start();
// Appel vers la base de donnée
    try
    {
       $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    // Gérer les erreurs
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    // Aller chercher les données dans la table
    $reponse = $bdd->query('SELECT pseudo, message_post, DATE_FORMAT(date_mess, \'%d/%m/%Y à %H:%i\') AS date_mess FROM Minichat ORDER BY id DESC LIMIT 0, 10');
    // var_dump($_POST);
?>