<?php
class Post {
    private $id;
    private $title;
    private $date;
    private $content;
    private $picture;
    private $fkIdUser;

    public function getPostId(){
        return $this->id;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getDate(){
        return $this->date;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

     public function getPicture(){
        return $this->picture;
    }

    public function setPicture($picture){
        $this->picture = $picture;
    }

    public function getUserId(){
        return $this->fkIdUser;
    }

    public function setUserId($fkIdUser){
        $this->fkIdUser = $fkIdUser;
    }





}