<?php
class Util{
    public static $idUser;
    public static function setIdUser($id){
        Util::$idUser = $id;
    }
     public static function getIdUser(){
        return Util::$idUser;
    }
    
}
?>