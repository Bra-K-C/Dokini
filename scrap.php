<?php
/*
    get_info.php

    MediaWiki API Demos
    Demo of `Info` module: Send a GET request to display information about a page.

    MIT License
*/

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

foreach( $result["query"]["categorymembers"] as $page ) {
    //echo( $page["title"] . "<br>" );
    echo '<a href="https://fr.wikibooks.org/wiki/'.$page["title"] . '"> '.$page["title"] .'  </a> <br>';
}