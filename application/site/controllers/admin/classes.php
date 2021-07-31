<?php

require_once(MODELS."/users/Users.php");
require_once(MODELS."/admin/Classes.php");

class classesController extends Controller{

    function index(){

        return view("admin/classes/all", "default", ["title" => "Класи", "data" => R::getAll("SELECT * FROM `classes`")]);

    }



    function add(){

        return view("admin/classes/add", "default");

    }



    function edit($id){

        $class = $_POST["class"];
        $letter = $_POST["letter"];
        $students = $_POST["students"];
        $teacher_id = $_POST["teacher_id"];

        Classes::update($id, $class, $letter, $students, $teacher_id);
        redirect("/admin/classes");

    }



    function store(){

        $class = $_POST["class"];
        $letter = $_POST["letter"];
        $students = $_POST["students"];
        $teacher_id = $_POST["teacher_id"];

        Classes::addClass($class, $letter, $students, $teacher_id);
        redirect("/admin/classes");

    }



    function sstore($id){

        $params = ["id", "surname", "name", "fname"];
       
        for($i = 0; $i < Classes::getStudents($id); ++$i){

            $student = [];
            foreach($params as $param){
                
                $student[$param] = $_POST["student_".$i."_".$param];

            }

            if(Users::findUser($student["id"])){

                Users::rename($student["id"], $student["name"], $student["surname"], $student["fname"]);

            }else{
             
                $user_id = Users::addUser("", Users::generatePassword(), $student["name"], $student["surname"], $student["fname"], 1, $id);
                Users::setLogin($user_id, "user");
            
            }
        }

        redirect("/admin/classes");

    }



    function show($id){
        
        $class = Classes::getClass($id);
        return view("admin/classes/show", "default", ["class" => $class, "id" => $id]);

    }



    function students($id){

        return view("students/all", "default", ["class" => Classes::getClass($id), "students" => Classes::getFullStudents($id)]);

    }



    function delete($id){



    }


}