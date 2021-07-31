<?php

function redirect($url){

    header("Location: ".$url);

}



function view($view, $layout = "", $data = null){

    ob_start();

    require(VIEWS."/".$view.".php");
    $content = (ob_get_clean());

    if($layout !== "")
        require(VIEWS."/layouts/".$layout.".php");

}


function getData(string $data_folder){

    if(!file_exists($data_folder."config.json")){


        $put = [

            "host" => "localhost",
            "port" => 3336,
            "database" => "data_name",
            "user" => "mysql",
            "password" => "mysql"

        ];
        file_put_contents($data_folder."config.json", json_encode($put, JSON_PRETTY_PRINT | JSON_BIGINT_AS_STRING | JSON_UNESCAPED_UNICODE));

    }

    return json_decode(file_get_contents($data_folder."config.json"), true);

}