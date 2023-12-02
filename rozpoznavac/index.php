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
            foreach($value as $x => $polozka)
            {
                if ($polozka == $plodina)
                    $vysledek = $key;
            }
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
    <form method="post">
        <label for="nazevPlodiny">Zadej název plodiny</label><br>
        <input type="text" name="plodina" id="nazevPlodiny"><br>
        <input type="submit" value="Rozpoznat">
    </form>
    <p><?=  $hlaska ?></p>
    
</body>
</html>