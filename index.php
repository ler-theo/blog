<?php

require './classe/Autoload.php';

//Ajout de l'accessibilité a la classe Autoload
spl_autoload_register('Autoload::classeAutoload');

include 'contents/init.php';

$user1 = new User("Charlotte", "Jean", "Charle", "charle@org.fr", "toto", 1);

$user1 -> inscription($bdd);
