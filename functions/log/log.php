<?php

class Error
{

  // public static $day = date("d/m/Y");
  // public static $date = $day."[".date("h/m/s")."]";
  // public static $string = $date."\n\n".$error."\n\n";

  //Method pour recup erreur et l'ecrire dans le sous dossier "error", chaque jours en cas d'erreur, un nouveau ficher est créé
  public static function repportError($error) {

    $day = date("d.m.Y");
    $date = $day." [".date("h:i:s")."]";
    $string = $date."\n\n".$error."\n\n";

    //Function pour ouvrir ou créer un fichier dans le repertoire "error"
    $handle = fopen("./functions/log/error/".$day.".txt", 'a');

    //Function pour ecrire dans le fichier
    fwrite($handle, $string);

    //Function close fichier
    fclose($handle);
  }

}
