<?php 
    require_once '../Model/actor.php';
    require_once '../Model/CouchDB.php';
    
    $actorDB = new actor();
    $couchDB = new CouchDB("localhost", 5984, "sakila", "root", "reem");
    $countries = $actorDB->get();
    $couch = $couchDB->get();

    // $list = $couchDB->get();
    // print_r(array_map(function($list){return $list['nom'];},$list));

    // $couchi = $couchDB->get("a4164f4be1d5cf743359437dff00d22a");
    // print_r($couch);

    // $actor = $actorDB->get($_GET["id"]);
    // $films = $actorDB->details($_GET["id"]);
    // $pays = array(
    //     "id" => $actor["actor_id"],
    //     "nom" => $actor["first_name"],
    //     "prenom" => $actor["last_name"],
    //     "films" => array_map(function ($actor) { return $actor["title"];},$films)
    // );
    // $list = $couchDB->post(json_encode($pays));
    // echo "<pre>";
    // print_r($pays);
    // echo "</pre>";
    include '../Views/list.php';
?>