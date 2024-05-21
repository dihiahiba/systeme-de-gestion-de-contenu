<?php
    session_start();
    require_once('article.php');   
    
    if(isset($_POST['submit'])){

        $cnt = new articles(); 
        $image =$_FILES['image']['name'];
        $src =$_FILES['image']['tmp_name'];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $name=pathinfo($src, PATHINFO_FILENAME);
        $destination = './img/'.$name.'.'.$ext;
        move_uploaded_file($src,$destination);

        
        $cnt->kolchi($_POST['id'],$_POST['title'],$destination,$_POST['content'],$_POST['category']); 
        
        

        $cnt->update(); 
        if($userInfo->isAdmin == 'Yes') {
            $cnt->update(); 
            header('Location: ../affichage_article.php');    
            exit(); 
        } else {
            $cnt->update_user(); 
            header("Location: ../user_affichage_article.php");
            exit(); 
        }


    }

?>