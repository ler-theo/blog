<?php

class User
{
  public $pseudo;
  private $nom;
  private $prenom;
  private $email;
  private $password;
  private $id;
  private $admin;

  //Contruction de __contruct
  public function __construct($id, $pseudo, $nom, $prenom, $email, $password, $group) {
    $this -> id = $id;
    $this -> pseudo = $pseudo;
    $this -> nom = $nom;
    $this -> prenom = $prenom;
    $this -> email = $email;
    $this -> password = $password;
    $this -> group = $group;
  }

  public function signIn() {

    //Instance de la classe Bdd
    $sqlExec = new Bdd();

    $select = "*";
    $tableSelect = "user";
    $conditionSelect = " WHERE email = '" . $this -> email."'";

    //S'il n'existe pas ajout dans la bdd
    if ($sqlExec -> select($select, $tableSelect, $conditionSelect)) {

    //S'il l'email existe deja, j'envoie un mesasge pour prevenir
    echo "L'email est deja existant";

    } else {

      //Definition de la table a changer
      $table = 'user (pseudo, nom, prenom, email, password)';

      //Definition des valeurs a changer
      $values = '(:pseudo, :nom, :prenom, :email, :password)';

      //Definition du tableau de valeur modifier
      $array = array(
        "pseudo" => $this -> pseudo,
        "nom" => $this -> nom,
        "prenom" => $this -> prenom,
        "email" => $this -> email,
        "password" => $this -> password,
      );

      $sqlExec -> insertInto($table, $values, $array);
      //Petit message
      echo  "utilisateur créer";


    }

  }

  public function connect() {

    //Instance de la classe Bdd
    $sqlExec = new Bdd();

    $select = "*";
    $tableSelect = "user";
    $conditionSelect = " WHERE email = '" . $this -> email."' AND password = '" . $this -> password . "'";

    //Si les données sont correct
    if ($sqlExec -> select($select, $tableSelect, $conditionSelect)) {

      //Ajout de user a la session
      $_SESSION['user'] = array(
        "userPseudo" => $this -> pseudo,
        "userNom" => $this -> nom,
        "userPrenom" => $this -> prenom,
        "userEmail" => $this -> email,
        "userPassword" => $this -> password,
        "userGroup" => $this -> group,
        "userId" => $this -> id
      );

      //Message en cas de reussite
      echo "Vous etes maintenant connecter";

      //Si les données sont incorrect, envoie d'un message
    } else {

      echo "Echec de la connect, verifiez vos infos";

    }

  }

  public function disconnect() {

    unset($_SESSION['user']);

    echo 'You win !';
  }

}
