<?php

require_once './model/DBConnect.php';
require_once './model/classes/Post.php';
require_once 'Manager.php';

class PostManager extends Manager
{
    public function getAllPosts()
    {

        return parent::getAll();
    }

    public function getPostById($id)
    {
        return parent::getById($id);
    }

    public static function getPostsByCategoryId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM post JOIN post_category ON post.id = post_category.fkIdPost WHERE post_category.fkIdCategory = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }

    public static function getPostsByUserId($id)
    {
        $dbh = dbconnect();
        $query = "SELECT post.*, user.id, user.pseudo 
        FROM post  
        JOIN user ON post.fkIdUser = user.id 
        WHERE user.id = :id;";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $posts = $stmt->fetchAll(PDO::FETCH_CLASS, 'Post');
        return $posts;
    }


    public static function getDateByPostId($postId)
    {
        $dbh = dbconnect();
        $query = "SELECT post.date
            FROM post
            WHERE post.id = :postId;";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
        $date = $stmt->fetch(PDO::FETCH_ASSOC);
        return $date['date'];
    }

    public static function addPost($title, $picture, $content, $userId)
    {
        $dbh = dbconnect();
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $query = "INSERT INTO post (title, date, picture, content, fkIdUser) VALUES (:title, '$date', :picture, :content, :id)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':picture',$picture);
        $stmt->bindParam(':content',$content);
        $stmt->bindParam(':id',$userId);
        $stmt->execute();
        return $dbh->lastInsertId();
    }

    public static function addPostCategories($id_post, $id_category) {
        $dbh = dbconnect();
        $query = "INSERT INTO post_category (fkIdPost, fkIdCategory) VALUES (:post, :category)";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':post',$id_post);
        $stmt->bindParam(':category',$id_category);
        $stmt->execute();
    }



    public static function editPost() {
        
    }

    public static function deletePost() {
        
    }
}