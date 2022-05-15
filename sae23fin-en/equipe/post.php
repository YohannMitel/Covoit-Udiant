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
$result = mysqli_query($cct,"SELECT * FROM equipage WHERE $etat='idequipe'");
$row=mysqli_fetch_assoc($result);
$etat = $row['etat'];

  $sql=mysqli_query($ct,"UPDATE equipage SET etat='1' WHERE idequipage='$idequipe'");
  if ($sql == null) die ("Unable to execute query: " . mysqli_error ($ct));

header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/equipe/visuequipe.php");
?>