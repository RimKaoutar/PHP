<?php
    require_once '../Model/actor.php';


    if (isset($_POST["fname"])&& isset($_POST["lname"])){
        
        $country = new actor();
        $country->add(array("fname" => $_POST["fname"],"lname" => $_POST["lname"]));
        header("location:index.php");
    }else 
        include '../Views/form.php';
    