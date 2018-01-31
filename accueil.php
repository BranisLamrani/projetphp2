<?php
session_start();
require_once('function/Inscription.php');
require_once('function/Connexion.php');
inscription();
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Index</title>
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" type="text/css" href="framework/semantic/semantic.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet"> 
  <style>
  body {
    background-image: url("images/wallpaper/wall1.jpg");
    background-repeat: no-repeat, repeat;
    background-size: cover;

  }
</style>
</head>
<body>
  <div class="ui  inverted menu">
    <a class="active item">
      Home
    </a>
    <a class="item">
      Messages
    </a>
    <div class="right menu">
      <form action="" method="POST">
      <div class="ui form">
        
          <div class="fields">
            <div class="field">
              <input placeholder="Mail" type="text" name="mail_user">
            </div>
            <div class="field">
              <input placeholder="Mot de passe" type="password" name="pass_user">
            </div>
            <div class="field">
              <button type="submit">Connexion</button>
            </div>
          </div>
        
      </div>

      </form>
    </div>
  </div> <!-- Fin du menu-->

  <div id="container">

    <div class="title">MuShare</div>


    <div class="describe">
      Venez vendre vos instruments de musique ou acheter des instruments près de chez vous
    </div>

    <div class="ui one column stackable center aligned page grid">
     <div class="column twelve wide">
      <button class="ui red button btn-inscription" onclick="function_modal()">Nous rejoindre</button>    
    </div>
  </div>
</div> <!--End container-->
<div class="ui modal first">
  <i class="close icon"></i>
  <div class="header">
    Inscription
  </div>
  <div class="image content">
    <div class="ui medium image">
      <img src="/images/avatar/large/chris.jpg">
    </div>
    <div class="description">
      <div class="ui header">Champs obligatoires</div>
      <form class="ui form inscris" method="POST" >

        <div class="fields">
          <div class="field">
            <label>Nom</label>
            <input type="text" name="nom">
          </div>
          <div class="field">
            <label>Prénom</label>
            <input type="text" name="prenom">
          </div>
          <div class="field">
            <label >Mail</label>
            <input type="text" name="mail">
          </div>
        </div>  
        
        <div class="fields">
          <div class="field">
            <label >Mot de passe</label>
            <input type="password" name="pass1">
          </div>
          <div class="field">
            <label >Mot de passe<span class="pass"> (vérification)</span></label>
            <input type="password" name="pass2">
          </div>
        </div>
                   <h5 class="birth"> Date de naissance <hr> </h5>
            
        <div class="ui three column grid">
        <div class="fields">
                <div class="column">
                <div class="field">
                <label>Jour</label>   
                  <div id="jour" class="ui selection dropdown">
                    <input name="jour" type="hidden">
                    <i class="dropdown icon"></i>
                    <div class="default text">Jour</div>
                    <div class="menu menu-an">
                      <?php
                      for($i=0;$i<32;$i++){
                        ?>
                        <div class="item" data-value="<?php echo $i?>"><?php echo $i?></div>
                        <?php }?>
                      </div>
                    </div>
                  
                </div>
                </div>


                <div class="column">
                <div class="field">
                  <label>Mois</label>
                  <div id="mois" class="ui selection dropdown">
                    <input name="mois" type="hidden">
                    <i class="dropdown icon"></i>
                    <div class="default text">Mois</div>
                    <div class="menu">

                      <div class="item" data-value="Janvier">Janvier</div>
                      <div class="item" data-value="Février">Février</div>
                      <div class="item" data-value="Mars">Mars</div>
                      <div class="item" data-value="Avril">Avril</div>
                      <div class="item" data-value="Mai">Mai</div>
                      <div class="item" data-value="Juin">Juin</div>
                      <div class="item" data-value="Juillet">Juillet</div>
                      <div class="item" data-value="Août">Août</div>
                      <div class="item" data-value="Septembre">Septembre</div>
                      <div class="item" data-value="Octobre">Octobre</div>
                      <div class="item" data-value="Novembre">Novembre</div>
                      <div class="item" data-value="Décembre">Décembre</div>

                    </div>
                  </div>
                </div>
                </div>
                <div class="column">
                <div class="field">
                  <label>Année</label>
                  <div id="annee" class="ui selection dropdown" style="width: 50px;">
                    <input name="annee" type="hidden">
                    <i class="dropdown icon"></i>
                    <div class="default text">Année</div>
                    <div class="menu">
                      <?php
                      for($i=2019;$i>1920;$i--){
                        ?>
                        <div class="item" data-value="<?php echo $i?>"><?php echo $i?></div>
                        <?php }?>
                      </div>
                    </div>
                </div>
                </div>
        

        </div> <!--Fin d'un fields-->  
        </div> <!--ui grid end-->   
          <div class="actions" > 
            <button id="validinfo"class="ui green button" type="submit" ">Valider</button>

      
    </div>
      <div class="ui error message"></div>
    </div>
    
  </div>   

     </div>



  </div>
  </form>

      <div class="ui modal second">
      <i class="close icon"></i>
  <div class="header">
    Profile Picture
  </div>
  <div class="actions">
    <div class="ui black deny button">
      Nope
    </div>
    <div class="ui positive right labeled icon button">
      Yep, that's me
      <i class="checkmark icon"></i>
    </div>
  </div>
    </div>

</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>  
<!--Bootstrap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<!-- Semantic UI-->    
<script src="framework/semantic/semantic.min.js"></script>

<script>
 
  $('.ui.form.inscris')
  .form({
    fields: {
      Nom: {
        identifier: 'nom',
        rules: [
        {
          type   : 'regExp[/^[a-zA-Z]+$/]',
          prompt : 'Indiquez votre nom (lettres uniquement)'
        }
        ]
      },
      Prenom: {
        identifier: 'prenom',
        rules: [
        {
          type   : 'regExp[/^[a-zA-Z]+$/]',
          prompt : 'Indiquez votre prenom (lettres uniquement)'
        }
        ]
      },
      Mail: {
        identifier: 'mail',
        rules: [
        {
          type   : 'email',
          prompt : 'Indiquez votre mail'
        }
        ]
      },
      Mdp: {
        identifier: 'pass1',
        rules: [
        {
          type   : 'empty',
          prompt : 'Mot de passe obligatoire!'
        }
        ]
      },
      Mdpp: {
        identifier: 'pass2',
        rules: [
        {
          type   : 'integer',
          prompt : 'Tapez le même code pour vérifier que la saisie est bonne'
        },
        ]
      },
      Jour: {
        identifier: 'jour',
        rules: [
        {
          type   : 'integer',
          prompt : 'Jour ?'
        },
        ]
      },
      Mois: {
        identifier: 'mois',
        rules: [
        {
          type   : 'empty',
          prompt : 'Mois ?'
        },
        ]
      },
      Annee: {
        identifier: 'annee',
        rules: [
        {
          type   : 'empty',
          prompt : 'Année?'
        }
        ]
      }
    },
  })
  ;

   $('.ui.modal.first')
    .modal({blurring: true,allowMultiple: true})
  .modal('attach events','.btn-inscription','show');


     var element = document.getElementById('validinfo');


    element.addEventListener('click', function() {

          if( $('.ui.form.inscris').form('is valid')) {
      window.alert('inscription réussi vous pouvez dès à présent vous connectez');
        }
    });
 

</script>

<script>
  $('#jour').dropdown();
  $('.ui.radio.checkbox')
  .checkbox()
  ;
  $('#mois').dropdown();
  $('.ui.radio.checkbox')
  .checkbox()
  ;
  $('#annee').dropdown();
  $('.ui.radio.checkbox')
  .checkbox()
  ;
</script>

</body>
</html>
