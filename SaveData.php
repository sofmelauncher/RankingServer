<?php
require('config.php');


if(isset($_POST["GameID"])){
    $id = $_POST["GameID"];
    $name = $_POST["DataName"];
    $value = $_POST["ScoreValue"];
    $time = $_POST["SaveTime"];
}else{
    $id = 0;
}
$sql1 = "INSERT INTO GameID";
$sql2 = " (SaveTime, DataName, ScoreValue) VALUES (";

try {
    $pdo = new PDO($dns, $user, $pw, array(PDO::ATTR_EMULATE_PREPARES => false));
    $sql3 = $sql1.strval($id).$sql2.$time." ".$name." ".$value;
    $statement = $pdo->query($sql3);
    print "1";
} catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
    print "-1";
}

header('Content-type: application/plain');
print json_encode($sql3);