<?php
    require_once('article.php');   

        $article_id = $_GET['id'];
        $cnt = new articles(); 
        $cnt->setid($article_id);
        $cnt->unarchive(); 
        header("Location: ../affichage_article.php?action=success");
   
?>