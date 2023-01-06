<?php
class User {
    private $id;
    private $pseudo;
    private $email;
    private $password;

    public function getUserId(){
        return $this->id;
    }

    public function getUserPseudo(){
        return $this->pseudo;
    }

    public function setUserPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getUserEmail(){
        return $this->email;
    }

    public function setUserEmail($email){
        $this->email = $email;
    }

    public function getUserPassword(){
        return $this->password;
    }

    public function setUserPassword($password){
        $this->password = $password;
    }

}