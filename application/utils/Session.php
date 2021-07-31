<?php

class Session{

    function __construct(){

        if(session_id() == " " or !isset($_SESSION))
            session_start();

    }



    function add(int $id, string $login, string $username, string $surname, int $access){

        $_SESSION["user"] = [

            "id" => $id,
            "login" => $login,
            "username" => $username,
            "surname" => $surname,
            "access" => $access

        ];

    }

}