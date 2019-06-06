<?php
class Chapter
{
    // Les atributs -----------------------------------  
    private $_id,
        $_chapter_number,
        $_title,
        $_text_chapter,
        $_date_publi,
        $_couleur,
        $_image_chapter;

    // Les méthodes - ici pas de méthode --------------

    // Les constantes - Pas de constantes non plus ----

    // Hydrater ---------------------------------------
    public function hydrate(array $data)
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['chapter_number'])) {
            $this->setChapterNumber($data['chapter_number']);
        }
        if (isset($data['title'])) {
            $this->setTitle($data['title']);
        }
        if (isset($data['text_chapter'])) {
            $this->setTextChapter($data['text_chapter']);
        }
        if (isset($data['date_publi'])) {
            $this->setDatePubli($data['date_publi']);
        }
        if (isset($data['couleur'])) {
            $this->setCouleur($data['couleur']);
        }
        if (isset($data['image_chapter'])) {
            $this->setImageChapter($data['image_chapter']);
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
    public function chapter_number()
    {
        return $this->_chapter_number;
    }
    public function title()
    {
        return $this->_title;
    }
    public function text_chapter()
    {
        return $this->_text_chapter;
    }
    public function date_publi()
    {
        return $this->_date_publi;
    }
    public function couleur()
    {
        return $this->_couleur;
    }
    public function image_chapter()
    {
        return $this->_image_chapter;
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

    public function setChapterNumber($chapter_number)
    {
        $chapter_number = (int)$chapter_number;
        if ($chapter_number > 0) {
            $this->_chapter_number = htmlspecialchars($chapter_number);
        }
    }

    public function setTitle($title)
    {
        // On vérifie que le titre est bien une chaine de caractère.
        if (is_string($title))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_title = $title;
    }

    public function setTextChapter($text_chapter)
    {
        // On vérifie que le text du chapitre est bien une chaine de caractère.
        if (is_string($text_chapter))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_text_chapter = htmlspecialchars($text_chapter);
    }

    public function setDatePubli($date_publi)
    {
        $this->_date_publi = htmlspecialchars($date_publi);
    }

    public function setCouleur($couleur)
    {
        // On vérifie que la couleur est bien une chaine de caractère.
        if (is_string($couleur))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_couleur = htmlspecialchars($couleur);
    }

    public function setImageChapter($image_chapter)
    {
        $this->_image_chapter = htmlspecialchars($image_chapter);
    }
}
