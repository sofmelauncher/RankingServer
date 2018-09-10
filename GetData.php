<?php
require('config.php');


if(isset($_POST["GameID"])){
    $id = $_POST["GameID"];
}else{
    $id = 0;
}
$sql1 = "SELECT * FROM `GameID";
$sql2 = "`ORDER BY SaveTime DESC;";

try {
    $pdo = new PDO($dns, $user, $pw, array(PDO::ATTR_EMULATE_PREPARES => false));
    $statement = $pdo->query($sql1.strval($id).$sql2);
} catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
}
print("終了");


// header('Content-type: application/plain');
// print json_encode($resultData);
// print $data;
// print json_encode( $statement ) ;

// $members = array();
// foreach ($statement as $row) {
//     $members[] = $row;
// }
// var_dump($members);
$userData = array();
while($row = $statement->fetch(PDO::FETCH_ASSOC)){
    $userData[]=array(
    "DataID" => $row["DataID"],
    "SaveTime" => $row['SaveTime'],
    "DataName" => $row["DataName"],
    "ScoreValue" => $row["ScoreValue"]
    );
}
print json_encode($userData) ;