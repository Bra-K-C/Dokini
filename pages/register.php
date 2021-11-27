<!DOCTYPE html>

<html lang="fr">
<head>
    <title class="titre">Inscription</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="\ccs\bootstrap.min.css" />
    <link rel="stylesheet" href="\ccs\styleRegister.css" />
</head>

<body>
  <header>
    <h1>
      <span class="titre">Inscription</span>
    </h1>
  </header>

<form method="post" action="" name="signup-form">
    <div class="bout">
      <input type="text" name="username" pattern="[a-zA-Z0-9]+" placeholder="Username" required />
      <input type="email" name="email" placeholder="Email" required />
      <br />
      <input type="password" name="password" id= "password" placeholder="Password" required />
      <input type="password" name="cpassword" id="cpassword" placeholder="Confirm password" required />
      <br />
      <button type="submit" name="register" value="register">S'enregistrer</button>
      <br />
      <form> </br> </br><input type="button" onclick="location.href='../index.php';" value="Retour au site "/></form>
    </div>
</form>

<?php
session_start();
include('../config.php');
global $db;
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $hash_psswd = password_hash($password, PASSWORD_BCRYPT);
    $query = $db->prepare("SELECT * FROM users WHERE email=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
    if ($query->rowCount() > 0) {
        echo '<p class="error">Email déjà enregistré!</p>';
    }
    if ($password != $cpassword)
    {
        echo '<p class="error">Mauvaise confirmation du mot de pass</p>';
    }
    else {
        if ($query->rowCount() == 0) {
            $id = md5(random_bytes(10));
            $created_activities = "{}";
            $query = $db->prepare("INSERT INTO users(id, hash_psswd, email, username)
            VALUES (:id, :hash_psswd, :email, :username)");
            $query->bindParam("id", $id, PDO::PARAM_STR);
            $query->bindParam("hash_psswd", $hash_psswd, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success">Enregistrement réussi!</p>';
                $_SESSION['user_id'] = $id;
                $_SESSION['username'] = $username;
                header("Location: /");
            } else {
                echo '<p class="error">Erreur</p>';
            }
        }
    }


}
?>


</body>
</html>
