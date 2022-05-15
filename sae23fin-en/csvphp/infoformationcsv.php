<?php
    // Initialiser la session
    session_start();
    require('config.php');
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
      header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/connexion.php");
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
    $csvFile = 'https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/csv/infoformation.csv';
    $csv = csvToArray($csvFile);
     
    //render the array with print_r
    echo '<pre>';
    print_r($csv);
    echo '</pre>';
    

    $sql = mysqli_query($conn,"TRUNCATE  infoformation");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));

    
    for( $i=1 ; $i <= 4 ; $i++  ){
    
    $j = 0;
    $idf = $csv[$i][$j] ;
    $formation = $csv[$i][$j+1] ; 
    $groupe = $csv[$i][$j+2] ;
    $sousgroupe =  $csv[$i][$j+3] ;
    $annee =  $csv[$i][$j+4] ;

    $sql = mysqli_query($conn,"INSERT INTO  infoformation
    VALUES ('$idf', '$formation', '$groupe', '$sousgroupe', '$annee')");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));
    }
        
    

    header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin-en/index.php");
?>