<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start()?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../ccs/seasons.css" rel="stylesheet">
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }

    </script>
</head>
<body>
<div id="main">
    <button class="openbtn" onclick="openNav()">☰ Ouvrir barre de navigation</button>
    <h2>Fruits et légumes de saisons</h2>
<?php
            $month = $_SESSION['month'];
            echo'<p>'.$_SESSION['month'].'</p>';

            $fh = fopen("../seasons/saisons.txt", 'r');
            $line = fgets($fh);
            for ($x = 0; $x < $month; $x++)
                $line = fgets($fh);

            $vegetables = [];
            $i = 0;
            $c = $line[$i];
            $isWord = false;
            $isLabel = false;
            $str = "";
            while ($c !== ']') {
                if ($c === '\'') {
                    $isWord = !$isWord;
                    if ($str !== ""){
                        array_push($vegetables, $str);
                        echo'<p>Nutriment : '.$str.'</p>';
                        $isLabel = !$isLabel;
                    }
                    $str = "";
                }
                if ($isWord && $line[$i] !== '\'') {
                    $str .= $c;
                }
                if ($c === ',') {
                    if ($str !== "") {
                        array_push($vegetables, $str);
                        echo '<p>Local : ' . $str .'</p>';
                        $c = '\'';
                        $isLabel = !$isLabel;
                    }
                    $str = "";
                }
                if ($isLabel && $line[$i] !== ',' && $c !== '\'') {
                    $str .= $c;
                }
                $i++;
                $c = $line[$i];
            }
?>
</div>
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a onclick="closeNav()" href="season_food.php?$_SESSION['month']=0">Janvier</a>
    <a onclick="closeNav()" href="">Fevrier</a>
    <a onclick="closeNav()" href="">Mars</a>
    <a onclick="closeNav()" href="">Avril</a>
    <a onclick="closeNav()" href="">Mai</a>
    <a onclick="closeNav()" href="">Juin</a>
    <a onclick="closeNav()" href="">Juillet</a>
    <a onclick="closeNav()" href="">Août</a>
    <a onclick="closeNav()" href="">Septembre</a>
    <a onclick="closeNav()" href="">Octobre</a>
    <a onclick="closeNav()" href="">Novembre</a>
    <a onclick="closeNav()" href="">Décembre</a>
</div>
<div></div>
</body>

