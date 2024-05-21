<?php
session_start();

require_once('article.php');
require_once('../users/user.php');
if(isset($_POST['submit']))
{
    $c = new articles();
    $image = $_FILES['image']['name'];
    $src = $_FILES['image']['tmp_name'];
    $ext = pathinfo($image, PATHINFO_EXTENSION);
    $name = pathinfo($src, PATHINFO_FILENAME);
    $destination = './img/'.$name.'.'.$ext;
    move_uploaded_file($src, $destination);
    
    $c->setAll($_POST['title'], $destination, $_POST['content'], $_POST['categorie'], $_POST['id_user'], $_POST['isValidate'], $_POST['date']);
   
    $c->add();
    $user_id = $_SESSION['user_id'];

    // Instancier la classe User
    $user1q = new users();

    // Définir l'ID de l'utilisateur pour récupérer ses informations
    $user1q->setId($user_id);

    // Récupérer les informations de l'utilisateur depuis la base de données
    $userInfo = $user1q->getOne();
    
    // Redirection en fonction du rôle de l'utilisateur
    if($userInfo->isAdmin == 'Yes') {
        header("Location: affichage_article.php");
        exit(); // exit after header redirect to prevent further execution
    } else {
        header("Location: user_affichage_article.php");
        exit(); // exit after header redirect to prevent further execution
    }
}
?>
