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


  public function writeArticle() {

    //Instance de la classe Bdd
    $sqlExec = new Bdd();

    //Definition de la table a changer
    $table = 'article (titre, contenu, jour, user_id, chapo)';

    //Definition des valeurs a changer
    $values = '(:titre, :contenu, :jour, :user_id, :chapo)';

    //Definition du tableau de valeur modifier
    $array = array(
      "titre" => $this -> titre,
      "contenu" => $this -> contenu,
      "jour" => $this -> date,
      "chapo" => $this -> chapo,
      "user_id" => $_SESSION['user']['userId'],
    );

    $sqlExec -> insertInto($table, $values, $array);

  }


  public function showArticle() {


    //Instance de la classe Bdd
    $sqlExec = new Bdd();

    $select = "*";
    $tableSelect = "article";
    $conditionSelect = " WHERE id = 10";

    //S'il n'existe pas ajout dans la bdd
    $sqlExec -> select($select, $tableSelect, $conditionSelect);

    //Concatenation des differente parti de l'article
    $contentArticle = "<h1>" . $this -> titre . "</h1>";
    $contentArticle .= "<h2>" . $this -> chapo . "</h2>";
    $contentArticle .= "<p>" . $this -> contenu . "</p>";
    $contentArticle .= "<p>" . $this -> date . "</p>";

    //Affichage de l'article
    echo $contentArticle;

  }

  public function updateArticle($newTitre, $newChapo, $newContenu, $newJour) {

    $sqlExec = new Bdd();
    //Selection de l'article et preparation des contenues a changer
    $select = 'article';
    $setUpdate = 'titre = :titre, chapo = :chapo, contenu = :contenu, jour = :jour ';
    $conditionUpdate = 'WHERE id = :id';

    //Execute
    $array = array(
      "id" => 10,
      "titre" => $newTitre,
      "chapo" => $newChapo,
      "contenu" => $newContenu,
      "jour" => $newJour,
    );


    $sqlExec -> update($select, $setUpdate, $conditionUpdate, $array);
  }

  public function deleteArticle($id) {

    $sqlExec = new Bdd();

    $select = "article";
    $conditionDelete = " WHERE id = " . $id;

    $sqlExec -> delete($select, $conditionDelete);

    //Config d'un message en cas de reussite
    if (true) {

      echo 'Delete win !';

    } else {

      echo 'Fail !';

    }


  }

}
