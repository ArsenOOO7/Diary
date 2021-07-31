<?php

class Classes extends Model{


    static function getClasses(){

        return R::getAll("SELECT * FROM `classes`");

    }



    static function getClass($id){

        return R::load("classes", $id);

    }



    static function addClass($class, $letter, $students, $teacher){

        $data = R::dispense("classes");
        $data->class = $class;
        $data->letter = $letter;
        $data->students = $students;
        $data->teacher_id = $teacher;

        R::store($data);

    }



    static function removeClass($id){

        $class = R::load("classes", $id);
        R::trash($class);

    }



    static function update($id, $class, $letter, $students, $teacher){

        $data = R::load("classes", $id);
        $data->class = $class;
        $data->letter = $letter;
        $data->students = $students;
        $data->teacher_id = $teacher;

        R::store($data);

    }



    static function getStudents($id){

        return R::load("classes", $id)->students;

    }



    static function getFullStudents($id){

        return R::getAll("SELECT `id`, `name`, `surname`, `fname`, `login`, `password` FROM `users` WHERE `class` = :class", ["class" => $id]);

    }
}