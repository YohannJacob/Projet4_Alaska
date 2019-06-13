<?php
class Commentaires
{
    // Les atributs -----------------------------------  
    private $_id_comment,
        $_id_chapter,
        $_pseudo,
        $_comment,
        $_date_comment,
        $_report;

    // Les méthodes - ici pas de méthode --------------

    // Les constantes - Pas de constantes non plus ----

    // Hydrater ---------------------------------------
    public function hydrate(array $commentaire)
    {
        if (isset($commentaire['id_comment'])) {
            $this->setIdComment($commentaire['id_comment']);
        }
        if (isset($commentaire['id_chapter'])) {
            $this->setIdChapter($commentaire['id_chapter']);
        }
        if (isset($commentaire['pseudo'])) {
            $this->setPseudo($commentaire['pseudo']);
        }
        if (isset($commentaire['comment'])) {
            $this->setComment($commentaire['comment']);
        }
        if (isset($commentaire['date_comment'])) {
            $this->setDateComment($commentaire['date_comment']);
        }
        if (isset($commentaire['report'])) {
            $this->setReport($commentaire['report']);
        }
    }

    // Implémenter le constructeur -------------------
    public function __construct(array $commentaire)
    {
        $this->hydrate($commentaire);
    }

    // Les getters -----------------------------------
    public function idComment()
    {
        return $this->_id_comment;
    }

    public function idChapter()
    {
        return $this->_id_chapter;
    }

    public function pseudo()
    {
        return $this->_pseudo;
    }

    public function comment()
    {
        return $this->_comment;
    }

    public function dateComment()
    {
        return $this->_date_comment;
    }

    public function report()
    {
        return $this->_report;
    }

    // Les setters ------------------------------------
    public function setIdComment($id_comment)
    {
        $this->_id_comment = $id_comment;
    }

    public function setIdChapter($id_chapter)
    {
        $this->_id_chapter = $id_chapter;
    }

    public function setPseudo($pseudo)
    {
        // On vérifie que le titre est bien une chaine de caractère.
        if (is_string($pseudo))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_pseudo = htmlspecialchars($pseudo);
    }

    public function setComment($comment)
    {
        // On vérifie que le titre est bien une chaine de caractère.
        if (is_string($comment))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_comment = htmlspecialchars($comment);
    }

    public function setDateComment($date_comment)
    {
        $this->_date_comment = htmlspecialchars($date_comment);
    }

    public function setReport($report)
    {
        // On convertit l'argument en nombre entier.
        $report = (int)$report;
        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($report > 0) {
            // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
            $this->_report = htmlspecialchars($report);
        }
    }
}
