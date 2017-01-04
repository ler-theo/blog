<?php
class Log
{
  public static function writeCSV($e) {

    //Create DateTime
    $date = new DateTime();
    //Definition du fuseau horaire
    $date -> setTimezone(new DateTimeZone('Europe/Paris'));

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
