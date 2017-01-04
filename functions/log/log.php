<?php

class Error
{

  public static function repportError($error) {

    $day = date("d/m/Y");
    $date = $day."[".date("h/m/s")."]";
    $string = $date."\n\n".$error."\n\n";

    //function pour ouvrir et ecrire dans un fichier
    $handle = fopen('./functions/log/error.txt', 'a');

    //Function pour ecrire dans le fichier
    fwrite($handle, $string);

    //Function close fichier
    fclose($handle);
  }

}
