<?php

function admin()
{
    // Aller chercher les données dans la table
    $ChapterManager = new ChapterManager();
    $listChapter = $ChapterManager->getList();

    $CommentairesManager = new CommentairesManager();
    $listComment = $CommentairesManager->getAllComment();

    $CommentairesManager = new CommentairesManager();
    $listCommentReported = $CommentairesManager->getAllCommentReported();

    if (!empty($_GET['DEL'])) {
        $ChapterManager = new ChapterManager();
        $delete = $ChapterManager->delete($_GET['DEL']);
        header('Location: index.php?action=admin');
        exit();
    }

    if (!empty($_GET['DEL_COMMENT'])) {
        $CommentairesManager = new CommentairesManager();
        $delete = $CommentairesManager->delete($_GET['DEL_COMMENT']);
        header('Location: index.php?action=admin');
        exit();
    }

    if (!empty($_GET['VALIDATE_COMMENT'])) {
        $CommentairesManager = new CommentairesManager();
        $validate = $CommentairesManager->validate($_GET['VALIDATE_COMMENT']);
        header('Location: index.php?action=admin');
        exit();
    }
    include('view/backend/admin.php');
}

function postChapter()
{

    if (!empty($_POST)) {
        $validation = true;

        if (empty($_POST['chapterNumber'])) {
            $erreurChapNumber = 'Merci de renseigner le numéro de chapitre';
            $validation = false;
        }
        if (!is_numeric($_POST['chapterNumber'])) {
            $erreurChapNumber = 'Le numero de chapitre n\'est pas un chiffre';
            $validation = false;
        }

        if (empty($_POST['title'])) {
            $erreurTitle = 'Le titre est vide';
            $validation = false;
        }
        if (empty($_POST['textChapter'])) {
            $erreurText = 'Le texte du chapitre est vide';
            $validation = false;
        }
        if (empty($_POST['couleur'])) {
            $erreurCouleur = 'Merci de choisir une couleur';
            $validation = false;
        }
        if (empty($_FILES['imageChapter']['name'])) {
            $erreurImage = 'Merci de choisir une image';
            $validation = false;
        }

        if (filesize($_FILES['imageChapter']['tmp_name']) > 2500000) {
            $erreurTailleImage = "Votre photo est trop grosse la taille limite est de 2 MO";
            $validation = false;
        }

        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['imageChapter']['name'], '.');
        if (!in_array($extension, $extensions)) {
            $erreurFormatImage = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
            $validation = false;
        }

        if ($validation == true) {
            $chapter = new Chapter([
                'chapterNumber' => $_POST['chapterNumber'],
                'title' => $_POST['title'],
                'textChapter' => $_POST['textChapter'],
                'couleur' => $_POST['couleur'],
                'imageChapter' => "chapitre" . $_POST['chapterNumber'] . "-" . $_FILES['imageChapter']['name'],
            ]);
            $ChapterManager = new ChapterManager();
            $ChapterManager->add($chapter);


            move_uploaded_file($_FILES['imageChapter']['tmp_name'], 'public/uploads/chapitre' . basename($_POST['chapterNumber'] . "-" . $_FILES['imageChapter']['name']));
            header('Location: index.php?action=admin');
            exit();
        }
    }
    include('view/backend/postChapter.php');
}

function updateChapter()
{

    if (!empty($_POST)) {
        $validation = true;

        if (empty($_POST['chapterNumber'])) {
            $erreurChapNumber = 'Merci de renseigner le numéro de chapitre';
            $validation = false;
        }
        if (!is_numeric($_POST['chapterNumber'])) {
            $erreurChapNumber = 'Le numero de chapitre n\'est pas un chiffre';
            $validation = false;
        }

        if (empty($_POST['title'])) {
            $erreurTitle = 'Le titre est vide';
            $validation = false;
        }
        if (empty($_POST['textChapter'])) {
            $erreurText = 'Le texte du chapitre est vide';
            $validation = false;
        }
        if (empty($_POST['couleur'])) {
            $erreurCouleur = 'Merci de choisir une couleur';
            $validation = false;
        }
        if (empty($_FILES['imageChapter']['name'])) {
            $erreurImage = 'Merci de choisir une image';
            $validation = false;
        }

        if (filesize($_FILES['imageChapter']['tmp_name']) > 2500000) {
            $erreurTailleImage = "Votre photo est trop grosse la taille limite est de 2 MO";
            $validation = false;
        }

        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['imageChapter']['name'], '.');
        if (!in_array($extension, $extensions)) {
            $erreurFormatImage = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
            $validation = false;
        }

        if ($validation == true) {
            $chapter = new Chapter([
                'chapterNumber' => $_POST['chapterNumber'],
                'title' => $_POST['title'],
                'textChapter' => $_POST['textChapter'],
                'couleur' => $_POST['couleur'],
                'id' => $_GET['chapitre'],
                'imageChapter' => "chapitre" . $_POST['chapterNumber'] . "-" . $_FILES['imageChapter']['name'],
            ]);
            $ChapterManager = new ChapterManager();
            $ChapterManager->update($chapter);

            move_uploaded_file($_FILES['imageChapter']['tmp_name'], 'public/uploads/chapitre' . basename($_POST['chapterNumber'] . "-" . $_FILES['imageChapter']['name']));
            header('Location: index.php?action=admin');
            exit();
        }
    }

    // récupération du post publié pour l'afficher dans le formulaire en vue de le modifier.
    $ChapterManager = new ChapterManager();
    $post_data = $ChapterManager->get($_GET['chapitre']);
    include('view/backend/updateChapter.php');
}

function createLogin()
{

    if (!empty($_SESSION)) {
        header('Location: index.php?action=admin');
    }

    // Déclaration des variables vide pour le fonctionnement de la page
    $errorCreatePseudo = false;
    $errorCreateMail = false;
    $errorCreateMdp = false;
    $errorCreateMailForm = false;
    $confirmInscription = false;
    $errorLogin = false;
    $errorPassword = false;

    // Vérification de la validité des informations

    if (isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['pass']) && isset($_POST['passVerif'])) {
        $req = new UsersManager();
        $verifPseudo = $req->getPseudo($_POST['pseudo']);
        $verifMail = $req->getMail($_POST['mail']);

        include 'view/backend/erreur.php';

        if (($verifMail == false) && ($verifPseudo == false) && ($_POST['pass'] == $_POST['passVerif'])) {

            $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

            $user = new User([
                'pseudo' => $_POST['pseudo'],
                'pass' => $pass_hache,
                'mail' => $_POST['mail'],
            ]);
            $newUser = new UsersManager();
            $newUser->addUser($user);


            $_SESSION['pseudo'] = $_POST['pseudo'];
            header('location: index.php?action=admin');
            exit();
        }
    }
    include('view/backend/createLogin.php');
}

function login()
{
    if (!empty($_SESSION)) {
        header('location: index.php?action=admin');
    }


    //  Récupération de l'utilisateur et de son pass hashé
    if (!empty($_POST)) {
        $req = new UsersManager();
        $resultat = $req->getUser($_POST['pseudo']);


        if ($resultat == false) {
            $errorLogin = "<p style=\"color: red;\">L'identifiant ou le mot de passe ne sont pas valides !</p>";
        } else {
            $isPasswordCorrect = password_verify($_POST['pass'], $resultat->pass());
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $resultat->id();
                $_SESSION['pseudo'] = $_POST['pseudo'];

                header('location: index.php?action=admin');
            } else {
                $errorLogin = "<p style=\"color: red;\">L'identifiant ou le mot de passe ne sont pas valides !</p>";
            }
        }
    }
    include('view/backend/login.php');
}

function logOut()
{
    $_SESSION = array();
    session_destroy();
    include('view/backend/logOut.php');
}
