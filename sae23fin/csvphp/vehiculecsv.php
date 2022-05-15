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
    $csvFile = 'https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csv/vehicule.csv';
    $csv = csvToArray($csvFile);
     
    //render the array with print_r
    echo '<pre>';
    print_r($csv);
    echo '</pre>';
    

    $sql = mysqli_query($conn,"TRUNCATE  vehicule");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));

    
    for( $i=1 ; $i <= 5 ; $i++  ){
    
    $j = 0;
    $immatriculation = $csv[$i][$j] ;
    $type = $csv[$i][$j+1] ; 
    $nbplace = $csv[$i][$j+2] ;
    $cartegrise =  $csv[$i][$j+3] ;
    $controletechnique =  $csv[$i][$j+4] ;
    $assurance =  $csv[$i][$j+5] ;


    $sql = mysqli_query($conn,"INSERT INTO  vehicule
    VALUES ('$immatriculation', '$type', '$nbplace', '$cartegrise', '$controletechnique', '$assurance')");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));
    }
        
    

    header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/index.php");
?>