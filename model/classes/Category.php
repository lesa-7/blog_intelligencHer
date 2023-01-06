<?php
class Category {
    private $id;
    private $name;

    public function getCategoryId(){
        return $this->id;
    }

    public function getCategoryName(){
        return $this->name;
    }

    public function setCategoryName($name){
        $this->name = $name;
    }

}