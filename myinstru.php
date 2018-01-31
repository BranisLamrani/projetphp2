<?php
session_start();
$dsn ='mysql:dbname=sharemu;host=127.0.0.1';
$user = 'root';
$password = '';
try {
    $dbh= new PDO($dsn,$user,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}
$requete=$dbh->prepare('SELECT * from users WHERE ID=:ID');
$requete->bindParam(':ID',$_SESSION['id'] ,PDO::PARAM_INT);
$requete->execute();
$infouser=$requete->fetch();
//Si l'utilisateur n'a pas de photo

$_SESSION['nom']=$infouser['name'];
$_SESSION['prenom']=$infouser['prenom'];
$_SESSION['email']=$infouser['email'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="framework/semantic/semantic.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!--Semantic UI-->
    <link rel="stylesheet" type="text/css" href="framework/semantic/semantic.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="css/accueilmembre.css">
</head>
<body>

<nav class="navbar justify-content-between" style="background-color:#0D0C0C;">
    <a class="navbar-brand sticky-top">ShareMu</a>
    <form method="POST" action="function/deconnexion.php" class="form-inline">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Déconnexion</button>
    </form>
</nav>

<div class="mymenu box">

    <br>
    <span> <?php echo $_SESSION['nom'].' '.$_SESSION['prenom']; ?></span>
    <br>
    <span> <?php echo $_SESSION['email'];?> </span>
    <br>
    <br>

    <div class="liens">
        <a href="function/addProduct.php"><img src="images/icone/plus.png"></a><br>
        <span>Ajouter instruments</span>
        <hr>

        <a href="myinstru.php"><img src="images/icone/music.png"></a><br>
        <span>Mes instruements</span>
        <hr>
        <a href="panier.php"><img src="images/icone/panier.png"></a><br>
        <span>Mon Panier</span><br>
        <hr>

    </div>
</div>

<div class="contenu box">
    <?php include 'function/owninstru.php'?>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<!--Bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!-- Semantic UI-->
<script src="framework/semantic/semantic.min.js"></script>
</body>
</html>