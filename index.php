
<!DOCTYPE html>

<?php
include 'utils/utils.php';
if (isset($_GET['logout']))
    utils::DeleteAllCookies();
?>

<html lang="fr">
<head>
    <title class="titre">Dokini</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <header>
    <h1>
        <span class="titre">Dokini</span>
        <img class="logo" src="\IMG\ebauche_logo.jpg">
    </h1>
  </header>

  <nav>
    <?php
    session_start();
    if(!utils::IsConnected()){
        echo'<a class="navig" href="pages/login.php">Connexion</a>
        <a class="navig" href="pages/register.php"> Inscription</a>';
    }
    else{
        $profil_link = 'pages/profil.php?id='.$_SESSION["user_id"];
        echo '<a class="navig" href='.$profil_link.' >'. $_SESSION["username"].' |</a>
        <a class="navig" href= ?logout=true> Deconnexion</a>';
    }
    ?>
  </nav>

  <br />
  <h2>Dokini, c'est quoi?</h2>
    <p class = "texteG">
      Le but de Dokini est de mieux connaître votre niveau actuel pour pouvoir
      vous proposer des recettes adaptées à vos goûts et vos besoins. Et tout
      cela en préservant l'environnement.
    </p>
    <p class = "abo">
      <a class="navig" href='www.google.com'> Premium </a>
    </p>
</body>
