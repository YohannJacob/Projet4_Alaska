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
        $req = $this->_db->prepare('INSERT INTO livre(chapterNumber, title, textChapter, couleur, imageChapter) VALUES(:chapterNumber, :title, :textChapter, :couleur, :imageChapter)');
        $req->execute(array(
            'chapterNumber' => $chapter->chapterNumber(),
            'title' => $chapter->title(),
            'textChapter' => $chapter->textChapter(),
            'couleur' => $chapter->couleur(),
            'imageChapter' => $chapter->imageChapter(),
        ));
    }

    public function getLastChapter()
    {
        $req = $this->_db->prepare('SELECT * FROM livre ORDER BY id DESC LIMIT 1');
        $req->execute();
        $data = $req->fetch();
        return new Chapter ($data);

    }

    public function get($id)
    {
        $req = $this->_db->prepare('SELECT * FROM livre WHERE id = ?');
        $req->execute(array($id));
        $data = $req->fetch();
        if ($data){
            return new Chapter($data);
        }
        else{
            return false;
        }
    }

        /**
     * description de la function
     *
     * @param string $id_chapter
     * @param string $order
     * @return array
     */
    public function getList()
    {
        $listChapter = [];
        $req = $this->_db->prepare('SELECT * FROM livre ORDER BY chapterNumber ASC ');
        $req->execute([]);

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
        $req = $this->_db->prepare('UPDATE livre SET chapterNumber = :chapterNumber, title = :title, textChapter = :textChapter, couleur = :couleur, imageChapter = :imageChapter WHERE id = :id');
        $req->execute(array(
            'chapterNumber' => $chapter->chapterNumber(),
            'title' => $chapter->title(),
            'textChapter' => $chapter->textChapter(),
            'couleur' => $chapter->couleur(),
            'imageChapter' => $chapter->imageChapter(),
            'id' => $chapter->id(),
        ));
    }
}


