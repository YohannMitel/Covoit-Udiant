<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <title>Mes equipes</title>
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

// iniatilisation des variables 
    $impossible = "<img src=\"https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin/img/impossible.png\" alt=\"img-croix-rouge\">" ;
    $val = "0";
    $nomsession =  $_SESSION['nom'];
    echo "<div class=";
    echo "scroll-bg";
    echo ">";
    echo "<h1> Mes équipes </h1>";
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
    <th>Supprimer</th>
    <th>Poster</th>
    <th>Nom</th>
    <th>Chef d'équipe</th>
    <th>     Etudiant 1     </th>
    <th>     Etudiant 2     </th>
    <th>     Etudiant 3     </th>
    <th>     Etudiant 4     </th>
    <th>     Etudiant 5     </th>
    <th>     Etudiant 6     </th>
    <th>" . "     trajet-1     " . "</th>
    <th>" . "     trajet-2     " . "</th>
    <th>" . "     trajet-3     " . "</th>
    <th>" . "     trajet-4     " . "</th>
    <th>" . "     trajet-5     " . "</th>
    </tr>";
    
    if($nomsession == "admin"){
        $result = mysqli_query($conn,"SELECT * FROM equipage ");
    }else{
    $result = mysqli_query($conn,"SELECT * FROM equipage WHERE etu1='$nomsession' 
    OR etu2='$nomsession' 
    OR etu3='$nomsession'
    OR etu4='$nomsession'
    OR etu5='$nomsession'
    OR etu6='$nomsession'
    OR etu7='$nomsession'");
    }
    while($row= mysqli_fetch_array($result))
    {   
        $numt = array();
        $numt[0] = $row['trajet1'];
        $numt[1] = $row['trajet2'];
        $numt[2] = $row['trajet3'];
        $numt[3]= $row['trajet4'];
        $numt[4] = $row['trajet5'];
        $etu = array();
        $etu[0] = $row['etu1'];
        $etu[1] = $row['etu2'];
        $etu[2] = $row['etu3'];
        $etu[3] = $row['etu4'];
        $etu[4] = $row['etu5'];
        $etu[5] = $row['etu6'];
        $etu[6] = $row['etu7'];
        $nomquipe = $row['nom'];
        $etat = $row['etat'];
        $idequipe = $row['idequipage'];
        $maxp = $row['maxp'];
        $prestante = 0;

        $lien = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/del.php?idequipage=".$idequipe;
        echo "<tr>";
        echo "<td> <a href=".$lien.">X</a></td>";
        $lien = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/post.php?idequipage=".$idequipe;
        
        echo "<td>";
        if ($etat == "1" ){
            echo "Posté ! " ;
        }elseif($etat == "2"){
            echo "Nbr-etu-max" ;
        }else{
            echo  "<a href=".$lien.">X</a>";
        }
        echo "</td>";

        
        
        echo "<td>" ;
        echo $nomquipe ; 
        echo "</td>";
        $tresult=mysqli_query($conn,"SELECT * FROM etudiant WHERE nom='$etu[0]'");
        $trow=mysqli_fetch_assoc($tresult);

        echo "<td>" ;
        echo "<a href=". "\"mailto:" . $trow['email'] . "\"" . ">" . $etu[0] ."</a>" ; 
        echo "</td>";

        
        for($i = 1 ; $i < 7; $i++  ){
            $lien = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/exclure.php?idequipage=".$idequipe."&"."nom=". $etu[$i];
            $tresult = mysqli_query($conn,"SELECT * FROM etudiant WHERE nom ='$etu[$i]'");
            $trow=mysqli_fetch_assoc ($tresult);
            echo "<td>" ;
            if(($etu[$i]) == $val ){ echo "$impossible" ;   }elseif(($etu[$i]) == "2"){  echo "Libre" ;  $prestante++;
            }else{ if(($nomsession == $etu[0]) || ($nomsession == "admin")){ echo "<button onclick=\"window.location.href = '$lien';\">Exclure</button>" ;
            }echo "<a href=". "\"mailto:" . $trow['email'] . "\""  . ">" . $etu[$i] ."</a>" ; } 
            echo "</td>";

        }   

        if($prestante == "0"){
            $sql=mysqli_query($conn,"UPDATE equipage SET etat='2' WHERE idequipage='$idequipe'");
            if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));
        }elseif($etat == "2"){
            $sql=mysqli_query($conn,"UPDATE equipage SET etat='1' WHERE idequipage='$idequipe'");
            if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));
        }

         
        for($i = 0 ; $i < 5 ; $i ++){
            if ($numt[$i] !== "0" ){
                $tresult = mysqli_query($conn,"SELECT * FROM trajet WHERE numt='$numt[$i]'");
                $trow=mysqli_fetch_assoc ($tresult);
                $vnumt = $trow['numt'];
                $nomt = $trow['nom'];
                $etatt = $trow['etat'];
                $lien1 = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/supprtrajet.php?idequipage=".$idequipe."&"."numt=". $vnumt;
                $lien2 = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/infot.php?numt=" . $vnumt;
                $lien3 = "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/trajet.php?nomtrajet=". $nomt . "&". "numt=" .  $vnumt;
            }
            

            echo "<td>" ;
            if(($numt[$i] == $vnumt) && ($numt[$i] !== "0") && ($etatt == "0")){ 
            echo "<a href=" . "https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/trajet.php?nomtrajet=". $nomt ."&". "numt=" .  
            $numt[$i] .">" . "Création du trajet" .  "</a>"  . "</td>";
            }elseif(($numt[$i] == $vnumt) && ($numt[$i] !== "0") && ($etatt == "1") ){
            if(($nomsession == $etu[0]) || ($nomsession == "admin")){ echo "<button onclick=\"window.location.href = '$lien1';\">Supprimer</button>" ; }
            echo "<button onclick=\"window.location.href = '$lien3';\">Modification</button>" ;
            echo "<button onclick=\"window.location.href = '$lien2';\">Info trajet</button> "  . "</td>";
            }elseif(($numt[$i] == $vnumt) && ($numt[$i] !== "0") && ($etatt == "0")){
                echo "En attente de création";
            }else{
                echo "  $impossible" . "</td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    mysqli_close($conn);

?>
</body>
</html>
