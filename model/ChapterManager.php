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

        /**
     * description de la function
     *
     * @param string $id_chapter
     * @param string $order
     * @return array
     */
    public function getList($order)
    {
        $listChapter = [];
        $req = $this->_db->prepare('SELECT * FROM livre ORDER BY ? ');
        $req->execute(array($order));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $listChapter[] = new Chapter($data);
        }

        return $listChapter;
    }

    public function delete($delete)
    {
        $req = $this->_db->prepare('DELETE FROM livre WHERE id = ?');
        $req->execute(array($delete));
    }
    
    public function update(Chapter $chapter)
    {
        $req = $this->_db->prepare('UPDATE livre SET chapter_number = :chapter_number, title = :title, text_chapter = :text_chapter, couleur = :couleur, image_chapter = :image_chapter WHERE id = :id');
        $req->execute(array(
            'chapter_number' => $chapter->chapter_number(),
            'title' => $chapter->title(),
            'text_chapter' => $chapter->text_chapter(),
            'couleur' => $chapter->couleur(),
            'image_chapter' => $chapter->image_chapter(),
            'id' => $chapter->id(),
        ));
    }
}


