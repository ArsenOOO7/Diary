<?php

require_once(MODELS."/admin/Subjects.php");

class subjectsController extends Controller{


    function index(){

        return view("admin/subjects/all", "default", ["data" => Subjects::getSubjects()]);

    }



    function add(){

        return view("admin/subjects/add", "default");

    }



    function store(){

        $name = $_POST["name"];
        Subjects::add($name);
        redirect("/admin/subjects");

    }


    function show($id){

        $name = Subjects::getName($id);
        return view("admin/subjects/show", "default", ["name" => $name, "id" => $id]);

    }



    function edit($id){

        $subject = R::load('subjects', $id);
        $subject->name = $_POST["name"];
        R::store($subject);
        redirect("/admin/subjects");

    }



    function delete($id){

        Subjects::remove($id);
        redirect("/admin/subjects");

    }

}