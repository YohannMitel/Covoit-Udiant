<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>  
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/favicon.png"/>
    <link rel="stylesheet" href="trajet.css">
    <title>Route</title>
  </head>
  <body>
  <?php
    // Initialiser la session
    session_start();
    require('config2.php');
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
      header("Location: ../connexion.php");
      exit(); 
    }
    $nomtrajet = $_GET['nomtrajet'];
    $numt = $_GET['numt'];
  ?>
    <div class="banner">
      <nav class="navbar">
        <img class="logo" src="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/logo.png" alt="Logo">
        <ul>
          <li class="trajet"><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/horaire.php">Schedule</a></li>
        </ul>
        <ul>
          <li class="accueil"><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/index.php">Home</a></li>
        </ul>
				<ul>
			    <li class="equipe"><a href="#">Crew</a>
				    <ul class="subequipe">
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/equipe/visuequipe.php">My crews</a></li>
              <li><a href= "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/equipe/creaequipe.php">Create a crew</a></li>
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/equipe/affequipe.php">Display of crews</a></li>
				    </ul>
			    </li>
		    </ul>
      </nav>
    </div>
  <div class="center">
    <h1>
    <?php
    $result = mysqli_query($ct,"SELECT * FROM trajet WHERE numt='$numt'");
    $row=mysqli_fetch_assoc ($result);
    $etatt = $row['etat'];
    if( $etatt == "0"){
      echo "Creation of the path   :" . $nomtrajet  ; 
    }elseif( $etatt == "1"){
      echo "Modification : " . $nomtrajet  ; 
    }
    
    ?></h1>
    <form action=trajet.php method="get">
      <input type="hidden" name="nomtrajet" value="<?php echo $nomtrajet ?>" >
      <input type="hidden" name="numt" value="<?php echo $numt ?>" >
      <div class="texte">
        <input type="text" name="arrive" required>
        <span></span>
        <label for="arrive">Place of arrival</label>
      </div>
      <div class="texte">
        <input type="date" name="date" required>
        <span></span>
        <label for ="date">Date</label>
      </div>
      <div class="texte">
        <input type="time" name="daller" required>
        <span></span>
        <label for = "daller">Departure time</label>
      </div>
      <div class="texte">
        <input type="time" name="darrive" required>
        <span></span>
        <label for="darrive">Arrival time</label>
      </div>

          <!--<div class="texte">
            <input type="radio" id="A" name="typet" value="A" required>
            <span></span>
            <label for="A">Aller</label>
          </div>
          <div class="texte">
            <input type="radio" id="R" name="typet" value="R" required>
            <span></span>
            <label for="R">Retour</label>
          </div>
          <div class="texte">
            <input type="radio" id="AR" name="typet" value="AR" required>
            <span></span>
            <label for="AR">Aller et retour</label>
          </div> -->
          <div class="texte">

          <select name="typet" id="typet">
              <option value="">--Choose the type of trip--</option>
              <option value="A">Go</option>
              <option value="R">Return</option>
              <option value="AR">Go & Return</option>
          </select>
          </div>
          
      <input type="submit" value="Submit">
      </div>
    </form>

  </div>
  </body>
    <?php
    if (
    (!empty($_GET['arrive']))
    && (!empty($_GET['date']))
    && (!empty($_GET['daller']))
    && (!empty($_GET['darrive']))
    && (!empty($_GET['typet']))
    ){
        $session =  $_SESSION['nom'];
        $depart = mysqli_query($ct,"SELECT domicile
        FROM etudiant 
        WHERE  nom>='$session'");
        $row=mysqli_fetch_assoc ($depart);
        $domicile = $row['domicile'];
        $arrive = $_GET['arrive'];
        $date = $_GET['date'];
        $daller = $_GET['daller'];
        $darrive = $_GET['darrive'];
        $typet = $_GET['typet'];
        $etat =1 ;
        $sql=mysqli_query($ct,"UPDATE trajet 
        SET 
        `lieudomicile` = '$domicile', `lieutravail` = '$arrive', `date` = '$date', `hd` = '$daller', `ha` = '$darrive', `typetrajet` = '$typet', `etat` = '$etat'
        WHERE numt='$numt'");
        if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));

    }
      ?>
</html>