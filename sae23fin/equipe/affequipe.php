<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <title>Affichage des équipes</title>
  <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/favicon.png"/>
  <link rel="stylesheet" href="visue.css">
</head>
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
<?php
    // Initialiser la session
    session_start();
    require('config.php');
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
    header("Location: ../connexion.php");
    exit(); 
    }

    
    $session =  $_SESSION['nom'];
    
    echo "<div class=";
    echo "scroll-bg";
    echo ">";
    echo "<h1> Affichage des équipes </h1>";
    echo "<div class=";
    echo "scroll-div";
    echo ">";
    echo "<div class=";
    echo "scroll-object";
    echo ">";
    echo "<div class=";
    echo "table";
    echo ">";
    echo "<table border='1'>";
    echo "
    <tr>
    <th>Rejoindre</th>
    <th>Nom equipe</th>
    <th>Place restante</th>
    <th>Trajet-1</th>
    <th>Trajet-2</th>
    <th>Trajet-3</th>
    <th>Trajet-4</th>
    <th>Trajet-5</th>
    </tr>";
    echo "<tr>";
    $result = mysqli_query($conn,"SELECT * FROM equipage WHERE etat='1' ");
    while($row= mysqli_fetch_array($result))
    {
    $etu7 = 0;
    $etu6 = 0;
    $etu5 = 0;
    $etu4 = 0;
    $etu3 = 0;
    $etu2 = 0;
    $place = 0;


    $result1 = mysqli_query($conn,"SELECT * FROM compte WHERE nom='$session'");
    $row1=mysqli_fetch_assoc ($result1);
    $idcompte= $row1['idcompte'];
    $idequipage = $row ['idequipage'];
    $lien = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/join.php?idequipage=".$idequipage;
    echo "<td> <a href=".$lien.">X</a></td>";

    echo "<td>";
    $result2 = mysqli_query($conn,"SELECT * FROM equipage WHERE idequipage='$idequipage'");
    $row2=mysqli_fetch_assoc($result2);
    $nomequipage = $row2['nom'];
    $trajet1 = $row2['trajet1'];
    $trajet2 = $row2['trajet2'];
    $trajet3 = $row2['trajet3'];
    $trajet4 = $row2['trajet4'];
    $trajet5 = $row2['trajet5'];
    echo $nomequipage;
    echo "</td>";


    echo "<td>";
    $etu7 = $row2['etu7'];
    $etu6 = $row2['etu6'];
    $etu5 = $row2['etu5'];
    $etu4 = $row2['etu4'];
    $etu3 = $row2['etu3'];
    $etu2 = $row2['etu2'];
    $place = 0 ;

    if($etu2 == "2"){
        $place++;
    }


    if($etu3 == "2"){
        $place++;
    }

    if($etu4 == "2"){
        $place++;
    }

    if($etu5 == "2"){
        $place++;
    }

    if($etu6 == "2"){
        $place++;
    }

    if($etu7 == "2"){
        $place++;
    }
    echo $place;
    if ($place == "0"){
        $sql=mysqli_query($conn,"UPDATE equipage SET etat='2' WHERE idequipage='$idequipage'");
    }
    echo "</td>";
    $result3 = mysqli_query($conn,"SELECT * FROM trajet WHERE numt='$trajet1'");
    $row3=mysqli_fetch_assoc($result3);
    $depart = $row3['lieudomicile'];
    $arrive =$row3['lieutravail'];
    $typet = $row3['typetrajet'];

    echo "<td>";
    echo $depart; 
    if($typet == "A"){
        echo "-->";
    }
    if($typet == "R"){
        echo "<--";
    }
    if($typet == "AR"){
        echo "<-->";
    }
    echo $arrive;
    echo "</td>";

    $result4 = mysqli_query($conn,"SELECT * FROM trajet WHERE numt='$trajet2'");
    $row4=mysqli_fetch_assoc($result4);
    $depart = $row4['lieudomicile'];
    $arrive =$row4['lieutravail'];
    $typet = $row4['typetrajet'];

    echo "<td>";
    echo $depart;
    if($typet == "A"){
        echo "-->";
    }
    if($typet == "R"){
        echo "<--";
    }
    if($typet == "AR"){
        echo "<-->";
    }
    echo $arrive;
    echo "</td>";

    
    $result5 = mysqli_query($conn,"SELECT * FROM trajet WHERE numt='$trajet3'");
    $row5=mysqli_fetch_assoc($result5);
    $depart = $row5['lieudomicile'];
    $arrive =$row5['lieutravail'];
    $typet = $row5['typetrajet'];
    echo "<td>";
    if(($depart !== "0") || ($arrive !== "0")){
    echo $depart; 
    if($typet == "A"){
        echo "-->";
    }
    if($typet == "R"){
        echo "<--";
    }
    if($typet == "AR"){
        echo "<-->";
    }
    echo $arrive;
    }
    echo "</td>";

    
    $result6 = mysqli_query($conn,"SELECT * FROM trajet WHERE numt='$trajet4'");
    $row6=mysqli_fetch_assoc($result6);
    $depart = $row6['lieudomicile'];
    $arrive =$row6['lieutravail'];
    $typet = $row6['typetrajet'];
    echo "<td>";
    echo $depart ;
    if($typet == "A"){
        echo "-->";
    }
    if($typet == "R"){
        echo "<--";
    }
    if($typet == "AR"){
        echo "<-->";
    }
    echo $arrive;
    echo "</td>";

    
    $result7 = mysqli_query($conn,"SELECT * FROM trajet WHERE numt='$trajet5'");
    $row7=mysqli_fetch_assoc($result7);
    $depart = $row7['lieudomicile'];
    $arrive =$row7['lieutravail'];
    $typet = $row7['typetrajet'];

    echo "<td>";
    echo $depart;
    if($typet == "A"){
        echo "-->";
    }
    if($typet == "R"){
        echo "<--";
    }
    if($typet == "AR"){
        echo "<-->";
    }
    echo $arrive;
    echo "</td>";

    
    echo "</tr>";
    }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

?>


</body>
</html>
