<?php 
if(isset($_POST['mail_user']) && isset($_POST['pass_user'])){
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
	$password=crypt($_POST['pass_user'],'PASSWORD_DEFAULT');
    $login = $dbh->prepare('SELECT ID FROM users WHERE email = :mail AND password = :password');
    $login->bindParam(':mail', $_POST['mail_user'], PDO::PARAM_STR);
    $login->bindParam(':password', $password, PDO::PARAM_STR);
    $login->execute();
    $user = $login->fetchAll();
    $_SESSION['user']=$user;
    if (count($user)>0) {
        $_SESSION['connected'] = true;
        $_SESSION['id'] = $user[0]['ID'];
        echo "Les info sont correctes";
        if ($_SESSION['connected'] == true){
            header('Location: accueil_membre.php');
        }

    } else {
        echo 'Connexion impossible. Veuillez réessayer.';
    }
    $login->closeCursor();
}
?>