<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/favicon.png"/>
    <link rel="stylesheet" href="index.css">
    <title>Acceuil</title>
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
    $nom = $_SESSION['nom'];
    }
    
  	?>
    <div class="banner">
      <nav class="navbar">
        <img class="logo" src="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/logo.png" alt="Logo-du-site">
        <ul>
          <li class="trajet"><a href="horaire.php">Horaire</a></li>
        </ul>
				<ul>
      <?php 
      $nom = $_SESSION['nom'];
      if($nom == "admin"){
      echo 
      "<li class=\"menu\"><a href=\"#\"> Insertion csv </a>
				<ul class=\"submenu\">
					<li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csvphp/comptecsv.php\">Compte</a></li>
          <li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csvphp/dispvehiculecsv.php\">Disponibilité véhicule</a></li>
					<li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csvphp/edtcsv.php\">Emploi du temps</a></li>
          <li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csvphp/etudiantcsv.php\">Etudiant</a></li>
          <li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csvphp/vehiculecsv.php\">Vehicule</a></li>
				</ul>
			</li>";
      }

      ?>
			<li class="menu"><a href="#"> <?php echo  $_SESSION["nom"] ; ?></a>
				<ul class="submenu">
					<li><a href="profil.php">Mon Profil</a></li>
          <li><a href="mdp.php">Changer de mot de passe</a></li>
					<li><a href="connexion.php">Changer de compte</a></li>
				</ul>
			</li>
			<li class="equipe"><a href="#">Equipe</a>
				<ul class="subequipe">
					<li><a href="equipe/visuequipe.php">Mes  équipes </a></li>
					<li><a href= "equipe/creaequipe.php">Créer une équipe</a></li>
					<li><a href="equipe/affequipe.php">Affichage des équipes</a></li>
					
				</ul>
			</li>
		</ul>
      </nav>
    </div>
    <div class="contenu">
      <h1>Bienvenue sur Covoit'Udiant</h1>
      <h3>Covoit'Udiant un jour, <br>Covoit'Udiant toujours</h3>
    </div>
	
		<h2>Notre fil d'actualité</h2>
		<div class="twitter" >
			<a class="twitter-timeline" href="https://twitter.com/Covoitudiant?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" 
			charset="utf-8"></script>
	
	</div>
  </body>
</html>
