<?php
class Comment {
    private $id;
    private $date;
    private $content;
    private $fkIdPost;
    private $fkIdUser;

    public function getCommentId(){
        return $this->id;
    }

    public function getCommentDate(){
        return $this->date;
    }

    public function setCommentDate($date){
        $this->date = $date;
    }

    public function getCommentContent(){
        return $this->content;
    }

    public function setCommentContent($content){
        $this->content = $content;
    }

    public function getFkIdPost(){
        return $this->fkIdPost ;
    }

    public function setFkIdPost($fkIdPost){
        $this->fkIdPost  = $fkIdPost ;
    }

    public function getFkIdUser(){
        return $this->fkIdUser;
    }

    public function setFkIdUser($fkIdUser){
        $this->fkIdUser = $fkIdUser;
    }
    
    }