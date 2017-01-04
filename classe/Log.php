<?php
class Log
{

  public static function formatDate($param) {
    //Create DateTime
    $param = new DateTime();
    //Definition du fuseau horaire
    $param -> setTimezone(new DateTimeZone('Europe/Paris'));

    $log = array(

      //Formatage de la Date
      "Date" => $param -> format('Y-m-d h:i:s'),
    );
    return $log;
  }

  public static function writeCSV($e) {

    Log::formatDate($date);


    $log_file = fopen("./logs/logs_".$log -> format ('d-m-y').".csv", "a+");
    fputcsv($log_file, $log, ",");
    fclose($log_file);
  }
}
