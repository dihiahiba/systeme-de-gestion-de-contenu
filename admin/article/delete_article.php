<?php
    session_start();

    require_once('article.php');   
    
    $c = new articles(); 

    $c->setid($_GET['id']); 

    $c->delete(); 
    if($userInfo->isAdmin == 'Yes') {
        header('Location: ../affichage_article.php'); 
        exit(); // exit after header redirect to prevent further execution
    } else {
        header("Location: ../user_affichage_article.php");
        exit(); // exit after header redirect to prevent further execution
    }
      
?>