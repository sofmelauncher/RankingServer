<?php
require('config.php');


if(isset($_POST["GameID"])){
    $id = $_POST["GameID"];
    $order = $_POST["OrderType"];
}else{
    $id = 0;
}
$sql1 = "SELECT * FROM `GameID";
$sql2 = "`ORDER BY ScoreValue ";

try {
    $pdo = new PDO($dns, $user, $pw, array(PDO::ATTR_EMULATE_PREPARES => false));
    $statement = $pdo->query($sql1.strval($id).$sql2).strval($order).";";
} catch (PDOException $e) {
    echo("aaa");
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
print json_encode($userData) ;