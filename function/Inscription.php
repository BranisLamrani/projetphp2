<?php
function inscription(){
	if(!empty($_POST['nom'])&& !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['jour']) ){
		$nom=htmlentities($_POST['nom']);
		$prenom=htmlentities($_POST['prenom']);
		$mail=htmlentities($_POST['mail']);

		$birth=$_POST['jour'].'/'.$_POST['mois'].'/'.$_POST['annee'];


		$password1=htmlentities($_POST['pass1']);
	    $password2=htmlentities($_POST['pass2']);
	    if($password1==$password2){
			$password1=crypt($password2,'PASSWORD_DEFAULT');
	    }

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

		$requete= $dbh->prepare('INSERT INTO users(name,prenom,email,password,birth) 
                                      VALUES(:name,:prenom,:email,:password,:birth)');
        $requete->execute(array(
                'name' => $nom,
                'prenom' => $prenom,
                'email' => $mail,
                'password' => $password1,
                'birth' => $birth
            ));
        $requete->closeCursor();
        $dbh=null;
	}
}
?>