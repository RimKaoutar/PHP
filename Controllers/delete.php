<?php
    require_once '../Model/Actor.php';
    
    $countryDB = new Actor();
    $countryDB->delete($_GET["id"]);
    header("location:list.php");
        