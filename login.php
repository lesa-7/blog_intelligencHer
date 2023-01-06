<?php

require_once 'model/DBConnect.php';
require_once 'model/managers/UserManager.php';

if (isset($_POST) && !empty($_POST)) {
    $dbh = dbconnect();
    $email = htmlentities ($_POST['email']);
    $mdp = $_POST['mdp'];
    $user = UserManager::getUserByEmail($email);
    $verified_user = password_verify($mdp, $user->getUserPassword());
    var_dump($user);

    if($verified_user){
        UserManager::connectUser($user);    
        header('location:articles.php?status="success&message="Vous êtes bien connecté(e)!"');
}    
}

    

// requerir le fichier vue
require_once 'views/loginView.php';
?>