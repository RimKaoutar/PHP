<?php
    // requires
    require_once '../lib/vendor/autoload.php';
    require_once '../Model/CouchDB.php';
    
    $couch = new CouchDB("localhost", 5984, "sakila", "root", "reem");
    $list = $couch->get();
    ob_start();
    
    include "../Views/listfav.php";
    print_r(array_map(function($list){return $list['nom'];},$list));

    $content = ob_get_clean();

    $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr', true, 'UTF-8');
    $html2pdf->writeHTML($content);
    $html2pdf->output('equipes.pdf', 'D');