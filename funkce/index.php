<?php
    if(isset($_POST['jmena']) && $_POST['jmena'])
    {
        $hlaska = 'Nenašel jsem Walda';
        $jmenaString = htmlspecialchars($_POST['jmena']);
        $jmenaPole = explode(',', mb_strtolower($jmenaString));
        $jmenaPoleTrim = array();
        foreach($jmenaPole as $value)
            $jmenaPoleTrim[] = trim($value);

        $nalez = array_search('waldo', $jmenaPoleTrim);
        if ($nalez != FALSE)
            $hlaska = 'Našel jsem Walda na ' . $nalez + 1 . '. pozici';
        echo($hlaska);
    }    


?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
	<img src="pictures/waldo.jpg" alt="">
    <form method="post">
        <label for="jmena">Zadejte text oddělený čárkou</label>
        <input type="text" name="jmena" id="jmena"><br>
        <input type="submit" value="Odeslat">
    </form>

</body>
</html>