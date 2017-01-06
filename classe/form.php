<?php

class Form
{

  public $form;
  public $input;
  public $type;
  public $value;


  public function input($first) {

    $type = "hello";
    $nom = "yop";

    $first = array(

         $input = array(
          'type' => $type,
          'nom' => $nom,
         )

     );

    for ($i=0; $i < count($first) ; $i++) {
      for ($i=0; $i < count($input) ; $i++) {
        if (empty($result)) {
          $result = "Test1<br>";
          echo 'Test1<br>';
        } else {
          $result .= "Test2<br>";
          echo $result;
        }
      }
    }

    echo $result;
  }

}
