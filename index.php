<?php 
session_start();
if(isset($_SESSION['id'])){
    header('Location: accueil_membre.php');
}
else{
    header('Location: accueil.php');
}
?>