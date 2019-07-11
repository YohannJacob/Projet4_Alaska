<?php
session_start();

require 'model/Commentaires.php';
require 'model/CommentairesManager.php';
require 'model/Chapter.php';
require 'model/ChapterManager.php';
require 'model/user.php';
require 'model/UsersManager.php';

require 'controller/frontend.php';
require 'controller/backend.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'chapter') {
        chapter();
    } else if ($_GET['action'] == 'allChapter') {
            ();
    } else if ($_GET['action'] == 'admin') {
        admin();
    } else if ($_GET['action'] == 'postChapter') {
        postChapter();
    } else if ($_GET['action'] == 'updateChapter') {
        updateChapter();
    } else if ($_GET['action'] == 'createLogin') {
        createLogin();
    }else if ($_GET['action'] == 'login') {
        login();
    }else if ($_GET['action'] == 'logOut') {
        logOut();
    }else if ($_GET['action'] == '404') {
        erreur404();
    }

} else {
    home();
}
