<?php

class Route{

    public $url;

    function __construct(){

        $this->url = preg_replace("/[^\w\d\s\/]/", '', $_SERVER["REQUEST_URI"]);

    }



    function action(){

        $folder = null;
        $controller = null;
        $method = null;
        $args = null;
        
        $parts = explode("/", $this->url);
        $parts = array_filter($parts);

        foreach($parts as $item){

            $full = CONTROLLERS."/".$folder."/".$item;
            
            if(is_dir($full)){

                $folder .= "/".$item;
                array_shift($parts);
                continue;
            }
            
            if(is_file($full.".php")){
                
                $controller = $item;
                array_shift($parts);
                break;

            }else break;

        }

        

        if($controller == null){

            $controller = "index";

        }

        if($c = array_shift($parts)){

            $method = $c;

        }else{

            $method = "index";

        }


        if(isset($parts[0]))
            $args = $parts;


        $this->go($folder, $controller, $method, $args);

    }



    function go($folder, $controllerName, $method, $args){      

        $controllerFile = CONTROLLERS."/".$folder."/".$controllerName.".php";
        $controllerClass = $controllerName."Controller";  

        
        if(is_readable($controllerFile)){

            require($controllerFile);

            $controller = new $controllerClass();

            if(!is_callable([$controller, $method]))
                $method = "index";

            if(empty($args)) {
                return call_user_func([$controller, $method]);
            } else {
                return call_user_func_array([$controller, $method], $args);
            }

        }

        $this->error();

    }



    function error($message = null){

        redirect("/error");

    }

}