<?php
session_start();
if(!isset($_SESSION['uzivatel_id']))
{
    header('Location: prihlaseni.php');
    exit();
}

if(isset($_GET['odhlasit']))
{
    session_destroy();
    header('Location: prilaseni.php');
    exit();
}


?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Administrace</title>
</head>
<body>
    <article>
        <header>
            <h1>Administrace</h1>
        </header>
        <section>
            <p>Vítejte v administraci, jste přihlášeni jako <?= htmlspecialchars($_SESSION['uzivatel_jmeno']) ?></p>
            <?php
            if(!$_SESSION['uzivatel_admin'])
                echo('Nemáte administrátorská oprávnění, požádejte administrátora webu')
            ?>

            <h3><a href="editor.php">Editor článků</a></h3>
            <h3><a href="clanky.php">Seznam článků</a></h3>
            <h3><a href="administrace.php?odhlasit">Odhlásit</a></h3>
        </section>
    </article>
    <footer>
        Vytvořil &copy; HoBi 2023 pro <a href="https://itnetwork.cz">itnetwork.cz</a>
    </footer>
    
</body>
</html>