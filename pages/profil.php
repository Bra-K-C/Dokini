
<!DOCTYPE html>

<?php
include '../utils/utils.php';
include('../config.php');

if (isset($_GET['logout']))
    utils::DeleteAllCookies();
?>

<html lang="fr">
<head>
    <title class="titre">Dokini</title>
    <meta charset="utf-8" />
</head>

<body>
<header>
    <?php
    session_start();
    ?>
    <h1>
        <span class="titre">Dokini</span>

        <!--<img class="logo" src="\IMG\ebauche_logo.jpg">-->
    </h1>
    <?php
        global $db;
        $id = $_SESSION["user_id"];
        $query = $db->prepare("SELECT * FROM users WHERE id=:id");
        $query->bindParam("id",$id, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() == 0) {
            header('HTTP/1.0 404 Not Found');
            exit;
        }
        else{
            $result = $query->fetch(PDO::FETCH_ASSOC);
            $username = $result["username"];
            echo('<p>'.$username.'</p>');
            $imc = $result["imc"];
            echo('<p>'.$imc.'</p>');
            $fat_mass = $result["fat_mass"];
            echo('<p>'.$imc.'</p>');
            $muscle_mass = $result["muscle_mass"];
            echo('<p>'.$imc.'</p>');
        }
    ?>
</header>
</body>

