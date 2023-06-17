<?php
    require_once '../Model/actor.php';
    
    $countryDB = new actor();
    
    if (isset($_POST["fname"])&& isset($_POST["lname"])){
        
        $country = new actor();
        $countryDB->edit($_GET['id'], array("fname" => $_POST["fname"],"lname" => $_POST["lname"]));
        header("location:list.php");
    }else 
        include '../Views/form.php';
    