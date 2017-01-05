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

    //Recupe l'integralité de l'article
    $sql = "SELECT * FROM article WHERE id = 10";
    $article = $bdd -> query($sql) -> fetch();

    //Concatenation des differente parti de l'article
    $contentArticle = "<h1>" . $this -> titre . "</h1>";
    $contentArticle .= "<h2>" . $this -> chapo . "</h2>";
    $contentArticle .= "<p>" . $this -> contenu . "</p>";
    $contentArticle .= "<p>" . $this -> date . "</p>";

    //Affichage de l'article
    echo $contentArticle;

  }

  public function updateArticle($bdd, $newTitre, $newChapo, $newContenu, $newJour) {

    //Selection de l'article et preparation des contenues a changer
    $sql = $bdd->prepare("UPDATE article
    SET titre = :titre, chapo = :chapo, contenu = :contenu, jour = :jour
    WHERE id = :id");

    //Execute
    $sql -> execute(array(
      "id" => 10,
      "titre" => $newTitre,
      "chapo" => $newChapo,
      "contenu" => $newContenu,
      "jour" => $newJour,
    ));

  }

  public function deleteArticle($bdd, $id) {

    //Selection de l'article a supprimer
    $sql = "DELETE FROM article WHERE id = " . $id;

    //Config d'un message en cas de reussite
    if ($bdd->exec($sql)) {

      echo 'Delete win !';

    } else {

      echo 'Fail !';

    }


  }

}
