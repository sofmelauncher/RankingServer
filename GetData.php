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
// $dsn = "mysql:dbname=sofmegameranking;host=localhost;charset=utf8mb4";
// $username = "RankinServer";
// $password = "sofmesomfe";
// $driver_options = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
// ];
// try {
//     $pdo = new PDO($dsn, $username, $password, $driver_options);
// } catch (PDOException $e) {
    
//         // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
//         // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
//         // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
//         header('Content-Type: text/plain; charset=UTF-8', true, 500);
//         exit($e->getMessage()); 
    
// }



    
// $resultData = $keyword;
header('Content-type: application/plain');
// print json_encode($resultData);
// print $data;
print json_encode( $data ) ;

