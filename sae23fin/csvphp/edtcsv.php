<?php
    // Initialiser la session
    session_start();
    require('config.php');
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if(!isset($_SESSION["nom"])){
      header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/connexion.php/connexion.php");
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
    $csvFile = 'https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/csv/edt.csv';
    $csv = csvToArray($csvFile);
     
    //render the array with print_r
    echo '<pre>';
    print_r($csv);
    echo '</pre>';
    

    $sql = mysqli_query($conn,"TRUNCATE  edt");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));

    
    for( $i=1 ; $i <= 24 ; $i++  ){
    
    $j = 0;
    $jour = $csv[$i][$j] ;
    $dd = $csv[$i][$j+1] ; 
    $dt = $csv[$i][$j+2] ;
    $idf =  $csv[$i][$j+3] ;

    $sql = mysqli_query($conn,"INSERT INTO  edt
    VALUES ('$jour', '$dd', '$dt', '$idf')");
    if ($sql == null) die ("Unable to execute query: " . mysqli_error ($conn));
    }
        
    

    header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/index.php");
?>