<?php

require_once 'model/DBConnect.php';
require_once 'model/classes/User.php';
require_once 'model/managers/UserManager.php';
require_once 'model/managers/CategoryManager.php';


if(isset($_POST)&&!empty($_POST)){
    //sanitisation des données et chiffrement du mot de passe
    $pseudo = htmlentities($_POST['pseudo']);
    $email = htmlentities($_POST['email']);
    $mdp = $_POST['mdp'];
    $hashed_pwd = password_hash($mdp, PASSWORD_BCRYPT);
    //transmission à une méthode du manager pour enregistrer en bdd 
    UserManager::addUser($pseudo, $email, $hashed_pwd);
    //UserManager::connectUser(); à construire

    
    header('location:login.php?status="success&message="Vous êtes bien connecté(e)!"');
}
 

$categories = CategoryManager::getAllCategories();
//var_dump($_POST);


// requerir le fichier vue
require_once 'views/signupView.php';
?>