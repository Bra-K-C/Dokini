<!DOCTYPE html>

<html lang="fr">
<head>
    <title class="titre">La recette</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../ccs/bootstrap.min.css" />
    <link rel="stylesheet" href="../ccs/styleAjax.css" />
</head>


<?php
function getWikiText($title) {
    $endPoint = "https://fr.wikibooks.org/w/api.php";
    $params = [
        "action" => "query",
        "format" => "json",
        "prop" => "extracts",
        "titles" => $title,
        "formatversion" => "2",
        "rvprop" => "content",
        "rvslots" => "*"
    ];

    $url = $endPoint . "?" . http_build_query( $params );

    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close( $ch );

    $result = json_decode( $output, true );

    return $result["query"]["pages"][0]["extract"];
};
?>

<body>
  <?php
if (isset($_GET['title']) && $_GET['title']!==''){
    echo getWikiText($_GET['title']);
}
  ?>
</body>
