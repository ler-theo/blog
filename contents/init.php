<?php
__DIR__include'../functions/log/log.php';
//Connect to BDD fond de placard
try {
  $bdd = new PDO("mysql:host=localhost;dbname=fond_de_placard", "root", "23",
  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
);
} catch (Exception $e) {
  $e->getMessage();
  Error::repportError($e);
}
