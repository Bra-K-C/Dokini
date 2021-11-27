<!DOCTYPE html>

<html lang="fr">
<head>
    <title class="titre">Connexion</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="\ccs\bootstrap.min.css" />
    <link rel="stylesheet" href="\ccs\styleLogin.css" />
</head>

<body>
  <header>
    <h1>
      <span class="titre">Connexion</span>
    </h1>
  </header>

  <form method="post" action="" name="login-form">
    <div class="bout">
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" placeholder="Username" required />
        <input type="password" name="password" placeholder="Password" required />
        <br />
        <button type="submit" name="login" value="login">Login</button>
        <br />
        <form> </br><input type="button" onclick="location.href='../index.php';" value="Retour au site "/></form>
    </div>
  </form>

</body>

<?php
session_start();
include('../config.php');
global $db;
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = $db->prepare("SELECT * FROM users WHERE username=:username");
    $query->bindParam("username", $username, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        echo '<p class="error">Nom d\'utilisateur introuvable!</p>';
    } else {
        if (password_verify($password, $result['hash_psswd'])) {
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            echo '<p class="success">Vous êtes connecté!</p>';
            header("Location: /");
        } else {
            echo '<p class="error">Mauvaise combinaison!</p>';
        }
    }
}
?>
