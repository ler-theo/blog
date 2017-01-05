<?php
//Connect to BDD fond de placard
try {
  $bdd = new PDO("mysql:host=localhost;dbname=blog", "root", "",
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
  );
} catch (Exception $e) {
  echo $e->getMessage();
  Log::writeCSV($e);
  die();
}

session_start();
