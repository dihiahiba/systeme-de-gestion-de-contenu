<?php
    
    require_once('user.php');   
    
    $c = new users(); 

    $c->setid($_GET['id']); 

    $c->user_desactive(); 
    header('Location: ../user_affichage.php?action=success');    
?>