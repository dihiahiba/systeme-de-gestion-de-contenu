<?php
session_start();

require_once('remarque.php');
require_once('article.php');
if(isset($_POST['submit']))
{
    $c = new remarques();
    $a=new articles();
    
    $c->setAll($_POST['remarque'], $_POST['id_article'],$_SESSION['user_id'] );
   
    $c->add();
    $a->setid($_POST['id_article']);
    $a->refuser(); 
    header("Location: pending_article.php?action=deny");

}
?>