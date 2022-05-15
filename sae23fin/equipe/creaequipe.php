<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>  
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/favicon.png"/>
    <link rel="stylesheet" href="form.css">
    <title>Créer une équipe</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  </head>
  <?php
    // Initialiser la session
    session_start();
    require('config2.php');

    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
      header("Location: ../connexion.php");
      exit(); 
    }
    
  	?>
  <body>
  <div class="banner">
      <nav class="navbar">
        <img class="logo" src="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/logo.png" alt="Logo-du-site">
        <ul>
          <li class="trajet"><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/horaire.php">Horaire</a></li>
        </ul>
        <ul>
          <li class="accueil"><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/index.php">Accueil</a></li>
        </ul>
				<ul>
			    <li class="equipe"><a href="#">Equipe</a>
				    <ul class="subequipe">
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/visuequipe.php">Mes équipes </a></li>
              <li><a href= "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/creaequipe.php">Créer une équipe</a></li>
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/affequipe.php">Affichage des équipes</a></li>
				    </ul>
			    </li>
		    </ul>
      </nav>
    </div>
  <div class="center">
    <h1>Création équipe</h1>
    <form action="creaequipe.php" method="get">
      <div class="texte">
        <input type="text" name="nomequip" maxlength ="7" required>
        <span></span>
        <label for="nomequip">Nom de l'équipe</label>
      </div>
      <div class="texte">
        <input type="number" name="nbplace" min="1" max="7" required>
        <span></span>
        <label for="nbplace">Nombre de participants</label>
      </div>
      <div id="app">
        <div class="texte">
          <input v-model="trajet" type="number" name="nbtrajet" min="1" max="5" required>
          <span></span>
          <label for ="nbtrajet">Nombre de trajets</label>
        </div>
        
        <div class="texte" v-if="trajet > 0 ">
    
          <input type="text" name="trajet1"     required>
          <span></span>
          <label for ="trajet1">Trajet n°1</label>
    
        </div>
        <div class="texte" v-if="trajet > 1">
    
          <input type="text" name="trajet2" required>
          <span></span>
          <label for ="trajet2">Trajet n°2</label>
    
        </div>
    
        <div class="texte" v-if="trajet > 2">
    
          <input type="text" name="trajet3" required>
          <span></span>
          <label for ="trajet3">Trajet n°3</label>
    
        </div>

        <div class="texte" v-if="trajet > 3">
    
          <input type="text" name="trajet4" required>
          <span></span>
          <label for ="trajet4">Trajet n°4</label>
    
        </div>

        <div class="texte" v-if="trajet > 4">
    
          <input type="text" name="trajet5" required>
          <span></span>
          <label for ="trajet5">Trajet n°5</label>
    
        </div>

        
      </div>
      <script>
        const app = new Vue({
            el: '#app',
            data: {
                trajet: ''
            }
        })
      </script>
      <input type="submit" value="Confirmer">
    </form>
  </div>
  <?php
  
  if (
  (!empty($_GET['nbplace']))
  && (!empty($_GET['nbtrajet']))
  && (!empty($_GET['nomequip']))
  ){

      $session =  $_SESSION['nom'];
      $nbplace = $_GET['nbplace'];
      $nbtrajet = $_GET['nbtrajet'];
      $nomequip = $_GET['nomequip'];

      if(!empty($_GET['trajet1'])){
        $nomtrajet1 = $_GET['trajet1'];
        $trajet1 = 1;
      }else{
        $trajet1 = 0;
      }

      if(!empty($_GET['trajet2'])){
        $nomtrajet2 = $_GET['trajet2'];
        $trajet2 = 2;
      }else{
        $trajet2 = 0;
      }

      if(!empty($_GET['trajet3'])){
        $nomtrajet3 = $_GET['trajet3'];
        $trajet3 = 3;
      }else{
        $trajet3 = 0;
      }

      if(!empty($_GET['trajet4'])){
        $nomtrajet4 = $_GET['trajet4'];
        $trajet4 = 4;
      }else{
        $trajet4 = 0;
      }

      if(!empty($_GET['trajet5'])){
        $nomtrajet5 = $_GET['trajet5'];
        $trajet5 = 5;
      }else{
        $trajet5 = 0;
      }

      $etu = array();
      for($i = 1 ; $i < 7 ; $i++){
        if($nbplace > $i){
          $etu[$i] = 2;
        }
        else{
          $etu[$i] = 0;
        }
      }
      if($trajet1 == 1){
        $sql=mysqli_query($ct,"INSERT INTO  trajet
        VALUES (NULL, '$nomtrajet1', '0', '0', '0','0' ,
        '0', '0', '0', '0', '0')");
        $trajet1 = mysqli_insert_id($ct);
        if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));
      }

      if($trajet2 == 2){
        $sql=mysqli_query($ct,"INSERT INTO  trajet
        VALUES (NULL, '$nomtrajet2', '0', '0', '0','0' ,
        '0', '0', '0', '0', '0')");
        $trajet2 = mysqli_insert_id($ct);
        if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));
      }

      if($trajet3 == 3){
        $sql=mysqli_query($ct,"INSERT INTO  trajet
        VALUES (NULL, '$nomtrajet3', '0', '0','0','0' ,
        '0', '0', '0', '0', '0')");
        $trajet3 = mysqli_insert_id($ct);
        if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));
      }

      if($trajet4 == 4){
        $sql=mysqli_query($ct,"INSERT INTO  trajet
        VALUES (NULL, '$nomtrajet4','0', '0','0','0' ,
        '0', '0', '0', '0', '0')");
        $trajet4 = mysqli_insert_id($ct);
        if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));
      }
      if($trajet5 == 5){
        $sql=mysqli_query($ct,"INSERT INTO  trajet
        VALUES (NULL, '$nomtrajet5', '0', '0','0','0' ,
        '0', '0', '0', '0', '0')");
        $trajet5 = mysqli_insert_id($ct);  // Recup de la dernière ID incremente 
        if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));
      }

      $sql=mysqli_query($ct,"INSERT INTO  equipage
      VALUES (NULL, '$nomequip', '0','0', '$nbplace', '$nbtrajet',
      '$session', '$etu[1]', '$etu[2]', '$etu[3]', '$etu[4]', '$etu[5]', '$etu[6]',
      '$trajet1', '$trajet2', '$trajet3', '$trajet4', '$trajet5')");
      $idequipage = mysqli_insert_id($ct); // Recup de la dernière ID incremente 
      if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));

      $sql=mysqli_query($ct,"UPDATE trajet SET idequipage='$idequipage' WHERE numt='$trajet1'");
      if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));

      $sql=mysqli_query($ct,"UPDATE trajet SET idequipage='$idequipage' WHERE numt='$trajet2'");
      if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));

      $sql=mysqli_query($ct,"UPDATE trajet SET idequipage='$idequipage' WHERE numt='$trajet3'");
      if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));

      $sql=mysqli_query($ct,"UPDATE trajet SET idequipage='$idequipage' WHERE numt='$trajet4'");
      if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));

      $sql=mysqli_query($ct,"UPDATE trajet SET idequipage='$idequipage' WHERE numt='$trajet5'");
      if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));
      
      $sql=mysqli_query($ct,"UPDATE etudiant SET idequipage='$idequipage' WHERE nom='$session'");
      if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));
  }
  ?>
  </body>
  </html>