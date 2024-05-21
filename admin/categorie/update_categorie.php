<?php

if(isset($_POST['submit'])) {

    require_once("categorie.php");
    
    $categorie = new categories();
    $categorie->setAll($_GET['id'],$_POST['name']);
     $categorie->update();
     header("Location: affichage_categorie.php");
} else {
    echo "Erreur : ID de l'article manquant.";
}
?>
