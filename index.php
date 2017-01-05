<?php

require './classe/Autoload.php';

//Ajout de l'accessibilité a la classe Autoload
spl_autoload_register('Autoload::classeAutoload');

include 'contents/init.php';

$user1 = new User(1, "Charlotte", "Jean", "Charle", "charle@org.fr", "toto", 1);

//$user1 -> signIn($bdd);
//$user1 -> connect($bdd);

$article1 = new Article("titre", "contenu", "jeudi", "chapo");


//$article1 -> writeArticle($bdd);
$article1 -> showArticle($bdd);
