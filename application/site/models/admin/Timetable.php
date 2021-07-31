<?php

class Timetable extends Model{


    static function getTimetable($id){

        return (R::load("timetable", $id)->timetable);
        
    }



    static function setTimetable($id, $timetable){

        if(count(R::getAll("SELECT * FROM `timetable` WHERE `id` = :id", ["id" => $id])) == 0){

            R::exec("INSERT INTO `timetable`(`id`, `timetable`) VALUES(:id, :timetable)",[

                "id" => $id,
                "timetable" => $timetable

            ]);

        }else{

            R::exec("UPDATE `timetable` SET `timetable` = :timetable WHERE `id` = :id", [

                "timetable" => $timetable,
                "id" => $id

            ]);
        
        }

    }



    static function toJSON($timetable = []){

        return json_encode($timetable);

    }
    


    static function getTemplate(){

        $table = [

            [
                
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6"


            ],

            [

                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6"

            ],

            [

                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6"

            ],

            [

                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6"

            ],

            [

                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6",
                "11:6"

            ]

        ];

        return json_encode($table);

    }


}