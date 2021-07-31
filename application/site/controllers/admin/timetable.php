<?php

require_once(MODELS."/admin/Timetable.php");
require_once(MODELS."/users/Users.php");
require_once(MODELS."/admin/Subjects.php");
require_once(MODELS."/admin/Classes.php");

class timetableController extends Controller{

    function index(){

        return view("admin/timetable/all", "default", ["classes" => R::getAll("SELECT `id` FROM `timetable`")]);

    }



    function show($id){

        $content = Timetable::getTimetable($id);
        if($content == null)
            $content = Timetable::getTemplate();

        return view("admin/timetable/show", "default", ["id" => $id, "timetable" => json_decode($content, true)]);

    }



    function add(){

        $id = $_POST["class"];
        if(Classes::geClass($id) == null){
            
            redirect("/admin/timetable");
            return;

        }

        redirect("/admin/timetable/show/{$id}");

    }



    function delete($id){



    }



    function edit($id){

        $timetable = [];
        for($day = 0; $day < 5; ++$day){

            for($i = 0; $i < 8; ++$i){

                $timetable[$day][$i] = $_POST["timetable_{$day}_{$i}_teacher"].":".$_POST["timetable_{$day}_{$i}_subject"];

            }

        }

        Timetable::setTimetable($id, Timetable::toJSON($timetable));

    }

}