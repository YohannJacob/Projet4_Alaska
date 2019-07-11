<?php

function home()
{
    $chapterManager = new ChapterManager();
    $chapter = $chapterManager->getLastChapter();
    include('view/frontend/home.php');
}

function allChapter()
{
    $ChapterManager = new ChapterManager();
    $listChapter = $ChapterManager->getList('ASC');
    include('view/frontend/allChapter.php');
}

function chapter()
{
    if (!empty($_POST)) {
        $validation = true;

        if (empty($_POST['pseudo'])) {
            $erreurPseudo = 'le pseudo est vide';
            $validation = false;
        }
        if (empty($_POST['comment'])) {
            $erreurComment = 'le commentaire est vide';
            $validation = false;
        }
        if ($validation == true) {
            $commentaire = new Commentaires([
                'pseudo' => $_POST['pseudo'],
                'comment' => $_POST['comment'],
                'id_chapter' => $_GET['chapitre'],
            ]);

            $CommentairesManager = new CommentairesManager();
            $CommentairesManager->add($commentaire);
            header('Location: index.php?action=chapter&chapitre=' . $_GET['chapitre']);
            exit();
        }
    }
    // // Aller chercher les commentaires dans la table
    $CommentairesManager = new CommentairesManager();
    $listComment = $CommentairesManager->getList($_GET['chapitre']);

    // // Aller chercher les données dans la table
    $chapterManager = new ChapterManager();
    $chapter = $chapterManager->get($_GET['chapitre']);

    if ($chapter === false){
        header('Location: index.php?action=404');
    }


    //Signaler un commentaire en lui donnant un report = 1
    if (isset($_GET['comment'])) {
        $commentaire = new Commentaires([
            'report' => 1,
        ]);

        $CommentairesManager = new CommentairesManager();
        $CommentairesManager->update($_GET['comment']);
        header('Location: index.php?action=chapter&chapitre=' . $_GET['chapitre']);
        exit();
    }
    include('view/frontend/chapter.php');
}

function erreur404(){
    include('view/backend/erreur404.php');
}