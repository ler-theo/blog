<?php
class Log
{

  public static function formatDate($param) {
    //Create DateTime
    $param = new DateTime();
    //Definition du fuseau horaire
    $param -> setTimezone(new DateTimeZone('Europe/Paris'));

    return $param;
  }

  public static function writeCSV($e) {

    Log::formatDate($date);

    var_dump();


    $log = array(

      //Formatage de la Date
      "Date" => $date -> format('Y-m-d h:i:s'),
      //Definition du message
      "Message" => $e -> getMessage()
    );

    $log_file = fopen("./logs/logs_".$date -> format ('d-m-y').".csv", "a+");
    fputcsv($log_file, $log, ",");
    fclose($log_file);
  }
}
