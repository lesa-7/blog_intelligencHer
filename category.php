<?php 

require_once 'model/managers/CategoryManager.php';
require_once 'model/managers/PostManager.php';


// Reçoit l'id de la catégorie pour afficher les bonnes infos 
if(isset($_GET['id'])&&!empty($_GET['id'])){
    $id = $_GET['id'];
    $categoryInfos = CategoryManager::getCategoryInfos($id);
    $categoryPosts = PostManager::getPostsByCategoryId($id);
    //var_dump($categoryPosts);
}
