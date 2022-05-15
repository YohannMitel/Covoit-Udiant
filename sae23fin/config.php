<?php
$localhost = "localhost";
$user = "ymitel";
$pwd = "clementbenzema";
$database = "ymitel_02";
// Check connection
$conn = new mysqli($localhost, $user, $pwd, $database);
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>