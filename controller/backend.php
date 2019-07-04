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
    function verifdata2($data)
    {
        if (isset($data)) {
            echo $data;
        } else {
            echo '';
        }
    }

    if (!empty($_POST)) {
        $validation = true;

        if (empty($_POST['chapter_number'])) {
            $erreurChapNumber = 'Merci de renseigner le numéro de chapitre';
            $validation = false;
        }
        if (!is_numeric($_POST['chapter_number'])) {
            $erreurChapNumber = 'Le numero de chapitre n\'est pas un chiffre';
            $validation = false;
        }

        if (empty($_POST['title'])) {
            $erreurTitle = 'Le titre est vide';
            $validation = false;
        }
        if (empty($_POST['text_chapter'])) {
            $erreurText = 'Le texte du chapitre est vide';
            $validation = false;
        }
        if (empty($_POST['couleur'])) {
            $erreurCouleur = 'Merci de choisir une couleur';
            $validation = false;
        }
        if (empty($_FILES['image_chapter']['name'])) {
            $erreurImage = 'Merci de choisir une image';
            $validation = false;
        }

        if (filesize($_FILES['image_chapter']['tmp_name']) > 2500000) {
            $erreurTailleImage = "Votre photo est trop grosse la taille limite est de 2 MO";
            $validation = false;
        }

        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['image_chapter']['name'], '.');
        if (!in_array($extension, $extensions)) {
            $erreurFormatImage = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
            $validation = false;
        }

        if ($validation == true) {
            $chapter = new Chapter([
                'chapter_number' => $_POST['chapter_number'],
                'title' => $_POST['title'],
                'text_chapter' => $_POST['text_chapter'],
                'couleur' => $_POST['couleur'],
                'image_chapter' => "chapitre" . $_POST['chapter_number'] . "-" . $_FILES['image_chapter']['name'],
            ]);
            $ChapterManager = new ChapterManager();
            $ChapterManager->add($chapter);


            move_uploaded_file($_FILES['image_chapter']['tmp_name'], 'public/uploads/chapitre' . basename($_POST['chapter_number'] . "-" . $_FILES['image_chapter']['name']));
            header('Location: index.php?action=admin');
            exit();
        }
    }
    include('view/backend/postChapter.php');
}

function updateChapter()
{
    function verifdata($data)
    {
        if (isset($data)) {
            echo $data;
        } else {
            echo '';
        }
    }

    if (!empty($_POST)) {
        $validation = true;

        if (empty($_POST['chapter_number'])) {
            $erreurChapNumber = 'Merci de renseigner le numéro de chapitre';
            $validation = false;
        }
        if (!is_numeric($_POST['chapter_number'])) {
            $erreurChapNumber = 'Le numero de chapitre n\'est pas un chiffre';
            $validation = false;
        }

        if (empty($_POST['title'])) {
            $erreurTitle = 'Le titre est vide';
            $validation = false;
        }
        if (empty($_POST['text_chapter'])) {
            $erreurText = 'Le texte du chapitre est vide';
            $validation = false;
        }
        if (empty($_POST['couleur'])) {
            $erreurCouleur = 'Merci de choisir une couleur';
            $validation = false;
        }
        if (empty($_FILES['image_chapter']['name'])) {
            $erreurImage = 'Merci de choisir une image';
            $validation = false;
        }

        if (filesize($_FILES['image_chapter']['tmp_name']) > 2500000) {
            $erreurTailleImage = "Votre photo est trop grosse la taille limite est de 2 MO";
            $validation = false;
        }

        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['image_chapter']['name'], '.');
        if (!in_array($extension, $extensions)) {
            $erreurFormatImage = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
            $validation = false;
        }

        if ($validation == true) {
            $chapter = new Chapter([
                'chapter_number' => $_POST['chapter_number'],
                'title' => $_POST['title'],
                'text_chapter' => $_POST['text_chapter'],
                'couleur' => $_POST['couleur'],
                'id' => $_GET['chapitre'],
                'image_chapter' => "chapitre" . $_POST['chapter_number'] . "-" . $_FILES['image_chapter']['name'],
            ]);
            $ChapterManager = new ChapterManager();
            $ChapterManager->update($chapter);

            move_uploaded_file($_FILES['image_chapter']['tmp_name'], 'public/uploads/chapitre' . basename($_POST['chapter_number'] . "-" . $_FILES['image_chapter']['name']));
            header('Location: index.php?action=admin');
            exit();
        }
    }

    // récupération du post publié pour l'afficher dans le formulaire en vue de le modifier.
    $ChapterManager = new ChapterManager();
    $post_data = $ChapterManager->get($_GET['chapitre']);
    include('view/backend/updateChapter.php');
}
