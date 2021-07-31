<?php

require_once(MODELS."/users/Users.php");
require_once(MODELS."/admin/Teachers.php");
require_once(MODELS."/admin/Subjects.php");

class teachersController extends Controller{


    function index(){

        $teachers = [];
        $n = 0;
        foreach(Teachers::getTeachers() as $teacher){

            $user = Users::getUser($teacher["id"]);
            $teachers[$n] = [

                "name" => $user->name,
                "surname" => $user->surname,
                "fname" => $user->fname,
                "id" => $user->id,
                "login" => $user->login,
                "password" => $user->password,
                "subjects" => []

            ];

            foreach(json_decode($teacher["subjects"], true) as $id)
                $teachers[$n]["subjects"][] = Subjects::getName($id);

            ++$n;

        }

        return view("admin/teachers/all", "default", ["data" => $teachers]);

    }



    function add(){

        return view("admin/teachers/add", "default", ["count" => $_POST["count"]]);

    }



    function store($count){

        $params = ["name", "fname", "surname", "subjects"];
        for($i = 0; $i < $count; ++$i){

            $teacher = [];

            foreach($params as $param){

                $teacher[$param] = $_POST["teacher_".$param."_".$i];

            }

            $id = Users::addUser("", Users::generatePassword(), $teacher["name"], $teacher["surname"], $teacher["fname"], 2);
            Users::setLogin($id, "teacher");
            Teachers::add($id, $teacher["subjects"]);

        }

        redirect("/admin/teachers");

    }


    function show($id){

        $subjects = Teachers::getSubjects($id);
        $teacher = Users::getUser($id);

        return view("/admin/teachers/show", "default", ["id" => $id, "teacher" => $teacher, "subjects" => $subjects]);
        
    }



    function edit($id){


        $name = $_POST["name"];
        $fname = $_POST["fname"];
        $surname = $_POST["surname"];
        $subjects = $_POST["schoolsubjects"];

        $user = R::load("users", $id);
        $user->name = $name;
        $user->fname = $fname;
        $user->surname = $surname;
        R::store($user);

        Teachers::update($id, $subjects);
        redirect("/admin/teachers");

    }



    function delete($id){

        
        
    }

}