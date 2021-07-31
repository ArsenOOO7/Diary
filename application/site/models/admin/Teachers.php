<?php

class Teachers extends Model{

    static function getTeachers(){

        return R::getAll("SELECT * FROM `teachers`");

    }



    static function add($teacher_id, $subjects){

        $subjects = strval(json_encode(explode(",", $subjects)));
        R::exec('INSERT INTO `teachers`(`id`, `subjects`) VALUES(:id, :subjects)', [

            "id" => $teacher_id,
            "subjects" => $subjects

        ]);
        // $teacher = R::dispense("teachers");
        // $teacher->id = $teacher_id;
        // $teacher->subjects = "$subjects";
        // R::store($teacher);

    }



    static function getSubjects($id){

        return json_decode(json_decode(R::findOne("teachers", "id = ?", [$id]))->subjects, true);

    }


    static function exists($name){

        return R::find("teachers", "name = ?", [$name]) !== null;

    }



    static function update($teacher_id, $subjects){

        // $object = R::load("teachers", $teacher_id);
        // $object->id = $teacher_id;
        // $object->subjects = json_encode(explode(",", $subjects));
        R::exec("UPDATE `teachers` SET `subjects` = :subjects WHERE `id` = :id", [

            "id" => $teacher_id,
            "subjects" => json_encode(explode(",", $subjects))

        ]);
        // R::store($object);

    }


    static function remove($id){

        $subjects = R::load("teachers", $id);
        R::trash($subjects);

    }

}