<?php
    
    require_once('user.php');   
    
    $c = new users(); 

    $c->setid($_GET['id']); 

    $c->delete(); 
    header('Location: ../user_affichage.php?action=success');    
?>