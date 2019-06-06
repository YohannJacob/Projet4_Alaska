<?php
class ChapterManager
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
    public function add(Chapter $chapter)
    {
        $req = $this->_db->prepare('INSERT INTO livre(chapter_number, title, text_chapter, couleur, image_chapter) VALUES(:chapter_number, :title, :text_chapter, :couleur, :image_chapter)');
        $req->execute(array(
            'chapter_number' => $chapter->chapter_number(),
            'title' => $chapter->title(),
            'text_chapter' => $chapter->text_chapter(),
            'couleur' => $chapter->couleur(),
            'image_chapter' => $chapter->image_chapter(),
        ));
    }
    public function get($id)
    {
        $req = $this->_db->prepare('SELECT * FROM livre WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        return new Chapter($data);
    }
}
