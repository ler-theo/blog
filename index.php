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
//$article1 -> showArticle($bdd);
//$article1 -> updateArticle($bdd, 'Trolololo', 'Chapotter', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 'jeudi');

//$article1 -> deleteArticle($bdd, 11);
