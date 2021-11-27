
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
        echo '<a href='.$profil_link.' >'. $_SESSION["username"].' |</a>
        <a class="navig" href= ?logout=true> Deconnexion</a>';
    }
    ?><a class="navig" href='www.google.com'> Premium </a>
  </nav>

  <h2>Dokini, c'est quoi?</h2>
    <p>
      Dokini est un site web développé par des étudiants pour permettre de manger
      mieux tout en préservant l'environnement.
    </p>
    <br />

    <p>
      Dokini vous propose diverses recettes selon vos goûts et vos besoins.
      Mais pas seulement! Les recettes varient selon la période de l'année
      pour vous permettre de manger des produits de saison. Dokini vous permet
      aussi de sélectionner des recettes et vous crée votre liste de courses. Tout
      est plus simple
    </p>
</body>
