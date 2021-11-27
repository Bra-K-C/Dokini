<!DOCTYPE html>
<?php session_start();?>
<html lang="fr">
<head>
    <title class="titre">Fruits et légumes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../ccs/seasons.css" rel="stylesheet">
    <script type="text/javascript">
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft= "0";
        }

        function jan(){
            <?php echo $_SESSION['month']; ?> = 0;
        }

    </script>
</head>
    
<body>
  <header>
    <h1>
      <img class="wallpaper" src="\IMG\fruitetleg.jpg">
      <span class="titre">Fruits et légumes de saison</span>
    </h1>
  </header>
  <div id="main">
   <?php
            $month = (int)date("m")-1;

            $fh = fopen("../seasons/saisons.txt", 'r');
            $line = fgets($fh);
            for ($x = 0; $x < $month; $x++)
                $line = fgets($fh);

            $vegetables = [];
            $i = 0;
            $c = $line[$i];
            $isWord = false;
            $isLabel = false;
            $lab = "";
            $str = "";
            while ($c !== ']') {
                if ($c === '\'') {
                    $isWord = !$isWord;
                    if ($str !== ""){
                        array_push($vegetables, $str);
                        $isLabel = !$isLabel;
                    }
                }
                if ($isWord && $line[$i] !== '\'') {
                    $str .= $c;
                }
                if ($c === ',') {
                    if ($lab !== "") {
                        array_push($vegetables, $lab);
                        if($lab === "1")
                            $lab = "Oui";
                        else
                            $lab = "Non";
                        echo '<p>Nutriment : ' . $str .', Local : '.$lab.'</p>';
                        $c = '\'';
                        $isLabel = !$isLabel;
                        $str = "";
                        $lab = "";
                    }
                }
                if ($isLabel && $line[$i] !== ',' && $c !== '\'' && $c != ' ') {
                    $lab .= $c;
                }
                $i++;
                $c = $line[$i];
            }
?>
</div>
<!--<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    <a onclick="closeNav()" href="javascript:update()">Janvier</a>
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
</div>-->
<div></div>
</body>

