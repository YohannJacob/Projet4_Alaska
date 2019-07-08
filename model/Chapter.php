<?php
class Chapter
{
    // Les atributs -----------------------------------  
    private $_id,
        $_chapterNumber,
        $_title,
        $_textChapter,
        $_datePubli,
        $_couleur,
        $_imageChapter;

    // Les méthodes - ici pas de méthode --------------

    // Les constantes - Pas de constantes non plus ----

    // Hydrater ---------------------------------------
    public function hydrate(array $data)
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['chapterNumber'])) {
            $this->setChapterNumber($data['chapterNumber']);
        }
        if (isset($data['title'])) {
            $this->setTitle($data['title']);
        }
        if (isset($data['textChapter'])) {
            $this->setTextChapter($data['textChapter']);
        }
        if (isset($data['datePubli'])) {
            $this->setDatePubli($data['datePubli']);
        }
        if (isset($data['couleur'])) {
            $this->setCouleur($data['couleur']);
        }
        if (isset($data['imageChapter'])) {
            $this->setImageChapter($data['imageChapter']);
        }
    }

    // Implémenter le constructeur --------------------
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    // Les getters ------------------------------------
    public function id()
    {
        return $this->_id;
    }
    public function chapterNumber()
    {
        return $this->_chapterNumber;
    }
    public function title()
    {
        return $this->_title;
    }
    public function textChapter()
    {
        return $this->_textChapter;
    }
    public function datePubli()
    {
        return $this->_datePubli;
    }
    public function couleur()
    {
        return $this->_couleur;
    }
    public function imageChapter()
    {
        return $this->_imageChapter;
    }

    // Les setters ------------------------------------
    public function setId($id)
    {
        // On convertit l'argument en nombre entier.
        $id = (int)$id;
        // On vérifie ensuite si ce nombre est bien strictement positif.
        if ($id > 0) {
            // Si c'est le cas, c'est tout bon, on assigne la valeur à l'attribut correspondant.
            $this->_id = htmlspecialchars($id);
        }
    }

    public function setChapterNumber($chapterNumber)
    {
        $chapterNumber = (int)$chapterNumber;
        if ($chapterNumber > 0) {
            $this->_chapterNumber = htmlspecialchars($chapterNumber);
        }
    }

    public function setTitle($title)
    {
        // On vérifie que le titre est bien une chaine de caractère.
        if (is_string($title))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_title = $title;
    }

    public function setTextChapter($textChapter)
    {
        // On vérifie que le text du chapitre est bien une chaine de caractère.
        if (is_string($textChapter))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_textChapter = $textChapter;
    }

    public function setDatePubli($datePubli)
    {
        $this->_datePubli = htmlspecialchars($datePubli);
    }

    public function setCouleur($couleur)
    {
        // On vérifie que la couleur est bien une chaine de caractère.
        if (is_string($couleur))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_couleur = htmlspecialchars($couleur);
    }

    public function setImageChapter($imageChapter)
    {
        $this->_imageChapter = htmlspecialchars($imageChapter);
    }
}
