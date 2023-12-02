<?php
    mb_internal_encoding('UTF-8');
    $hlaska = '';
    if(isset($_GET['uspech']))
        $hlaska = 'Email byl úspěšně odeslán, brzy vám odpovíme';
    if($_POST) { //v poli _POST něco je
        if(isset($_POST['jmeno']) && $_POST['jmeno'] &&
            isset($_POST['email']) && $_POST['email'] &&
            isset($_POST['zprava']) && $_POST['zprava'] &&
            isset($_POST['rok']) && $_POST['rok'] == date('Y')
            ) {
            //kod odeslani mailu
            $hlavicka = 'From:' . $_POST['email'];
            $hlavicka .= "\nMIME-Version: 1.0\n";
            $hlavicka .= "Content-Type: text/html; charset=\"utf-8\"\n";
            $adresa = 'nas@email.cz';
            $predmet = 'Nová zpráva z mailformu';
            $uspech = mb_send_mail($adresa, $predmet, $_POST['zprava'], $hlavicka);
            if ($uspech) {
                $hlaska = 'Email byl úspěšně odeslán, brzy vám odpovíme.';
                header('Location: index.php?stranka=kontakt&uspech=ano');
                exit;
            } else
                $hlaska = 'Email se nepodařilo odeslat. Zkontrolujte adresu.';
        }
        else
            $hlaska = 'Formulář není správně vyplněný';
    }



?>





<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Osobní portfolio programátora HoBiho.">
    <meta name="keywords" content="portfolio, programátor, HoBi">
    <meta name="author" content="HoBi">
    <link rel="shortcut icon" href="pictures/icons8-favicon-16.png" type="image/x-icon">
    <link rel="stylesheet" href="css/lightbox.min.css">
    <title>Moje první webová stránka</title>
</head>
<body>
    <header>

        <div id="logo">
            <h1>Honza<span>Bittner</span></h1>
            <small>webdeveloper</small>
        </div>

        <nav>
            <ul>
                <li><a href="index.php?stranka=omne">O mně</a></li>
                <li><a href="index.php?stranka=dovednosti">Dovednosti</a></li>
                <li><a href="index.php?stranka=reference">Reference</a></li>
                <li><a href="index.php?stranka=kontakt">Kontakt</a></li>
            </ul>
        </nav>

    </header>

    <article>
        <section>
            <?php
                if(isset($_GET['stranka']))
                    $stranka = $_GET['stranka'];
                else
                    $stranka = 'omne';
                
                if (preg_match('/^[a-z0-9]+$/', $stranka)) {
                    $vlozeno = include('podstranky/' . $stranka . '.php');
                        if(!$vlozeno)
                            echo('Podstranka nenalezena');
                }
                else
                    echo('Neplatny parametr.');

                
            ?>
        </section>
    </article>

    <footer>
        <p>Vytvořil &copy;HoBi 2021 pro <a href="https://itnetwork.cz">itnetwork.cz</a></p>
    </footer>
    <script src="js/lightbox-plus-jquery.min.js"></script>
    <script src="js/lightbox.min.js"></script>
</body>
</html>