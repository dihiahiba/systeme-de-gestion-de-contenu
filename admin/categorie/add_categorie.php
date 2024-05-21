<?php
require_once('./categorie.php');

if(isset($_POST['name'])) {
    $categoryName = $_POST['name'];
    $categorie = new categories();
    $categorie->setname($categoryName);
    $categorie->add();
    header('Location: affichage_categorie.php');  
} else {
    echo "Erreur : Le nom de la catégorie n'est pas défini.";
}
?>