<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/favicon.png"/>
    <link rel="stylesheet" href="profil.css">
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
    $nom = $_SESSION["nom"];
  ?>
  <div class="banner">
      <nav class="navbar">
        <img class="logo" src="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/logo.png" alt="">
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
      <?php 
      // TABLE ETUDIANT
      $result1 = mysqli_query($conn,"SELECT * FROM etudiant WHERE nom='$nom'");
      $row1=mysqli_fetch_assoc($result1);
      $prenom = $row1['prenom'];
      $idcompte = $row1['idcompte'];
      $lieudomicile = $row1['domicile'];
      $permis = $row1['permis'];
      $nombrepoints = $row1['nombrepoints'];
      $idf = $row1['idf'];

      // TABLE DISPONIBILITE VEHICULE
      $result2 = mysqli_query($conn,"SELECT * FROM dispvehicule WHERE idcompte='$idcompte'");
      $row2=mysqli_fetch_assoc($result2);
      $immatriculation = $row2['immatriculation'];
      $nbplacedispo = $row2['disponible'];

      // TABLE VEHICULE
      $result3 = mysqli_query($conn,"SELECT * FROM vehicule WHERE immatriculation='$immatriculation'");
      $row3=mysqli_fetch_assoc($result3);
      $type = $row3['type'];
      $cartegrise = $row3['cartegrise'];
      $controtechnique = $row3['controletechnique'];
      $assurance = $row3['assurance'];

      // TABLE INFO FORMATION
      $result4 = mysqli_query($conn,"SELECT * FROM infoformation WHERE idf='$idf'");
      $row4=mysqli_fetch_assoc($result4);
      $formation = $row4['formation'];
      $groupe = $row4['groupe'];
      $sousgroupe = $row4['sousgroupe'];
      $annee = $row4['annee'];

      // TABLE HORAIRE
      $result5 = mysqli_query($conn,"SELECT * FROM edt WHERE idf='$idf'");
      $row5=mysqli_fetch_assoc($result5);
      $jour =$row5['jour'];
      $dd = $row5['dd'];
      $df = $row5['df'];
      
      echo "<h1>Profil de : ".$nom ."</h1>
      <h3>Informations personnelles</h3>
      <h4> Nom : ".$nom .", Prénom :". $prenom."</h4>
      <h4>Identifiants : ". $idcompte ." </h4>
      <h4>Domicile : ". $lieudomicile ." </h4>
      <h4>Information sur votre voiture</h4>";
      
      if($permis !=="0"){
        echo "<h4>Immatriculation :".$immatriculation."</h4>";
        echo "<h4>Carte grise :".$cartegrise."</h4>";
        echo "<h4>Assurance :".$assurance."</h4>";
        echo "<h4>Contrôle technique :".$controtechnique."</h4>";
        echo "<h4>Nombre de place disponible :".$nbplacedispo."</h4>";
      }
      ?>
      <br>
      <h3>Informations universitaire</h3>
      <?php
        echo "<h4>Formation :".$formation."</h4>";
        echo "<h4>Groupe :".$groupe."</h4>";
        echo "<h4>Sous-groupe :".$sousgroupe."</h4>";
        echo "<h4>Année :".$annee."</h4>";
      ?>
    </div>
  </body>
</html>