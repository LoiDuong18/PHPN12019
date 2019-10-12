<?php
    class User{
        var $userName;
        var $passWord;
        var $fullName;
        function User ($userName, $passWord, $fullName){
            $this->userName= $userName;
            $this->passWord= $passWord;
            $this->fullName= $fullName;
        }
         static function authentication ($usename, $pw){
            if ($usename=="duongvanloi@gmail.com" && $pw=="1234")
            return new User($usename, $pw, "Dương");
            return null;
    }
}
?>
