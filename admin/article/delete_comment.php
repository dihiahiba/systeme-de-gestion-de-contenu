<?php
require_once('./import/base.php');
require_once('./comment.php'); 

if(isset($_GET['id'])) {
    
    $categoryId = $_GET['id'];

    
    $comment = new comments();

    $comment->setid($categoryId);
    
    
    $deleted = $comment->delete();
    header("Location: ../dash.php?action=success");

}
?>