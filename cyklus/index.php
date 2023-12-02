<?php
    
    $tisk_vysledek = (isset($_GET['vysledek'])) ? 'Výsledek je: ' . $_GET['vysledek'] : null;
    

    if($_POST)
    {
        if(isset($_POST['zaklad']) && $_POST['zaklad'] && isset($_POST['exponent']) && $_POST['exponent'])
        {  
            $vysledek = $_POST['zaklad'];
            
            for($i=1; $i < $_POST['exponent']; $i++ )
            {
                $vysledek *= $_POST['zaklad'];
            }
            header('Location: index.php?vysledek=' . $vysledek);
            die();
        }
        else
            echo('<h3>Vyplň všechny parametry</h3>');
    }

    $zaklad = (isset($_POST['zaklad'])) ? $_POST['zaklad'] : null;
    $exponent = (isset($_POST['exponent'])) ? $_POST['exponent'] : null;


?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cyklus</title>
</head>
<body>
    <form method="post">
        <table>
            <tr>
                <td>Zadej základ mocniny</td>
                <td><input type="number" name="zaklad" value='<?= $zaklad ?>'></td>
            </tr>
            <tr>
                <td>Zadej exponent</td>
                <td><input type="number" name="exponent" value='<?= $exponent ?>'></td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type="submit" value="Spočítat">  
                </td>
            </tr>
        </table>
    </form>
    <h3><?= $tisk_vysledek ?></h3>




</body>
</html>