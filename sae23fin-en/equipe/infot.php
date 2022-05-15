<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/favicon.png"/>
    <link rel="stylesheet" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/profil.css">
    <title>Route info</title>
  </head>
  <body>
  <?php
    // Initialiser la session
    session_start();
    require('config.php');
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
      header("Location: connexion.php");
      exit(); 
    }
  
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
			    <li class="equipe"><a href="#">Equipe</a>
				    <ul class="subequipe">
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/equipe/visuequipe.php">My crews</a></li>
              <li><a href= "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/equipe/creaequipe.php">Create a crew</a></li>
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/equipe/affequipe.php">Display of crew</a></li>
				    </ul>
			    </li>
		    </ul>
      </nav>
    </div>
	  <div class="center">
      <?php 
        $noms = $_SESSION["nom"];
        // TABLE TRAJET
        $numt = $_GET['numt'];
        $result = mysqli_query($conn,"SELECT * FROM trajet WHERE numt='$numt'");
        $row=mysqli_fetch_assoc($result);
        $nom = $row['nom'];
        $immatriculation = $row['immatriculation'];
        if($immatriculation == "0"){
            $immatriculation = "No car defined for this route";
        }
        $depart = $row['lieudomicile'];
        $arrive = $row['lieutravail'];
        $date = $row['date'];
        $typetrajet = $row['typetrajet'];
        if($typetrajet == "A"){
            $typetrajet = "Go";
        }
        if($typetrajet == "R"){
            $typetrajet = "Return";
        }
        if($typetrajet == "AR"){
            $typetrajet = "Go & Return";
        }
        $hd = $row['hd'];
        $ha = $row['ha'];

        //TABLE DISPVEHICULE
        $result = mysqli_query($conn,"SELECT * FROM dispvehicule WHERE immatriculation='$immatriculation'");
        $row=mysqli_fetch_assoc($result);
        $idcompte = $row['idcompte'];
        $nbplace = $row['nbplacereelles'];

        

        // TABLE ETUDIANT 
        $result = mysqli_query($conn,"SELECT * FROM etudiant WHERE idcompte='$idcompte'");
        $row=mysqli_fetch_assoc($result);
        $nompv = $row['nom'];
        $email = $row['email'];

        $result = mysqli_query($conn,"SELECT * FROM etudiant WHERE nom='$noms'");
        $row=mysqli_fetch_assoc($result);
        $idcomptesession = $row['idcompte'];


        // TABLE DISPVEHICULE

        $result = mysqli_query($conn,"SELECT * FROM dispvehicule WHERE idcompte='$idcomptesession'");
        $row=mysqli_fetch_assoc($result);
        $immatriculationsession = $row['immatriculation'];


        $lien = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/equipe/conducteur.php?numt=". $numt;
        echo "
        <h3>Route information</h3>
        <h4> Name : ".$nom ."</h4>
        <h4>Car registration of : ". "<a href=". "\"mailto:" . $email . "\"" . ">" . $nompv ."</a>" . " : ". $immatriculation . " </h4>";
        if($immatriculation !== "No car defined for this route" ){
            echo "<h4>Number of seats in the vehicle :" . $nbplace . "</h4>"; 
        }
        if($immatriculationsession !== "0"){
            echo " <h4> <button onclick=\"window.location.href = '$lien';\">I drive !</button>". "</h4>";
        }
        echo " <h4> Place of departure : ". $depart ." </h4>
        <h4>Place of arrival : ". $arrive ."</h4>";
        echo "<h4>Date of travel : ". $date ."</h4>";
        echo "<h4>Type of journey : ". $typetrajet ."</h4>";
        echo "<h4>Departure time : ". $hd ."</h4>";
        echo "<h4>Arrival time : ". $ha ."</h4>";
      ?>
    </div>
  </body>
</html>