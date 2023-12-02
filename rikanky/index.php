<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Říkanka</title>
</head>
<body>

    <?php
        for($i=10; $i > 0; $i--)
        {
            if($i == 1)
                $lahev_name = 'zelená láhev';
            else
                $lahev_name = 'zelených lahví';
            echo($i . ' ' . $lahev_name . ' stojí na stole a jedna láhev spadne.<br>' );

        }



    ?>
    
</body>
</html>