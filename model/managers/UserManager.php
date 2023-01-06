<?php

require_once './model/DBConnect.php';
require_once './model/classes/User.php';
require_once 'Manager.php';
class UserManager extends Manager
{

    public function getAllPosts()
    {

        return parent::getAll();

    }

    public function getUserById($id)
    {
        return parent::getById($id);
    }

    public static function getUserByPseudo($pseudo)
    {
        //retourne un seul article par rapport à son id
        $dbh = dbconnect();
        $query = "SELECT * FROM user WHERE pseudo = :pseudo";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $userByPseudo = $stmt->fetch();
        return $userByPseudo;
    }

    public static function getUserByEmail($email)
    {
        //retourne un seul article par rapport à son id
        $dbh = dbconnect();
        $query = "SELECT * FROM user WHERE user.email = :email";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function getAuthorByPostId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT user.id, pseudo, email FROM user JOIN post ON post.fkIdUser = user.id WHERE post.id = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }

    public static function addUser($pseudo, $email, $mdp)
    {
        $dbh = dbconnect();
        $query = "INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :mdp)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mdp', $mdp);
        $stmt->execute();
    }

    public static function connectUser($user)
    {
        session_start();
        $_SESSION['user'] = [
            'id' => $user->getUserId(),
            'pseudo' => $user->getUserPseudo(),
        ];
    }

    public static function getUserInfos($id)
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM user WHERE id=:id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmt->fetch();
        return $user;
    }
}