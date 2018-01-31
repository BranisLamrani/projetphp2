
<?php
    session_start();
if(!empty($_POST)){
    include '../includes/bdd_connect.php';
    $chemin_file='';

    if(!empty($_FILES['image'])){
        $repertory_image = "../images/instrument/";
        $extensionAuthorized =  array('png','jpg','jpeg'); // Extensions autorisées
        $mimesAuthorized = array('image/jpg','image/jpeg','image/png'); //Mimes autorisées
        $imageName= $_FILES['image']['name'];
        $imageNametmp= $_FILES['image']['tmp_name'];

        if(in_array(finfo_file(finfo_open(FILEINFO_MIME_TYPE),$imageNametmp),$mimesAuthorized)){
            $tableau = explode('.',$imageName);
            $newname= "photo".uniqid().".".$tableau[1];
            $chemin_file=$repertory_image.$newname;
            move_uploaded_file($imageNametmp,$chemin_file);
        }
        $prix=$_POST['prix'];
        $description=$_POST['description'];
        $requete= $dbh->prepare('INSERT INTO instrument(ID_users,prix,description,image,categorie) VALUES(:ID_users,:prix,:description,:image,:categorie)');
        $requete->execute(array(
            'ID_users'=>$_SESSION['id'],
            'prix' => $_POST['prix'],
            'description' => $_POST['description'],
            'image' => $chemin_file,
            'categorie' => $_POST['categorie']
        ));
        $requete->closeCursor();
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../framework/semantic/semantic.min.css">
    <link rel="stylesheet" href="../css/addProduct.css">
    <script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>

</head>
<body>
<div id="container">
    <form method="post" enctype="multipart/form-data">
        <div class="ui form">
            <div class="field">
                <label>Prix</label>
                <input placeholder="Prix" type="text" name="prix">
            </div>
            <div class="field">
                <label>Categorie</label>
                <input placeholder="Categorie" type="text" name="categorie">
            </div>
            <div class="field">
                <label>Description</label>
                <textarea rows="2" name="description"></textarea>
            </div>
            <div class="field">
                <label>Photo</label>
                <input  type="file" name="image">
            </div>
        </div>
        <br>
        <button type="submit" class="ui green button">Valider</button>
    </form>
</div>

<a href="../accueil_membre.php">Retour a l'accueil</a>
<script src="../framework/semantic/semantic.min.js"></script>
</body>
</html>
