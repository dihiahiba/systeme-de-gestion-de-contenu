<?php
    session_start();

    require_once('article.php');   
    
    $c = new articles(); 

    $c->setid($_GET['id']); 

    $c->refuserArticle(); 
  
    header("Location: ../pending_article.php");
    exit();
      
?>