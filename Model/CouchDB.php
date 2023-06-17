<?php

class CouchDB
{
    private $_host;
    private $_port;
    private $_db;
    private $_user;
    private $_pass;
    
    function __construct($host, $port, $db, $user, $pass) {
        $this->_host = $host;
        $this->_port = $port;
        $this->_db = $db;
        $this->_user = $user;
        $this->_pass = $pass;
    }
    
    private function buildURL(){
        return "http://" . $this->_user . ":" . $this->_pass . "@" . $this->_host . ":" . $this->_port . "/" . $this->_db; 
    }
    
    // public function get($id = NULL){
//         if ($id != NULL){
//             $curl = curl_init($this->buildURL() . "/" . $id);
//             curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//             $result = json_decode(curl_exec($curl), true);
//             curl_close($curl);
//             return $result;
//         }else {
//             $curl = curl_init($this->buildURL() . "/_all_docs?include_docs=true");
//             curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//             $result = json_decode(curl_exec($curl), true);
//             curl_close($curl);
//             return $result;
//         }
        
        
//         $curl = curl_init();
// //         echo $this->buildURL() . "/" . (($id == NULL) ? "_all_docs?include_docs=true" : $id) ;
//         curl_setopt($curl, CURLOPT_URL, $this->buildURL() . "/" . (($id == NULL) ? "_all_docs?include_docs=true" : $id ));
//         curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
//         $result = json_decode(curl_exec($curl), true);
        
//         curl_close($curl);
//         return array_map(function($row){return $row['doc'];}, $result["rows"]);
//     }
    
    public function post($data){
        $curl = curl_init($this->buildURL());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type:application/json"));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $result;
    }
    public function get($id = NULL){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $this->buildURL() . "/" . (($id == NULL) ? "_all_docs?include_docs=true" : $id ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    $result = json_decode(curl_exec($curl), true);
    
    curl_close($curl);
    if (isset($result["rows"])) {
        return array_map(function($row){return $row['doc'];}, $result["rows"]);
    } else {
        return $result;
    }
}
    public function put($id, $rev, $data){
        $curl = curl_init($this->buildURL() . "/" . $id . "?rev=" . $rev);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type:application/json"));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $result;
    }
    
    public function delete($id, $rev){
        $curl = curl_init($this->buildURL() . "/" . $id . "?rev=" . $rev);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);
        return $result;
    }
    
}
// echo "test";
// $couch = new CouchDB("localhost", 5984, "controle_php", "admin", "azerty");
// var_dump($couch->get());
//var_dump($couch->get("1999111f08c1991992d3190b9000413f"));

// $pays = array(
//     "pays" =>"Qatar",
//     "villes" => array(
//         array("id" => 200, "ville" => "Doha"),
//         array("id" => 201, "ville" => "Toumama"),
//         array("id" => 202, "ville" => "Educ City"),
//     )
// );
// var_dump($couch->put("1999111f08c1991992d3190b90004f57", "2-470dc13292e2d8f51acafeb09a2f8c77", json_encode($pays)));

// var_dump($couch->delete("1999111f08c1991992d3190b90004f57", "3-6d7b071058cf87f5cb17e4edbcbaf0f4"));