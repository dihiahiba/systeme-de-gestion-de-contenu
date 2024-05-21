<?php

require_once('comment.php');

if(isset($_POST['ajout']))
{
    $c = new comments();
    // $b = new comments();
    // if($c->setadmin($_POST['isadmin'])=='yes'){
    //     $b=1;

    // }else{
    //     $b=0;
    // }
    
    
    $c->setAll($_POST['commentaire'],$_POST['name'],$_POST['email'],$_POST['id']);
    $c->add();
   
    // $b->getid();
    
    header('Location: index.php');    

}
?>