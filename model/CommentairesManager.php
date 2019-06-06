<?php
class CommentairesManager
{
    // Les atributs ----------------------------------  
    private $_db;

    // Implémenter le constructeur -------------------
    public function __construct()
    {
        try {
            $this->_db = new PDO('mysql:host=localhost;dbname=Alaska;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        // Gérer les erreurs
        catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    // Les méthodes ----------------------------------
    public function add(Commentaires $commentaire)
    {
        $req = $this->_db->prepare('INSERT INTO commentaires(pseudo, comment, id_chapter) VALUES(:pseudo, :comment, :id_chapter)');
        $req->execute(array(
            'pseudo' => $commentaire->pseudo(),
            'comment' => $commentaire->comment(),
            'id_chapter' => $commentaire->idChapter(),
        ));
    }

}