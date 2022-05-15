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
$nom = $_SESSION['nom'];

$result=mysqli_query($ct,"SELECT * FROM equipage WHERE idequipage='$idequipe'");
$row=mysqli_fetch_assoc($result);
$etu1 = $row['etu1'];
$etu2 = $row['etu2'];
$etu3 = $row['etu3'];
$etu4 = $row['etu4'];
$etu5 = $row['etu5'];
$etu6 = $row['etu6'];
$etu7 = $row['etu7'];

$result=mysqli_query($ct,"SELECT * FROM equipage WHERE idequipage='$idequipe'");
$row=mysqli_fetch_assoc($result);
if($etu1 !== $nom){
    if(($etu2 == "2") && ($etu2 !== $nom)){
        $sql=mysqli_query($ct,"UPDATE equipage SET etu2='$nom' WHERE idequipage='$idequipe'");
    }else{
        if(($etu3 == "2") && ($etu3 !== $nom) && ($etu2 !== $nom) ){
            $sql=mysqli_query($ct,"UPDATE equipage SET etu3='$nom' WHERE idequipage='$idequipe'");
        }else{
            if(($etu4 == "2")  && ($etu4 !== $nom) && ($etu3 !== $nom) && ($etu2 !== $nom) ){
                $sql=mysqli_query($ct,"UPDATE equipage SET etu4='$nom' WHERE idequipage='$idequipe'");
            }else{
                if(($etu5=="2")  && ($etu5 !== $nom) && ($etu4 !== $nom) && ($etu3 !== $nom) && ($etu2 !== $nom) ){
                    $sql=mysqli_query($ct,"UPDATE equipage SET etu5='$nom' WHERE idequipage='$idequipe'");
                }else{
                    if(($etu6 == "2")  && ($etu6 !== $nom) && ($etu5 !== $nom) && ($etu4 !== $nom) && ($etu3 !== $nom) && ($etu2 !== $nom) ){
                        $sql=mysqli_query($ct,"UPDATE equipage SET etu6='$nom' WHERE idequipage='$idequipe'");
                    }else{
                        if(($etu7 == "2")  && ($etu7 !== $nom) && ($etu6 !== $nom) && ($etu5 !== $nom) && ($etu4 !== $nom) && ($etu3 !== $nom) && ($etu2 !== $nom)){
                            $sql=mysqli_query($ct,"UPDATE equipage SET etu7='$nom' WHERE idequipage='$idequipe'");
                        }
                    }
                }
            }
        }
    }
}


header("Location: https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/equipe/affequipe.php");
?>