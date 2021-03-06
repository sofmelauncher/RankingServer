<?php
class Log{
  public static function info($text, $id){
    self::write($text, $id, "INFO");
    self::writeHtml($text, $id, "INFO");
  }
 
  public static function error($text, $id){
    self::write($text, $id, "ERROR");
    self::writeHtml($text, $id, "ERROR");
  }
 
  private static function write($text, $id, $log_type){
    $datetime = self::getDateTime();
    $date = self::getDate();
    $file_name = __DIR__ . "./log-{$date}.log";
    $text = "{$datetime} [{$log_type}] [{$id}] {$text}" . PHP_EOL;
    return error_log(print_r($text, TRUE), 3, $file_name);
  }

  private static function writeHtml($text, $id, $log_type){
    $datetime = self::getDateTime();
    $date = self::getDate();
    $file_name = __DIR__ . "./log-{$date}.html";
    $text = str_replace("[","[<span style=\"color:#9c27b0;\">", $text);
    $text = str_replace("]","</span>]", $text);
    $text = "<p class = \"{$log_type}\" style = \"white-space:nowrap;margin:0em 0em 0em 0;font-size:18px;font-family:'Tahoma';\"> {$datetime} [{$log_type}] [{$id}] {$text}</p>" . PHP_EOL;
    return error_log(print_r($text, TRUE), 3, $file_name);
  }
 
  // 日付を返す(ファイル名用)
  private static function getDate(){
    return date('Ymd');
  }
 
  // 日時を返す(出力ログ用)
  private static function getDateTime(){
    $datetime = explode(".", microtime(true));
    $date = date('Y-m-d H:i:s', $datetime[0]);
    $time = $datetime[1];
    return "{$date}.{$time}";
  }
}