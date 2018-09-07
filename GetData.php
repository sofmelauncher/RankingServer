<?php
$keyword='';
$resultData='';
$data = array();
//データ受け取り
if(isset($_POST["GameID"])){
    $data["GameID"] = $_POST["GameID"];
    $data["Time"] = $_POST["Time"];
    $data["DataID"] = $_POST["DataID"];
    $data["DataName"] = $_POST["DataName"];
    $data["Score"] = $_POST["Score"];
    
}else{
    $data = "not word";
}

// $resultData = $keyword;

header('Content-type: application/plain');
// print json_encode($resultData);
// print $data;
print json_encode( $data ) ;


