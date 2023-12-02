<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Šachovnice</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <table>
        <?php
            for($i = 0; $i < 8; $i++)
            {
                echo('<tr>');
                for($j = 0; $j < 8; $j++)
                {
                    if($i % 2 == 0)
                        $bunka = ($j % 2 == 0) ? 'black' : 'white';
                    
                    else
                        $bunka = ($j % 2 == 0) ? 'white' : 'black';
                    
                    echo('<td class="'. $bunka .'"></td>');
                }
                
                echo('</tr>');

            }



        ?>
    </table>

    
</body>
</html>