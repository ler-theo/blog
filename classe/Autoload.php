<?php

class Autoload
{
  //Chemin
  private static $classDirectory ='./classe/';

  public static function classeAutoload($class) {

    //Definie le repertoire ou Autoload les classes
    $path = static::$classDirectory . "$class.php";

    //Test du fichier s'il existe
    if (file_exists($path) && is_readable($path)) require $path;

  }
}
