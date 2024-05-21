<?php
require_once('./import/base.php');
require_once('./categorie.php'); 

if(isset($_GET['id'])) {
    
    $categoryId = $_GET['id'];

    
    $categorie = new categories();

    $categorie->setid($categoryId);
    
    
    $deleted = $categorie->delete();
    header("Location: ../affichage_categorie.php?action=success");

}
?>