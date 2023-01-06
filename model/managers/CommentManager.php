<?php

require_once './model/DBConnect.php';
require_once './model/classes/Comment.php';

class CommentManager{
    public static function getAllComments(){
        $dbh = dbconnect();
        $query = "SELECT * FROM comment";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;

    }

    public static function getCommentById($id){
        //retourne un seul article par rapport à son id
        $dbh = dbconnect();
        $query = "SELECT * FROM comment WHERE id = :id";
        $stmt = $dbh->prepare($query);
        /*bindParam signifie :
        je remplace dans le texte de la requete :id (de la table comment) par $id
        après le bind la requete sera exécutée comme ça :
        "SELECT * FROM comment WHERE id = 1" si $id (de la table comment) =1 */
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
        $comment = $stmt->fetch();
        return $comment;
    }

    public static function getCommentsByPostId($id){
        $dbh = dbconnect();
        $query = "SELECT comment.* 
                  FROM comment 
                  JOIN post ON comment.fkIdPost=post.id
                  WHERE post.id = :id";

        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');
        return $comments;
    }

    public static function addComment($content, $idPost, $idUser){
        $dbh = dbconnect();
        $query = "INSERT INTO comment (content, fkIdPost, fkIdUser) VALUES (:content, :idPost, :idUser)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':content',$content);
        $stmt->bindParam(':idPost',$idPost);
        $stmt->bindParam(':idUser',$idUser);
        $stmt->execute();
        return $dbh->lastInsertId();
    }
}