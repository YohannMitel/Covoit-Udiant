<?php
// Initialiser la session
session_start();
require('config2.php');
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["nom"])){
  header("Location: ../connexion.php");
  exit(); 
}

$idequipe = $_GET['idequipage'];
$numt = $_GET['numt'];
$result=mysqli_query($ct,"SELECT * FROM equipage WHERE idequipage='$idequipe'");
$row=mysqli_fetch_assoc($result);
$trajet1 = $row['trajet1'];
$trajet2 = $row['trajet2'];
$trajet3 = $row['trajet3'];
$trajet4 = $row['trajet4'];
$trajet5 = $row['trajet5'];


if($trajet1 === $numt){
    $sql=mysqli_query($ct,"UPDATE trajet SET etat='0' WHERE numt='$numt'");
    $sql=mysqli_query($ct,"UPDATE trajet SET lieudomicile='0' WHERE numt='$numt'");
    $sql=mysqli_query($ct,"UPDATE trajet SET lieutravail='0' WHERE numt='$numt'");
    $sql=mysqli_query($ct,"UPDATE trajet SET hd='0' WHERE numt='$numt'");
    $sql=mysqli_query($ct,"UPDATE trajet SET ha='0' WHERE numt='$numt'");
    $sql=mysqli_query($ct,"UPDATE trajet SET date='0' WHERE numt='$numt'");
    $sql=mysqli_query($ct,"UPDATE trajet SET typetrajet='0' WHERE numt='$numt'");

}else{
    if($trajet2 === $numt){
        $sql=mysqli_query($ct,"UPDATE trajet SET etat='0' WHERE numt='$numt'");
        $sql=mysqli_query($ct,"UPDATE trajet SET lieudomicile='0' WHERE numt='$numt'");
        $sql=mysqli_query($ct,"UPDATE trajet SET lieutravail='0' WHERE numt='$numt'");
        $sql=mysqli_query($ct,"UPDATE trajet SET hd='0' WHERE numt='$numt'");
        $sql=mysqli_query($ct,"UPDATE trajet SET ha='0' WHERE numt='$numt'");
        $sql=mysqli_query($ct,"UPDATE trajet SET date='0' WHERE numt='$numt'");
        $sql=mysqli_query($ct,"UPDATE trajet SET typetrajet='0' WHERE numt='$numt'");

    }else{
        if($trajet3 === $numt){
            $sql=mysqli_query($ct,"UPDATE trajet SET etat='0' WHERE numt='$numt'");
            $sql=mysqli_query($ct,"UPDATE trajet SET lieudomicile='0' WHERE numt='$numt'");
            $sql=mysqli_query($ct,"UPDATE trajet SET lieutravail='0' WHERE numt='$numt'");
            $sql=mysqli_query($ct,"UPDATE trajet SET hd='0' WHERE numt='$numt'");
            $sql=mysqli_query($ct,"UPDATE trajet SET ha='0' WHERE numt='$numt'");
            $sql=mysqli_query($ct,"UPDATE trajet SET date='0' WHERE numt='$numt'");
            $sql=mysqli_query($ct,"UPDATE trajet SET typetrajet='0' WHERE numt='$numt'");

        }else{
            if($trajet4 === $numt){
                $sql=mysqli_query($ct,"UPDATE trajet SET etat='0' WHERE numt='$numt'");
                $sql=mysqli_query($ct,"UPDATE trajet SET lieudomicile='0' WHERE numt='$numt'");
                $sql=mysqli_query($ct,"UPDATE trajet SET lieutravail='0' WHERE numt='$numt'");
                $sql=mysqli_query($ct,"UPDATE trajet SET hd='0' WHERE numt='$numt'");
                $sql=mysqli_query($ct,"UPDATE trajet SET ha='0' WHERE numt='$numt'");
                $sql=mysqli_query($ct,"UPDATE trajet SET date='0' WHERE numt='$numt'");
                $sql=mysqli_query($ct,"UPDATE trajet SET typetrajet='0' WHERE numt='$numt'");

            }else{
                if($trajet5 === $numt){
                    $sql=mysqli_query($ct,"UPDATE trajet SET etat='0' WHERE numt='$numt'");
                    $sql=mysqli_query($ct,"UPDATE trajet SET lieudomicile='0' WHERE numt='$numt'");
                    $sql=mysqli_query($ct,"UPDATE trajet SET lieutravail='0' WHERE numt='$numt'");
                    $sql=mysqli_query($ct,"UPDATE trajet SET hd='0' WHERE numt='$numt'");
                    $sql=mysqli_query($ct,"UPDATE trajet SET ha='0' WHERE numt='$numt'");
                    $sql=mysqli_query($ct,"UPDATE trajet SET date='0' WHERE numt='$numt'");
                    $sql=mysqli_query($ct,"UPDATE trajet SET typetrajet='0' WHERE numt='$numt'");
                }
            }
        }
    }
}

header("Location: visuequipe.php")
?>