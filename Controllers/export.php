<?php
require_once '../lib/vendor/autoload.php';
require_once '../Model/CouchDB.php';
// include_once 'result.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$classeur = new Spreadsheet();
$feuille = $classeur->getActiveSheet();

$couch = new CouchDB("localhost", 5984, "sakila", "root", "reem");
$list = $couch->get();



// if(isset($_GET['dep'])&& isset($_GET['date'])&&isset($_GET['jour'])){
//     $list = array();
//      $list = array_filter($lists, function($v){
//          $id = explode("/", $v["_id"]);
//          return ($id[0] == $_GET['dep'] && $id[2] == $_GET['jour'] && $id[1] == $_GET['date'] )?1:0;

//            });
//     };

foreach ($list as $idx=>$c){

    $feuille->setCellValue("A" . ($idx+1), $c["nom"]);
    $feuille->setCellValue("B" . ($idx+1), $c["prenom"]);
}

header("Content-type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-disposition:attachment;filename=testo.xlsx");
    
$writer = new Xlsx($classeur);
$writer->save("php://output");