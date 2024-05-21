<?php

if(isset($_POST['articleId'])) {
    $articleId = $_POST['articleId'];

    require_once("remarque.php");
    
    $remarque = new remarques();
    $remarque->setid_artice($articleId);
    $remarque = $remarque->getOne();
    echo $remarque->remarque;
} else {
    echo "Erreur : ID de l'article manquant.";
}
?>
