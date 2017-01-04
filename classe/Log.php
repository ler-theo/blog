<?php
class Log
{

  public static function formatDate() {
    //Create DateTime
    $date = new DateTime();
    //Definition du fuseau horaire
    $date -> setTimezone(new DateTimeZone('Europe/Paris'));

    return $date;
  }

  public static function writeCSV($e) {

    var_dump(Log::formatDate());

    var_dump($date);
    $log = array(

      //Formatage de la Date
      "Date" => $date -> format('Y-m-d h:i:s'),
      //Definition du message
      "Message" => $e -> getMessage()
    );

    $log_file = fopen("./logs/logs_".$date -> format('d-m-y').".csv", "a+");
    fputcsv($log_file, $log, ",");
    fclose($log_file);
  }
}
