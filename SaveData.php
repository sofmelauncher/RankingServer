<?php
require('config.php');
require_once __DIR__ . './Log.class.php';


if(isset($_POST["GameID"])){
    $id = $_POST["GameID"];
    $name = $_POST["DataName"];
    $value = $_POST["ScoreValue"];
    $time = $_POST["SaveTime"];
}else{
    $id = 0;
}

$sql1 = "INSERT INTO `gameid";
$sql2 = "` (`DataID`, `SaveTime`, `DataName`, `ScoreValue`) VALUES (";

try {
    $pdo = new PDO($dns, $user, $pw, array(PDO::ATTR_EMULATE_PREPARES => false));
    $sql3 = $sql1.strval($id).$sql2."NULL, '".strval($time)."', N'".strval($name)."', '".strval($value)."');";
    Log::info("Execute[{$sql3}]", $id);
    $str = mb_convert_encoding($sql3, "UTF-8", "auto");
    $statement = $pdo->query($str);
} catch (PDOException $e) {
    $str = "-1";
    Log::error("データベース接続失敗 [$e->getMessage()}]", $id);
    exit("データベース接続失敗。".$e->getMessage());
}

// header('Content-type: application/plain');
Log::info("Return[{$str}]", $id);
print $str;
