<?php
session_start();
require('Db.php');
Db::connect('127.0.0.1', 'ners_db', 'root', '');

if(isset($_SESSION['uzivatel_id']))
{
    header('Location: administrace.php');
    exit();
}

if($_POST)
{
    $uzivatel = Db::queryOne('
    SELECT uzivatele_id, admin, heslo
    FROM uzivatele
    WHERE jmeno=?
    ', $_POST['jmeno']);
    // pokud neexistuje uzivatel v databazi nebo se zadan0 heslo neshoduje s heslem v databazi
    if(!$uzivatel || !password_verify($_POST['heslo'], $uzivatel['heslo']))
        $zprava = 'Neplatné uživatelské jméno nebo heslo.';
    else
    {
        $_SESSION['uzivatel_id'] = $uzivatel['uzivatele_id'];
        $_SESSION['uzivatel_jmeno'] = $_POST['jmeno'];
        $_SESSION['uzivatel_admin'] = $uzivatel['admin'];
        header('Location: administrace.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Přihlášení do administrace</title>
</head>
<body>
    <article>
        <header>
            <h1>Přihlášení do administrace</h1>
        </header>
        <section>
            <?php
            if(isset($zprava))
                echo('<p>' . $zprava . '</p>');
            ?>

            <form method="post">
                <label>
                    Jméno<br>
                    <input type="text" name="jmeno">
                </label><br>
                <label>
                    Heslo<br>
                    <input type="password" name="heslo">
                </label><br>
                <input type="submit" value="Přihlásit">
            </form>
            <p>Pokud ještě nemáte účet, <a href="registrace.php">zaregistrujte se</a></p>
        </section>
        <footer>
            Vytvořil &copy; HoBi 2023 pro <a href="https://itnetwork.cz">itnetwork.cz</a>
        </footer>
    </article>
    
</body>
</html>