<?php

class Article
{

  public $id;
  public $titre;
  public $contenu;
  public $date;
  public $chapo;


  public function __construct($titre, $contenu, $date, $chapo) {

    $this -> titre = $titre;
    $this -> contenu = $contenu;
    $this -> date = $date;
    $this -> chapo = $chapo;
  }


  public function writeArticle($bdd) {

    $sql = $bdd->prepare("INSERT INTO article (titre, contenu, jour, user_id, chapo)
    VALUES (:titre, :contenu, :jour, :user_id, :chapo)");

    $sql -> execute(array(
    "titre" => $this -> titre,
    "contenu" => $this -> contenu,
    "jour" => $this -> date,
    "chapo" => $this -> chapo,
    "user_id" => $_SESSION['user']['userId'],
    ));

  }


  public function showArticle($bdd) {
    //Recupera l'integralité de l'article
    $sql = "SELECT * FROM article WHERE id = 10";
    $article = $bdd -> query($sql) -> fetch();

    $contentArticle = "<h1>". $this -> titre . "</h1>";
    $contentArticle .= "<h2>". $this -> chapo . "</h2>";
    $contentArticle .= "<p>". $this -> contenu . "</p>";
    $contentArticle .= "<p>". $this -> date . "</p>";

    echo $contentArticle;
    //Definir les differente parti de l'article
    //Afficher les differentes partie de l'article
  }

  public function updateArticle() {

    //Modification de l'article en BDD
    //Selection de l'article a modifier
    //prepare la requete
    //Modifier les element visé

  }

  public function deleteArticle() {

    //Suppresion de l'article en BDD

  }

  public function writeComment() {

    //Création du commentaire en BDD

  }
}
