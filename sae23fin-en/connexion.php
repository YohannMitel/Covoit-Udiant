<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login page</title>
    <link rel="shortcut icon" type="image/png" href="https://rt-projet.pu-pm.univ-fcomte.fr/users/ymitel/sae23fin-en/img/favicon.png"/>
    <link rel="stylesheet" href="connexion.css">
  </head>
  <body>
    <div class="center">
      <h1>Please log in</h1>
      <form method="post">
        <div class="texte">
          <input type="text" name="nom" required>
          <span></span>
          <label for="nom">Name</label>
        </div>
        <div class="texte">
          <input type="password" name = "mdp" required>
          <span></span>
          <label for ="mdp">Password</label>
        </div>
        <input type="submit" value="Log in">
      </form>
    </div>
  </body>
  <?php
          require('config.php');
          session_start();
          if (isset($_POST['nom'])){
            $username = stripslashes($_REQUEST['nom']);
            $username = mysqli_real_escape_string($conn, $username);
            $password = stripslashes($_REQUEST['mdp']);
            $password = mysqli_real_escape_string($conn, $password);
              $query = "SELECT * FROM `compte` WHERE nom='$username' and mdp=\"$password\";";
            $result = mysqli_query($conn,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if($rows==1){
                $_SESSION['nom'] = $username;
                header("Location: index.php");
            }else{
              if (!empty($_POST['nom'])){
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                echo "<p>$message</p>";
              }
            }
          }
        ?>
</html>
