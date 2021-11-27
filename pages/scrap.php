<?php

/*$endPoint = "https://fr.wikibooks.org/w/api.php";
$params = [
    "action" => "parse",
    "format" => "json",
    "page" => "Livre de cuisine/Moussaka",
];

$url = $endPoint . "?" . http_build_query( $params );

$ch = curl_init( $url );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
$output = curl_exec( $ch );
curl_close( $ch );

$result = json_decode( $output, true );

$fh = fopen("test.txt", 'w');
fwrite($fh, $result["parse"]["text"]["*"]);
echo $result["parse"]["text"]["*"];

echo "<br><br>";*/

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

            foreach ($recipesJson["query"]["categorymembers"] as $recipe) {
                $alReadyDisplay = false;
                for ($i = 0; $i < sizeof($allRecipes); $i++) {
                    if ($recipe === $allRecipes[$i]) {
                        $alReadyDisplay = true;
                    }
                }
                if (!$alReadyDisplay && substr($recipe["title"], 0, 17) == "Livre de cuisine/")
                    echo '<a href="https://fr.wikibooks.org/wiki/' . $recipe["title"] . '"> ' . $recipe["title"] . '  </a> <br>';
                array_push($allRecipes, $recipe);
            }
        }
    }

}

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
                        echo '<a href="https://fr.wikibooks.org/wiki/' . $recipe["title"] . '"> ' . $recipe["title"] . '  </a> <br>';
                    array_push($allRecipes, $recipe);
                }
            }
        }
}