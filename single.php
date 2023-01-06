<?php

require_once 'model/managers/PostManager.php';
require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/CommentManager.php';


if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];
    $postManager = new PostManager("post");
    $post = $postManager->getPostById($id);
    $user = UserManager::getAuthorByPostId($id);
    $post_categories = CategoryManager::getCategoriesByPostId($id);
    $comment = CommentManager::getCommentById($id);
    $comments = CommentManager::getCommentsByPostId($id);
}



// requerir le fichier vue 
require_once 'views/singleView.php';