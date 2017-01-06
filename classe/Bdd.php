<?php


class Bdd
{
  public $host = 'localhost';
  public $dbname = 'blog';
  public $nameUser = 'root';
  public $passwordUser = '';

  // public function __construct($host, $dbname, $nameUser, $passwordUser) {
  //
  //   $this -> host = $host;
  //   $this -> dbname = $dbname;
  //   $this -> nameUser = $nameUser;
  //   $this -> passwordUser = $passwordUser;
  //
  // }

  public function insertInto($table, $values, $array) {

    try {
      $bdd = new PDO("mysql:host=localhost;dbname=blog", "root", "",
      array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
      );
    } catch (Exception $e) {
      echo $e->getMessage();
      Log::writeCSV($e);
      die();
    }

    $sql = $bdd->prepare("INSERT INTO " . $table . "VALUES " . $values);
    $sql -> execute($array);

  }

  public function select($select, $tableSelect, $conditionSelect) {

    try {
      $bdd = new PDO("mysql:host=localhost;dbname=blog", "root", "",
      array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
      );
    } catch (Exception $e) {
      echo $e->getMessage();
      Log::writeCSV($e);
      die();
    }

    $sql = "SELECT " . $select . " FROM " . $tableSelect . $conditionSelect;
    $test = $bdd -> query($sql) -> fetch();
    var_dump($sql);
    if ($test) {
      return true;
    } else {
      return false;
    }
  }
}
