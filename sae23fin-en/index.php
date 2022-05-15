<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
	  <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/favicon.png"/>
    <link rel="stylesheet" href="index.css">
    <title>Home</title>
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
        <img class="logo" src="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/logo.png" alt="Logo">
        <ul>
          <li class="trajet"><a href="horaire.php">Schedule</a></li>
        </ul>
				<ul>
      <?php 
      $nom = $_SESSION['nom'];
      if($nom == "admin"){
      echo 
      "<li class=\"menu\"><a href=\"#\">Insert csv </a>
				<ul class=\"submenu\">
					<li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/csvphp/comptecsv.php\">Account</a></li>
          <li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/csvphp/dispvehiculecsv.php\"> Vehicle availability</a></li>
					<li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/csvphp/edtcsv.php\">Schedule</a></li>
          <li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/csvphp/etudiantcsv.php\">Student</a></li>
          <li><a href=\"https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/csvphp/vehiculecsv.php\">Vehicle</a></li>
				</ul>
			</li>";
      }

      ?>
			<li class="menu"><a href="#"> <?php echo  $_SESSION["nom"] ; ?></a>
				<ul class="submenu">
					<li><a href="profil.php">My profile page</a></li>
          <li><a href="mdp.php">Change password</a></li>
					<li><a href="connexion.php">Change account</a></li>
				</ul>
			</li>
			<li class="equipe"><a href="#">Crew</a>
				<ul class="subequipe">
					<li><a href="equipe/visuequipe.php">My crews</a></li>
					<li><a href= "equipe/creaequipe.php">Create a crew</a></li>
					<li><a href="equipe/affequipe.php">Display of crews</a></li>
					
				</ul>
			</li>
		</ul>
      </nav>
    </div>
    <div class="contenu">
      <h1>Welcome to Student Carpool</h1>
      <h3>Once a Carpooler, <br> Always a Carpooler</h3>
    </div>
	
		<h2>News feed</h2>
		<div class="twitter" >
			<a class="twitter-timeline" href="https://twitter.com/Covoitudiant?ref_src=twsrc%5Etfw"></a> <script async src="https://platform.twitter.com/widgets.js" 
			charset="utf-8"></script>
	
	</div>
  </body>
</html>
