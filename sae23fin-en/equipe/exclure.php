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
$nometu = $_GET['nom'];
$result=mysqli_query($ct,"SELECT * FROM equipage WHERE idequipage='$idequipe'");
$row=mysqli_fetch_assoc($result);
$etu1 = $row['etu1'];
$etu2 = $row['etu2'];
$etu3 = $row['etu3'];
$etu4 = $row['etu4'];
$etu5 = $row['etu5'];
$etu6 = $row['etu6'];
$etu7 = $row['etu7'];
$etat = $row['etat'];

if($etu2 === $nometu){
    $sql=mysqli_query($ct,"UPDATE equipage SET etu2='2' WHERE idequipage='$idequipe'");
}else{
    if($etu3 === $nometu){
        $sql=mysqli_query($ct,"UPDATE equipage SET etu3='2' WHERE idequipage='$idequipe'");
    }else{
        if($etu4 === $nometu){
            $sql=mysqli_query($ct,"UPDATE equipage SET etu4='2' WHERE idequipage='$idequipe'");
        }else{
            if($etu5 === $nometu){
                $sql=mysqli_query($ct,"UPDATE equipage SET etu5='2' WHERE idequipage='$idequipe'");
            }else{
                if($etu6 === $nometu){
                    $sql=mysqli_query($ct,"UPDATE equipage SET etu6='2' WHERE idequipage='$idequipe'");
                }else{
                    if($etu7 === $nometu){
                        $sql=mysqli_query($ct,"UPDATE equipage SET etu7='2' WHERE idequipage='$idequipe'");
                    }
                }
            }
        }
    }
}

header("Location: visuequipe.php")
?>