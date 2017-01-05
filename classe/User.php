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

  public function signIn($bdd) {

    //Verification si l'utilisateur mail existe deja
    $sql = "SELECT * FROM user WHERE email ='".$this -> email."'";
    $userEmail = $bdd -> query($sql) -> fetch();

    //S'il n'existe pas ajout dans la bdd
    if (!$userEmail) {
      $sql = $bdd->prepare("INSERT INTO user (pseudo, nom, prenom, email, password)
      VALUES (:pseudo, :nom, :prenom, :email, :password)");

      $sql->execute(array(
      "pseudo" => $this -> pseudo,
      "nom" => $this -> nom,
      "prenom" => $this -> prenom,
      "email" => $this -> email,
      "password" => $this -> password,
      ));

    //S'il l'email existe deja, j'envoie un mesasge pour prevenir
    } else {
      $message = "L'email est deja existant";
    }

  }

  public function connect($bdd) {

    //Verification des données de connect
    $sql = "SELECT * FROM user WHERE email = '".$this -> email."' AND password = '".$this -> password."'";

    $logUser = $bdd->query($sql);
    //Si les données sont correct
    if ($logUser) {

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

      //Si les données sont incorrect, envoie d'un message
    } else {
        $message = "Echec de la connect, verifiez vos infos";
      }

  }

  public function disconnect() {
    unset($_SESSION['user']);
  }

}
