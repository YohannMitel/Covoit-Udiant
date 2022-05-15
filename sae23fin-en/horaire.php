<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <title>Schedule</title>
  <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/favicon.png"/>
  <link rel="stylesheet" href="equipe/visue.css">
</head>
<body>
  <div class="banner">
      <nav class="navbar">
        <img class="logo" src="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/logo.png" alt="Logo-du-site">
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
<?php
    // Initialiser la session
    session_start();
    require('config.php');
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
    header("Location: ../connexion.php");
    exit(); 
}

// iniatilisation des variables 

    $nomsession =  $_SESSION['nom'];
    $titre = "Schedule";
    if($nomsession == "admin"){$titre = "Schedule of all studies";}
    echo "<div class=";
    echo "scroll-bg";
    echo ">";
    echo "<h1>". $titre . "</h1>";
    echo "<div class=";
    echo "scroll-div";
    echo ">";
    echo "<div class=";
    echo "scroll-object";
    echo ">";
  

    if($nomsession == "admin"){
      $resultm = mysqli_query($conn,"SELECT MAX(idf) AS nbMax FROM edt");
      $row=mysqli_fetch_assoc ($resultm);
      $max = $row['nbMax'];
    }else{
      $result = mysqli_query($conn,"SELECT * FROM etudiant WHERE nom='$nomsession'");
      $row=mysqli_fetch_assoc ($result);
      $idf = $row['idf'];
      $max = 1;

    }


    
    

    
        for($i = 1 ; $i <= $max ; $i++){
        if($nomsession == "admin"){
          $idf = $i;
        }
        $result2 = mysqli_query($conn,"SELECT * FROM infoformation WHERE idf='$idf' ORDER BY idf ");
        $row2=mysqli_fetch_assoc ($result2);
        $result3 = mysqli_query($conn,"SELECT * FROM edt WHERE idf='$idf'");
        echo "<div class=";
        echo "table";
        echo ">";
        echo "<table border='1'>";
        echo "<CAPTION ALIGN=\"TOP\">".$row2['formation']."-".$row2['sousgroupe']."</CAPTION>";
        echo "
        <tr>
        <th>Date</th>
        <th>Start time</th>
        <th>End time</th>
        </tr>";
        while($row3= mysqli_fetch_array($result3))
        {
        echo "<tr>";
        echo "<td>";
        echo $row3['jour'];
        echo "</td>";
        echo "<td>";
        echo $row3['dd'];
        echo "</td>";
        echo "<td>";
        echo $row3['df'];
        echo "</td>";
        
        echo "</tr>";
        
    }
    echo "</table>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
  
?>


</body>
</html>
