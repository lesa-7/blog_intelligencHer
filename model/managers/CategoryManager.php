<?php

require_once './model/DBConnect.php';
require_once './model/classes/Category.php';

class CategoryManager{
    public static function getAllCategories(){
        $dbh = dbconnect();
        $query = "SELECT * FROM category";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories;

    }

    public static function getCategoryInfos($id){
        $dbh = dbconnect();
        $query = "SELECT * FROM category WHERE id = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $category = $stmt->fetch();
        return $category;
    }

    public static function getCategoryById($id){
        //retourne un seul article par rapport à son id
        $dbh = dbconnect();
        $query = "SELECT * FROM category WHERE id = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Category');
        $categoryById = $stmt->fetch();
        return $categoryById;
    }

    public static function getCategoriesByPostId($id){
        $dbh = dbconnect();
        $query = "SELECT category.id, name FROM category JOIN post_category ON category.id = post_category.id JOIN post ON post_category.id = post.id WHERE post.id = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');
        return $categories; 
    }
}
