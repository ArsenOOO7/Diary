<?php

class indexController extends Controller{

    function index(){

        view("main/index",  "default", ["title" => "Test title", "header" => "Test h1", "content" => "Hello"]);

    }



    function show($id){

        var_dump($id);

    }

}