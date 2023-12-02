<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_POST)
        {
            if(isset($_POST['pocet']) && $_POST['pocet'])
            {
                $pocet = $_POST['pocet'];
                echo('<h1>Dobrou chuť</h1>');
                for($i = 0; $i < $pocet; $i++)
                {
                    echo('<img src="pictures/ryba.png" alt="ryba" title"ryba ' . $i+1 . '">');
                }

            }

            
        }
        
        


    ?>
</body>
</html>