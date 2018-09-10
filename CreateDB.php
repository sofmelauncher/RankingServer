<?php
require('config.php');
$sql1 = "CREATE TABLE IF NOT EXISTS `GameID";
$sql2 = "`( `DataID` INT UNSIGNED NOT NULL AUTO_INCREMENT , `SaveTime` DATETIME NOT NULL , `DataName` VARCHAR(100) NULL , `ScoreValue` DOUBLE NOT NULL , PRIMARY KEY (`DataID`));";
try {
    $pdo = new PDO($dns,$user,$pw,
    array(PDO::ATTR_EMULATE_PREPARES => false));
    print('connected<br>');
    for ($i = 1; $i <= 10; $i++) {
        $statement = $pdo->query($sql1.strval($i).$sql2);
        print(strval($i)." is created<br>");
    }
} catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
}
print("終了");
