<?php 
    require_once '../Model/actor.php';
    require_once '../Model/CouchDB.php';
    
    $actorDB = new actor();
    $couchDB = new CouchDB("localhost", 5984, "sakila", "root", "reem");
    $countries = $actorDB->get();
    $couch = $couchDB->get();
    // print_r($couch);
    include '../Views/listfav.php';
?>