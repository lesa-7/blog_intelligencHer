<?php
//session_start à garder ici car il faut être connecté pour ajouter un post
session_start();

require_once 'model/managers/PostManager.php';
require_once 'model/managers/CommentManager.php';
require_once 'model/managers/UserManager.php';


// je vérifie que j'ai un user
if (isset($_SESSION['user'])) {
    // je vérifie que j'ai bien reçu des données en POST
    if (isset($_POST) && !empty($_POST)) { 
        $content = $_POST['content'];
        $idPost = $_POST['id'];
        $idUser = $_SESSION['user']['id'];
    }
}