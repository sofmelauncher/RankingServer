<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('config.php');
require_once __DIR__ . './Log.class.php';

if(isset($_POST["GameID"])){
    $id = $_POST["GameID"];
    $order = $_POST["OrderType"];
    $limit = $_POST["Limit"];
}else{
    $id = 0;
}
$sql1 = "SELECT * FROM `gameid";
$sql2 = "` ORDER BY ScoreValue ";

if($limit === "0"){
    $sql3 = $sql1.strval($id).";";
}else{
    $sql3 = $sql1.strval($id).$sql2.strval($order).", SaveTime DESC LIMIT ".strval($limit).";";
}

try {
    $pdo = new PDO($dns, $user, $pw, array(PDO::ATTR_EMULATE_PREPARES => false));
    Log::info("Execute[{$sql3}]", $id);
    $statement = $pdo->query($sql3);
} catch (PDOException $e) {
    var_dump($e);
    Log::error("データベース接続失敗 [{$e->getMessage()}]", $id);
    exit('データベース接続失敗。'.$e->getMessage());
}

$userData = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $userData[]=array(
    "DataID" => $row["DataID"],
    "SaveTime" => $row['SaveTime'],
    "DataName" => $row["DataName"],
    "ScoreValue" => $row["ScoreValue"]
    );
}
header('Content-type: application/json');
$json_data = json_encode($userData);
Log::info("Return[{$json_data}]", $id);
print $json_data;
// header('Content-type: application/plain');
// // var_dump($sql3);
// var_dump($statement);