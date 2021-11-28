<!DOCTYPE html>

<<<<<<< HEAD
<html lang="fr">
<head>
    <title class="titre">Repas</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../ccs/bootstrap.min.css" />
    <link rel="stylesheet" href="../ccs/styleScrap.css" />
</head>

<?php
function getWikiText($title) {
=======
<form>
    <label for="childrenNb">Nombre d'enfants :</label><br>
    <input type="number" name = "childrenNb" id ="childrenNb" required><br>
    <label for="mynAge">Age moyen :</label><br>
    <input type="number" name = "mynAge" id="mynAge" required><br><br>
    <input type="submit" value="Send" name="send" ></input>
</form>

<?php

if(isset($_GET['send'])){
    $nbChildren = $_GET['childrenNb'];
    $mynAge = $_GET['mynAge'];

    echo "<br>";

    $kcal = (125 * $mynAge + 884) * $nbChildren;

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

    $month = localtime()["4"];

    $fh = fopen("../seasons/saisons.txt", 'r');
    $line = fgets($fh);
    for ($x = 0; $x < $month; $x++)
        $line = fgets($fh);

    $vegetables = [];
    $i = 0;
    $c = $line[$i];
    $isWord = false;
    $str = "";
    while ($c !== ']') {
        if ($c === '\'') {
            $isWord = !$isWord;
            if ($str !== "")
                array_push($vegetables, $str);
            $str = "";
        }
        if ($isWord && $line[$i] !== '\'') {
            $str .= $c;
        }
        $i++;
        $c = $line[$i];
    }

>>>>>>> scrapping
    $endPoint = "https://fr.wikibooks.org/w/api.php";
    $params = [
        "action" => "query",
        "format" => "json",
        "list" => "categorymembers",
        "cmtitle" => "Catégorie:Recettes de cuisine à base de légume",
        "cmtype" => "subcat",
        "cmlimit" => "max",
    ];

    $url = $endPoint . "?" . http_build_query( $params );

    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close( $ch );

    $result = json_decode( $output, true );
    $allRecipes = [];

    foreach( $result["query"]["categorymembers"] as $page ) {
        foreach ($vegetables as $v) {
            if ($v[0] === 'a' || $v[0] === 'e' || $v[0] === 'i' || $v[0] === 'o' || $v[0] === 'u' || $v[0] === 'y')
                $v = "d'" . $v;
            else
                $v = "de " . $v;
            if ("Catégorie:Recettes de cuisine à base " . $v === $page["title"]) {
                //echo '<a href="https://fr.wikibooks.org/wiki/' . $page["title"] . '"> ' . $page["title"] . '  </a> <br>';
                $recipes = [
                    "action" => "query",
                    "format" => "json",
                    "list" => "categorymembers",
                    "cmtitle" => $page["title"],
                    "cmtype" => "page",
                    "cmlimit" => "max",
                ];

                $url = $endPoint . "?" . http_build_query($recipes);

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $output = curl_exec($ch);
                curl_close($ch);

                $recipesJson = json_decode($output, true);

<<<<<<< HEAD
$endPoint = "https://fr.wikibooks.org/w/api.php";
$params = [
    "action" => "query",
    "format" => "json",
    "list" => "categorymembers",
    "cmtitle" => "Catégorie:Recettes de cuisine à base de légume",
    "cmtype" => "subcat",
    "cmlimit" => "max",
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result = json_decode( $output, true );
$allRecipes = [];
?>

<body>
  <header>
    <h1>
      <span class="titre">Les différents repas</span>
    </h1>
  </header>

<div class="centrer">
<?php
foreach( $result["query"]["categorymembers"] as $page ) {
    foreach ($vegetables as $v) {
        if ($v[0] === 'a' || $v[0] === 'e' || $v[0] === 'i' || $v[0] === 'o' || $v[0] === 'u' || $v[0] === 'y')
            $v = "d'" . $v;
        else
            $v = "de " . $v;
        if ("Catégorie:Recettes de cuisine à base " . $v === $page["title"]) {
            //echo '<a href="https://fr.wikibooks.org/wiki/' . $page["title"] . '"> ' . $page["title"] . '  </a> <br>';
            $recipes = [
                "action" => "query",
                "format" => "json",
                "list" => "categorymembers",
                "cmtitle" => $page["title"],
                "cmtype" => "page",
                "cmlimit" => "max",
            ];

            $url = $endPoint . "?" . http_build_query($recipes);

            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            $recipesJson = json_decode($output, true);

            foreach ($recipesJson["query"]["categorymembers"] as $recipe) {
                $alReadyDisplay = false;
                for ($i = 0; $i < sizeof($allRecipes); $i++) {
                    if ($recipe === $allRecipes[$i]) {
                        $alReadyDisplay = true;
                    }
                }
                if (!$alReadyDisplay && substr($recipe["title"], 0, 17) == "Livre de cuisine/")
                    //echo '<a href="https://fr.wikibooks.org/wiki/' . $recipe["title"] . '"> ' . substr($recipe["title"], 17) . '  </a> <br>';
                    //echo getWikiText($recipe["title"]) . "<br><br>";
                    echo '<a class="lien" href="ajax.php?title='.$recipe["title"].'" target="_blank"> ' . substr($recipe["title"], 17) . '  </a> <br>';
=======
                foreach ($recipesJson["query"]["categorymembers"] as $recipe) {
                    $alReadyDisplay = false;
                    for ($i = 0; $i < sizeof($allRecipes); $i++) {
                        if ($recipe === $allRecipes[$i]) {
                            $alReadyDisplay = true;
                        }
                    }
                    if (!$alReadyDisplay && substr($recipe["title"], 0, 17) == "Livre de cuisine/")
                        //echo '<a href="https://fr.wikibooks.org/wiki/' . $recipe["title"] . '"> ' . substr($recipe["title"], 17) . '  </a> <br>';
                        //echo getWikiText($recipe["title"]) . "<br><br>";
                        echo '<a href="ajax.php?title='.$recipe["title"].'" target="_blank"> ' . substr($recipe["title"], 17) . '  </a> <br>';
>>>>>>> scrapping


                    array_push($allRecipes, $recipe);
                }
            }
        }

    }

    echo "<br>";

    $endPoint = "https://fr.wikibooks.org/w/api.php";
    $params = [
        "action" => "query",
        "format" => "json",
        "list" => "categorymembers",
        "cmtitle" => "Catégorie:Recettes de cuisine à base de fruit",
        "cmtype" => "subcat",
        "cmlimit" => "max",
    ];

    $url = $endPoint . "?" . http_build_query( $params );

    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close( $ch );

    $result = json_decode( $output, true );

    foreach( $result["query"]["categorymembers"] as $page ) {
        foreach ( $vegetables as $v) {
            if ($v[0] === 'a' || $v[0] === 'e' || $v[0] === 'i' || $v[0] === 'o' || $v[0] === 'u' || $v[0] === 'y')
                $v = "d'" . $v;
            else
                $v = "de " . $v;
            if ( "Catégorie:Recettes de cuisine à base " . $v === $page["title"]) {
                //echo '<a href="https://fr.wikibooks.org/wiki/' . $page["title"] . '"> ' . $page["title"] . '  </a> <br>';
                $recipes = [
                    "action" => "query",
                    "format" => "json",
                    "list" => "categorymembers",
                    "cmtitle" => $page["title"],
                    "cmtype" => "page",
                    "cmlimit" => "max",
                ];

                $url = $endPoint . "?" . http_build_query( $recipes );

                $ch = curl_init( $url );
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
                $output = curl_exec( $ch );
                curl_close( $ch );

                $recipesJson = json_decode( $output, true );

                foreach ( $recipesJson["query"]["categorymembers"] as $recipe ) {
                    $alReadyDisplay = false;
                    for ($i = 0; $i < sizeof($allRecipes); $i++) {
                        if ($recipe === $allRecipes[$i]) {
                            $alReadyDisplay = true;
                        }
                    }
                    if (!$alReadyDisplay && substr($recipe["title"], 0, 17) === "Livre de cuisine/" && substr($recipe["title"], 17, 9) !== "Boissons/")
<<<<<<< HEAD
                        echo '<a class="lien" href="ajax.php?title='.$recipe["title"].'" target="_blank"> ' . substr($recipe["title"], 17) . '  </a> <br>';
                        //echo getWikiText($recipe["title"]) . "<br><br>";
=======
                        echo '<a href="ajax.php?title='.$recipe["title"].'" target="_blank"> ' . substr($recipe["title"], 17) . '  </a> <br>';
                    //echo getWikiText($recipe["title"]) . "<br><br>";
>>>>>>> scrapping
                    array_push($allRecipes, $recipe);
                }
            }
        }
<<<<<<< HEAD
}
?>
</div>
</body>
=======
    }
}


>>>>>>> scrapping
