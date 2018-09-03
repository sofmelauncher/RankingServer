<?php
$keyword='';
$resultData='';

//データ受け取り
if(isset($_POST['word'])){
    $keyword=$_POST['word'];	//キーワード
}else{
    $keyword = "not word";
}



$resultData = $keyword;

header('Content-type: application/plain');
// print json_encode($resultData);
print $resultData;
