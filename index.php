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
      <img class="wallpaper" src="\IMG\cantine.jpg">
      <span class="titre">Dokini</span>
    </h1>
  </header>

  <nav>
    <?php
    session_start();
    if(!utils::IsConnected()){
        echo'<div class="navig"> <a href="pages/login.php">Connexion</a>
        <a href="pages/register.php"> Inscription</a></div>';
    }
    else{
        if(!$_SESSION['paid']){header('Location: /pages/payment_form.php');}
        $profil_link = 'pages/profil.php?id='.$_SESSION["user_id"];
        echo '<div class="navig">
        <a href="pages/season_food.php">Fruits et légumes</a>
        <a href="pages/scrap.php">Repas</a>
        <a href='.$profil_link.' >'. $_SESSION["username"].' |</a>
        <a href= ?logout=true> Deconnexion</a></div>';
    }
    ?>
  </nav>

  <br />
  <br />
  <br />
  <p>
    Utiliser Dokini, c'est permettre aux enfants de manger mieux tout en
    préservant l'environnement. Ce site a pour but d'aider les mairies à
    répondre aux "casses-têtes" des repas pour les cantines en leur proposant
    une liste de repas réalisés à base de produits de saison.
  </p>
  <p>
    Vous pouvez créer un compte en cliquant sur "Connexion". Cela vous permet
    d'avoir accès aux propositions de repas. En effet, Dokini va vous proposer
    une liste de repas pour la semaine en fonction du nombre d'enfants et de
    leur âge. Tout cela avec des produits de saisons et un nombre de kcal adapté
    pour chaque tranche d'âge.
  </p>
  <br />
  <br />
  <br />
</body>
