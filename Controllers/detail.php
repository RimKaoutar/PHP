<?php
    require_once '../Model/CouchDB.php';
    require_once '../Model/Actor.php';
    
    $couchDB = new CouchDB("localhost", 5984, "sakila", "root", "reem");

    $actors = new actor();
    $actor = $actors->get($_GET["id"]);
  $list = $actors->details($_GET["id"]);
  
    // $lists = $actor->details($_GET["id"]);
    include '../Views/detail.php';

    