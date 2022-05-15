<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/favicon.png"/>
    <link rel="stylesheet" href="mdp.css">
    <title>Change password</title>
    <link rel="shortcut icon" type="image/png" href="favicon.png"/>
  </head>
  <body>
  <?php
    require('config.php');
    session_start();
    echo $_SESSION['nom'];
    $session =  $_SESSION['nom'];
            $e1 = 0 ;
            $e2 = 0;
            $e3 = 0;
            $e4 = 0;
    if ((!empty($_POST['mdp']))
    && (!empty($_POST['nmdp']))
    && (!empty($_POST['rnmdp']))
     ){ //isset variable existe mais a une valeur vide


        $mdp = $_POST['mdp'];

        $nmdp = $_POST['nmdp'];

        $rnmdp = $_POST['rnmdp'];

        $results = mysqli_query($conn,"SELECT mdp
        FROM compte 
        WHERE  nom>='$session'");
 
        $row=mysqli_fetch_assoc ($results);
        $rowval = $row['mdp'];


        if(  $rowval == $mdp ){
            if(  $nmdp == $rnmdp  ){
            $sql= "UPDATE compte SET mdp= '$rnmdp' WHERE nom = '$session'";
            
            if ($conn->query($sql) === TRUE) {
                $e1 = 1;
            } else {
                $e2 = 2;
            }
            $conn->close();
            }else{
                $e3 = 3;
            }
        } else {

            $e4 = 4;
        }
    }
    ?>
    <div class="center">
      <h1> Change password</h1>
    <form action="mdp.php" method="post">
      <div class="texte">
        <input type="password" name="mdp" required>
        <span></span>
        <label for="mdp">Old password</label>
      </div>
      <div class="texte">
        <input type="password" name="nmdp" required>
        <span></span>
        <label for = "nmdp">New password</label>
      </div>
      <div class="texte">
        <input type="password" name="rnmdp"required>
        <span></span>
        <label for="rnmdp ">Repeat the new password</label>
      </div>
      <p>
          <?php
            $e1 ;
            $e2 ;
            $e3 ;
            $e4 ;
            if($e1 == 1){
                echo "Update successfully";
            }
            if($e2 == 2){
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            if($e3 == 3){
                echo "The two passwords do not match";
            }
            if($e4 == 4){
                echo "The old password is not correct";
            }
          ?>
      </p>
    <input type="submit" value="Submit"  onclick=window.location.href='index.php'>
    <button type="button" name="button" onclick=window.location.href='index.php'>Return to home</button>
    </div>
    </form>
  </body>
</html>