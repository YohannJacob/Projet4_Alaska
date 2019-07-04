<?php
session_start();

require 'model/Commentaires.php';
require 'model/CommentairesManager.php';
require 'model/Chapter.php';
require 'model/ChapterManager.php';

require 'controller/frontend.php';
require 'controller/backend.php';

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'chapter'){
        chapter();
    } else if($_GET['action'] == 'allChapter'){
        allChapter();
    } else if ($_GET['action'] =='admin'){
        admin();
    } else if ($_GET['action'] =='postChapter'){
        postChapter();
    }else if ($_GET['action'] =='updateChapter'){
        updateChapter();
}
}else{
    home();
}