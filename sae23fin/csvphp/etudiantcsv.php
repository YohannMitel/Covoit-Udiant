<?php
    // Initialiser la session
    session_start();
    require('config.php');
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
      header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/connexion.php");
      exit(); 
    $nom = $_SESSION['nom'];
    }
    
    
    function csvToArray($csvFile){
     
        $file_to_read = fopen($csvFile, 'r');
     
        while (!feof($file_to_read) ) {
            $lines[] = fgetcsv($file_to_read, 1000, ';');
     
        }
     
        fclose($file_to_read);
        return $lines;
    }
     
    //read the csv file into an array
    $csvFile = 'https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csv/etudiant.csv';
    $csv = csvToArray($csvFile);
     
    //render the array with print_r
    echo '<pre>';
    print_r($csv);
    echo '</pre>';
    

    $sql = mysqli_query($conn,"TRUNCATE  etudiant");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));

    
    for( $i=1 ; $i <= 10 ; $i++  ){
    
    $j = 0;
    $idcompte = $csv[$i][$j] ;
    $email = $csv[$i][$j+1] ; 
    $domicile = $csv[$i][$j+2] ;
    $nom =  $csv[$i][$j+3] ;
    $prenom =  $csv[$i][$j+4] ;
    $daten =  $csv[$i][$j+5] ;
    $idf =  $csv[$i][$j+6] ;
    $permis =  $csv[$i][$j+7] ;
    $nombrepoints =  $csv[$i][$j+8] ;
    $idequipage =  $csv[$i][$j+9] ;

    $sql = mysqli_query($conn,"INSERT INTO  etudiant
    VALUES ('$idcompte', '$email', '$domicile', '$nom', '$prenom', '$daten', '$idf', '$permis', '$nombrepoints', '$idequipage')");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));
    }
        
    

    header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/index.php");
?>