<?php
class User
{
    // Les atributs -----------------------------------  
    private $_id,
        $_pseudo,
        $_mail,
        $_pass;
        

    // Hydrater ---------------------------------------
    public function hydrate(array $data)
    {
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }
        if (isset($data['pseudo'])) {
            $this->setPseudo($data['pseudo']);
        }
        if (isset($data['mail'])) {
            $this->setMail($data['mail']);
        }
        if (isset($data['pass'])) {
            $this->setPass($data['pass']);
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
    public function pseudo()
    {
        return $this->_pseudo;
    }
    public function mail()
    {
        return $this->_mail;
    }
    public function pass()
    {
        return $this->_pass;
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

    public function setPseudo($pseudo)
    {
        // On vérifie que le titre est bien une chaine de caractère.
        if (is_string($pseudo))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_pseudo = $pseudo;
    }

    public function setMail($mail)
    {
        // On vérifie que le titre est bien une chaine de caractère.
        if (is_string($mail))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_mail = $mail;
    }

    public function setPass($pass)
    {
        // On vérifie que le titre est bien une chaine de caractère.
        if (is_string($pass))
            // Si c'est le cas, on assigne la valeur à l'attribut correspondant.
            $this->_pass = $pass;
    }
}
