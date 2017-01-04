<?php
//Connect to BDD fond de placard
try {
  $bdd = new PDO("mysql:host=localhost;dbname=fond_de_placard", "root", "12",
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
  );
} catch (Exception $e) {
  echo $e->getMessage();
  Log::writeCSV($e);
  die();
}
