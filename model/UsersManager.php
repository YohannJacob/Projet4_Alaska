<?php
class UsersManager
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
    public function addUser(User $user)
    {
        $req = $this->_db->prepare('INSERT INTO users(pseudo, mail, pass) VALUES(:pseudo, :mail, :pass)');
        $req->execute(array(
            'pseudo' => $user->pseudo(),
            'mail' => $user->mail(),
            'pass' => $user->pass(),
        ));
    }

    public function getPseudo($pseudo)
    {
        $req = $this->_db->prepare('SELECT * FROM users');
        $req->execute(array());
        $data = $req->fetch();
        if ($data) {
            return new User($data);
        } else {
            return 'error';
        }
    }

    public function getMail($mail)
    {
        $req = $this->_db->prepare('SELECT mail FROM users WHERE mail = ?');
        $req->execute(array($mail));

        $data = $req->fetch();
        if (isset($data)) {
            return new User($data);
        } else {
            return 'error';
        }
    }

    public function getUser(User $user)
    {
        $req = $this->_db->prepare('SELECT id, pass FROM users WHERE pseudo = :pseudo');
        $req->execute(array(
            'pseudo' => $user->pseudo(),
        ));
    }
}
