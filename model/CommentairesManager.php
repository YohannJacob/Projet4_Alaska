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
    /**
     * Function pour ajouter des commentaires
     * @param string $commentaire
     * @return array
     */

    public function add(Commentaires $commentaire)
    {
        $req = $this->_db->prepare('INSERT INTO commentaires(pseudo, comment, id_chapter) VALUES(:pseudo, :comment, :id_chapter)');
        $req->execute(array(
            'pseudo' => $commentaire->pseudo(),
            'comment' => $commentaire->comment(),
            'id_chapter' => $commentaire->idChapter(),
        ));
    }

    /**
     * description de la function
     *
     * @param string $id_chapter
     * @return array
     */
    public function getList($id_chapter)
    {
        $list = [];
        $req = $this->_db->prepare('SELECT * FROM commentaires WHERE id_chapter = ?');
        $req->execute(array($id_chapter));

        while ($commentaire = $req->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Commentaires($commentaire);
        }
        return $list;
    }

    /**
     * description de la function
     *
     * @param string $id_chapter
     * @return array
     */
    public function getAllComment()
    {
        $list = [];
        $req = $this->_db->prepare('SELECT * FROM commentaires WHERE report = 0');
        $req->execute();

        while ($commentaire = $req->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Commentaires($commentaire);
        }
        return $list;
    }

    /**
     * description de la function
     *
     * @param string $id_chapter
     * @return array
     */
    public function getAllCommentReported()
    {
        $list = [];
        $req = $this->_db->prepare('SELECT * FROM commentaires WHERE report = 1');
        $req->execute();

        while ($commentaire = $req->fetch(PDO::FETCH_ASSOC)) {
            $list[] = new Commentaires($commentaire);
        }
        return $list;
    }
    /**
     * Fonction pour faire un Update de la base commentaire - changer le report en 1 pour signaler un post
     *@param string $comment
     *@return array
     */
    public function update($comment)
    {
        $req = $this->_db->prepare('UPDATE commentaires SET report = 1 WHERE id = ?');
        $req->execute(array($comment));
    }

    /**
     * Fonction pour faire un Update de la base commentaire - changer le report en 1 pour signaler un post
     *@param string $comment
     *@return array
     */
    public function validate($comment)
    {
        $req = $this->_db->prepare('UPDATE commentaires SET report = 0 WHERE id = ?');
        $req->execute(array($comment));
    }


    public function delete($delete)
    {
        $req = $this->_db->prepare('DELETE FROM commentaires WHERE id = ?');
        $req->execute(array($delete));
    }
}
