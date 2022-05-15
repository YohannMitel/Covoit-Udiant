<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/favicon.png"/>
    <link rel="stylesheet" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/profil.css">
    <title>Mon Profil</title>
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
        <img class="logo" src="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/logo.png" alt="Logo-du-site">
        <ul>
          <li class="trajet"><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/horaire.php">Horaires</a></li>
        </ul>
        <ul>
          <li class="accueil"><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/index.php">Accueil</a></li>
        </ul>
				<ul>
			    <li class="equipe"><a href="#">Equipe</a>
				    <ul class="subequipe">
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/visuequipe.php">Mes équipes </a></li>
              <li><a href= "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/creaequipe.php">Créer une équipe</a></li>
					    <li><a href="https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/affequipe.php">Affichage une équipe</a></li>
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
            $immatriculation = "Aucune voiture défini pour ce trajet ";
        }
        $depart = $row['lieudomicile'];
        $arrive = $row['lieutravail'];
        $date = $row['date'];
        $typetrajet = $row['typetrajet'];
        if($typetrajet == "A"){
            $typetrajet = "Aller";
        }
        if($typetrajet == "R"){
            $typetrajet = "Retour";
        }
        if($typetrajet == "AR"){
            $typetrajet = "Aller & retour";
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


        $lien = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/conducteur.php?numt=". $numt;
        echo "
        <h3>Informations trajet</h3>
        <h4> Nom : ".$nom ."</h4>
        <h4>Immatriculation voiture de ". "<a href=". "\"mailto:" . $email . "\"" . ">" . $nompv ."</a>" . " : ". $immatriculation . " </h4>";
        if($immatriculation !== "Aucune voiture défini pour ce trajet " ){
            echo "<h4>Nombre places du véhicule :" . $nbplace . "</h4>"; 
        }
        if($immatriculationsession !== "0"){
            echo " <h4> <button onclick=\"window.location.href = '$lien';\">Je conduis !</button>". "</h4>";
        }
        echo " <h4> Lieu de départ : ". $depart ." </h4>
        <h4>Lieu d'arrivé : ". $arrive ."</h4>";
        echo "<h4>Date du trajet : ". $date ."</h4>";
        echo "<h4>Type de trajet : ". $typetrajet ."</h4>";
        echo "<h4>Horaire de départ : ". $hd ."</h4>";
        echo "<h4>Horaire d'arrivé : ". $ha ."</h4>";
      ?>
    </div>
  </body>
</html>