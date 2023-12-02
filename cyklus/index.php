<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
echo('<ul>');
$cisla = array();

for($i = 10; $i > 0; $i--)
{
    $cisla[] = $i;
}

foreach($cisla as $cislo)
{
    echo('<li>' . $cislo . '</li>');
}


echo('</ul>');


?>
    
</body>
</html>