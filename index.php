<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once("vendor/autoload.php");


require_once("application/utils/Session.php");

require_once("application/engine/Route.php");
require_once("application/engine/Controller.php");
require_once("application/engine/Model.php");

require("application/utils/Constants.php");
require("application/utils/Web.php");

class_alias("\RedBeanPHP\R", "R");

$data = getData(__DIR__."/");
R::setup("mysql:host=".$data['host'].";dbname=".$data['database'], $data["user"], $data["password"]);

if(!R::testConnection()) die('No DB connection!');


$GLOBALS["session"] = new Session();

$route = new Route();
$route->action();


