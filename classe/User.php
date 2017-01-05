<?php

class User
{
  public $pseudo;
  private $nom;
  private $prenom;
  private $email;
  private $password;
  private $id;
  private $group;

  //Contruction de __contruct
  public function __construct($pseudo, $password, $email) {
    $this -> pseudo = $speudo;
    $this -> password = $password;
    $this -> email = $email;
    $this -> password = $password;
    $this -> id = $id;
  }

  public function inscription() {

    //Verification si l'utilisateur mail existe deja
    $sql = "SELECT * FROM user WHERE email =".$this -> email;
    $userEmail = $bdd->querry($sql);

    //S'il n'existe pas ajotu dans la bdd
    if (!$userEmail) {
      $sql = $bdd->prepare("INSERT INTO user (pseudo, nom, prenom, email, password)
      VALUES (:pseudo, :nom, :prenom, :email, :password)");


      $sql->execute(array(
      "pseudo" => $this -> pseudo,
      "nom" => $this -> nom,
      "prenom" => $this -> prenom,
      "email" => $this -> email,
      "password" => $this -> password
      ));

    //S'il l'email existe deja, j'envoie un mesasge pour prevenir
    } else {
      $message = "L'email est deja existant";
    }

  }

  public function connect() {

    //Verification des données de connect
    $sql = "SELECT * FROM user WHERE email =".$this -> email."AND password =".$this -> password;
    $checkConnect = $bdd->execute($sql);

    //Si les données sont correct
    if ($checkConnect) {

      //Ajout de user a la session
      $_SESSION['user'] = array(
        "userPseudo" => $this -> pseudo = $checkConnect['pseudo'],
        "userNom" => $this -> nom = $checkConnect['nom'],
        "userPrenom" => $this -> prenom = $checkConnect['prenom'],
        "userEmail" => $this -> email,
        "userPassword" => $this -> password,
        "userGroup" => $this -> group = $checkConnect['group'],
        "userId" => $this -> id = $checkConnect['id']
      )

      //Si les données sont incorrect, envoie d'un message
    } else {
        $message = "Echec de la connect, verifiez vos infos";
      }

  }

  public function disconnect() {
    session_destroy();
  }

}
