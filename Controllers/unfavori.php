<?php
    require_once '../Model/CouchDB.php';
    require_once '../Model/Actor.php';
    
    $couchDB = new CouchDB("localhost", 5984, "sakila", "root", "reem");

    $actors = new actor();
    $actor = $actors->get();
    $couch = $couchDB->get();
    
    $list = $couchDB->delete($_GET["id"],$_GET["rev"]);
    print_r($list);
    // $lists = $actor->details($_GET["id"]);
    header("location:favori.php");

    