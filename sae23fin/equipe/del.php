<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
</head>
<body>
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
$etat = $row['etat'];

if(($nom === $etu1) || ($nom == "admin")){
	$sql = mysqli_query($ct,"DELETE FROM equipage WHERE idequipage= '$idequipe'");
}else{
	if($etu2 === $nom){
		$sql=mysqli_query($ct,"UPDATE equipage SET etu2='1' WHERE idequipage='$idequipe'");
	}else{
		if($etu3 === $nom){
			$sql=mysqli_query($ct,"UPDATE equipage SET etu3='2' WHERE idequipage='$idequipe'");
		}else{
			if($etu4 === $nom){
				$sql=mysqli_query($ct,"UPDATE equipage SET etu4='3' WHERE idequipage='$idequipe'");
			}else{
				if($etu5 === $nom){
					$sql=mysqli_query($ct,"UPDATE equipage SET etu5='4' WHERE idequipage='$idequipe'");
				}else{
					if($etu6 === $nom){
						$sql=mysqli_query($ct,"UPDATE equipage SET etu6='5' WHERE idequipage='$idequipe'");
					}else{
						if($etu7 === $nom){
							$sql=mysqli_query($ct,"UPDATE equipage SET etu7='6' WHERE idequipage='$idequipe'");
						}
					}
				}
			}
		}
	}
}
if($etat == "2"){
	$sql=mysqli_query($ct,"UPDATE equipage SET etat='1' WHERE idequipage='$idequipe'");
}





header("Location: visuequipe.php")
?>
</form>
</body>
</html>
