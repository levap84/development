<?php
    $ovoce = array(
        'ananas',
        'citrón',
        'pomeranč'
    );

    $zelenina = array(
        'květák',
        'okurka',
        'paprika'
    );

    $fotky = array(
        'ananas' => '<img src="pictures/ananas.jpeg" alt="ananas">',
        'citrón' => '<img src="pictures/citron.jpeg" alt="citron">',
        'květák' => '<img src="pictures/kvetak.jpeg" alt="kvetak">',
        'okurka' => '<img src="pictures/okurka.jpeg" alt="okurka">',
        'paprika' => '<img src="pictures/paprika.jpeg" alt="paprika">',
        'pomeranč' => '<img src="pictures/pomeranc.jpeg" alt="pomeranc">'
    );
    
    $jidlo = array('ovoce' => $ovoce, 'zelenina' => $zelenina);
    $hlaska = "";
    $vysledek = "";


if($_POST)
{
    if(isset($_POST['plodina']) && $_POST['plodina'])
    {
        $plodina = htmlspecialchars($_POST['plodina']);

        foreach($jidlo as $key => $value)
        {
            $nalez = in_array($plodina, $value);
            if($nalez)
                $vysledek = $key;
        }

        $hlaska = ($vysledek) ? $plodina . ' je ' . $vysledek : $plodina . ' nemám zařazeno v seznamu plodin'; 
    }
    else
    {
        $hlaska = 'Zadej prosím plodinu';
    }
}
?>




<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rozpoznavac</title>
</head>
<body>

    <h1>Rozpoznávač ovoce a zeleniny</h1>
    <?php
    if($vysledek)
        echo($fotky[$plodina]);
    ?>
    <form method="post">
        <label for="nazevPlodiny">Zadej název plodiny</label><br>
        <input type="text" name="plodina" id="nazevPlodiny"><br>
        <input type="submit" value="Rozpoznat">
    </form>
    <p><?=  $hlaska ?></p>
    
</body>
</html>