<?php

function dbconnect(){
    //Connexion PDO
$dsn = 'mysql:host=localhost;dbname=tp_blog';
$user = "root";
$pass = "";

try {
    $dbh = new PDO($dsn, $user, $pass, 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND 
    => 'SET NAMES utf8'));
    return $dbh;
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}    
}

