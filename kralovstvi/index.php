<?php
    require_once('mapa.php');

    // get requesty z adresniho radku a ulozeni do promenych
    $x = (isset($_GET['x']) && $_GET['x']) ? $_GET['x'] : 0;
    $y = (isset($_GET['y']) && $_GET['y']) ? $_GET['y'] : 0;

    $top = (isset($mapa[$y - 1][$x]) && ($mapa[$y - 1][$x])) ? TRUE : FALSE;
    $left = (isset($mapa[$y][$x - 1]) && ($mapa[$y][$x - 1])) ? TRUE : FALSE;
    $right = (isset($mapa[$y][$x + 1]) && ($mapa[$y][$x +1])) ? TRUE : FALSE;
    $down = (isset($mapa[$y + 1][$x]) && ($mapa[$y + 1][$x])) ? TRUE : FALSE;
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kralovství</title>
</head>
<body>
    <?= $mapa[$y][$x] . '<br>' ?>
    <?php
        if($top)
            echo('<a href="index.php?x=' . $x . '&y=' . $y - 1 . '"><img src="pictures/nahoru.png"></a>');
        if($left)
            echo('<a href="index.php?x=' . $x -1 . '&y=' . $y . '"><img src="pictures/doleva.png"></a>');
        if($right)
            echo('<a href="index.php?x=' . $x + 1 . '&y=' . $y . '"><img src="pictures/doprava.png"></a>');
        if($down)
            echo('<a href="index.php?x=' . $x . '&y=' . $y + 1 . '"><img src="pictures/dolu.png"></a>');
    ?>

</body>
</html>