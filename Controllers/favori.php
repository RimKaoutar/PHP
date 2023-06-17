<?php
    require_once '../Model/CouchDB.php';
    require_once '../Model/Actor.php';
    
    $couchDB = new CouchDB("localhost", 5984, "sakila", "root", "reem");

    $actors = new actor();
    $actor = $actors->get($_GET["id"]);
    $films = $actors->details($_GET["id"]);
    $pays = array(
        "id" => $actor["actor_id"],
        "nom" => $actor["first_name"],
        "prenom" => $actor["last_name"],
        "films" => array_map(function ($actor) { return $actor["title"];},$films)
    );
    $list = $couchDB->post(json_encode($pays));
    // print_r($list);
    // $lists = $actor->details($_GET["id"]);
    header("location:index.php");

    