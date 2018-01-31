<?php

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
$requete= $dbh->prepare('SELECT * FROM instrument WHERE ID_users=:ID');
$requete->bindParam(':ID',$_SESSION['id']);
$requete->execute();

while($infoinstru = $requete->fetch()) {
    if ($infoinstru['image'] == null) {
        $infoinstru['image'] = '../images/vehicule/nopic.png';
    }
    $infoinstru['image']
    ?>
    <div class="ui items">
        <div class="item">
            <div class="ui small image">
                <img src="<?php echo substr($infoinstru['image'], 3);?>" >
            </div>
            <div class="middle aligned content">
                <div class="header">
                    <?php echo $infoinstru['categorie'];?>
                </div>
                <div class="description">
                    <p><?php echo $infoinstru['description'];?></p>
                </div>
                    <div class="extra">
                        <div class="ui right floated button">
                            Supprimer
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <hr style="background:white;">
    <?php
}
?>
</div>