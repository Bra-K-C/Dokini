
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
    <link rel="stylesheet" href="ccs/bootstrap.min.css" />
    <link rel="stylesheet" href="ccs/style.css" />
</head>

<body>
  <header>
    <h1>
        <span class="titre">Dokini</span>
        <img class="wallpaper" src="\IMG\acceuil.jpg">
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
</body>
