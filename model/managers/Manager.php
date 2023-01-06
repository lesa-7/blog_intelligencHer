<?php

require_once './model/DBConnect.php';
require_once './model/classes/Category.php';

/**
 * Summary of Manager début d'ORM (object relational mapping)
 */
class Manager
{
    protected $dbName;
    /**
     * Initialise le manager avec le nom de la table
     * @param mixed $dbName le nom de la table
     */
    function __construct($dbName)
    {
        $this->dbName = $dbName;
    }
    public function getAll()
    {
        $dbh = dbconnect();
        $query = "SELECT * FROM $this->dbName";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        return  $stmt->fetchAll(PDO::FETCH_CLASS, $this->dbName);
    }

    
    public function getById($id){
        //retourne un seul article par rapport à son id
        $dbh = dbconnect();
        $query = "SELECT * FROM $this->dbName WHERE id = :id";
        $stmt = $dbh->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, $this->dbName);
        $postById = $stmt->fetch();
        return $postById;
    }

    /**
     *  tu l'appelleras comme ça 
     * monManager->getFromCriteria( 
     * "pseudo = :pseudo and password = :password",
     * [[":pseudo",$pseudo], [":pseudo",$pseudo]]
     * )
     * 
     * @param [type] $where
     * @param [type] $field
     * @return void
     */
    
    public  function getFromCriteria($criteria, $field){
        //retourne un seul article par rapport à son id
        $dbh = dbconnect();
        $query = "SELECT * FROM $this->dbName WHERE $criteria";
        $stmt = $dbh->prepare($query);
        /* ici faire une boucle for
        for () {
             $stmt->bindParam($bindName, $variable);
        } 
        */
        $stmt->bindParam(':pseudo', $pseudo);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS,$this->dbName);
        $userByPseudo = $stmt->fetch();
        return $userByPseudo;
    }
}
