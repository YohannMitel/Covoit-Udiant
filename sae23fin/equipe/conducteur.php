<?php
// Initialiser la session
session_start();
require('config2.php');
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if(!isset($_SESSION["nom"])){
  header("Location: ../connexion.php");
  exit(); 
}

$nom = $_SESSION["nom"];
$numt = $_GET['numt'];

// TABLE ETUDIANT 
$result=mysqli_query($ct,"SELECT * FROM etudiant WHERE nom='$nom'");
$row=mysqli_fetch_assoc($result);
$idcompte = $row['idcompte'];

//TABLE DISPVEHICULE

$result=mysqli_query($ct,"SELECT * FROM dispvehicule WHERE idcompte='$idcompte'");
$row=mysqli_fetch_assoc($result);
$immatriculation = $row['immatriculation'];

$sql=mysqli_query($ct,"UPDATE trajet SET immatriculation='$immatriculation' WHERE numt='$numt'");




header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/~ymitel/sae23fin/equipe/infot.php?numt=".$numt)
?>