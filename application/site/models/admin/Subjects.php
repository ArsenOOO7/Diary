<?php

class Subjects extends Model{

    static function getSubjects(){

        return R::getAll("SELECT * FROM `subjects`");

    }



    static function add($subject){

        $object = R::dispense("subjects");
        $object->name = $subject;
        R::store($object);

    }



    static function getName($id){

        return json_decode(R::findOne("subjects", "id = ?", [$id]))->name;

    }


    static function exists($name){

        return R::find("subjects", "name = ?", [$name]) !== null;

    }



    static function remove($id){

        $subjects = R::load("subjects", $id);
        R::trash($subjects);

    }



    static function toDay($day){

        if($day == 0) return "Понеділок";
        if($day == 1) return "Вівторок";
        if($day == 2) return "Середа";
        if($day == 3) return "Четвер";
        if($day == 4) return "П'ятниця";

    }

}