<?php
$slovnikSmile = array(
    ':-)' => '<img src="pictures/smile.png">',
    ':-(' => '<img src="pictures/unhappy.png">',
    ':-D' => '<img src="pictures/grin.png">',
    ':-P' => '<img src="pictures/tongue.png">',
    ':O'  => '<img src="pictures/surprised.png">',
    ';-D' => '<img src="pictures/wink.png">',
    'fake' => '****'
);

$spam = array(
    'buy',
    'cheap',
    'xxx',
    'pills'
);


if(isset($_POST['zprava']) && $_POST['zprava'])
{
    $obsahZpravy = nl2br(htmlspecialchars($_POST['zprava']));
    $obsahZpravy = strtr($obsahZpravy, $slovnikSmile);
    $nalez = FALSE;

    foreach($spam as $value)
    {
        if($nalez === FALSE)
            $nalez = mb_stripos($obsahZpravy, $value);
    }
    
    if($nalez === FALSE)
        echo($obsahZpravy);
    else
        echo('spam');
}


?>




<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zpráva</title>
</head>
<body>
    <form method="post">
        <label for="zprava">Zadej zprávu</label><br>
        <textarea name="zprava" id="zprava" cols="40" rows="6"></textarea><br>
        <input type="submit" value="Odeslat">

    </form>
    
</body>
</html>