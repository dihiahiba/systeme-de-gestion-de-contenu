<?php

if(isset($_POST['articleId'])) {
    $articleId = $_POST['articleId'];

    require_once("categorie.php");
    
    $categorie = new categories();
    $categorie->setid($articleId);
    $categorie = $categorie->getOne();
    echo $categorie->name;
} else {
    echo "Erreur : ID de l'article manquant.";
}
?>
