<?php

class Error
{

  public static function repportError($error) {

    //function pour ouvrir et ecrire dans un fichier
    $handle = fopen('./functions/log/error.php', 'a');


    //Function pour ecrire dans le fichier
    fwrite($handle, $error."\n");

    //function close fichier
    fclose($handle);
  }

}
