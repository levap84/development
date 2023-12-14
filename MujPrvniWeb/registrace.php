<?php
session_start();
require('Db.php');
Db::connect('127.0.0.1', 'ners_db', 'root', '');

if($_POST)
{
    if($_POST['rok'] != date('Y'))
        $zprava = 'Chybně vyplněný antispam.';
    elseif ($_POST['heslo'] != $_POST['heslo_znovu']) 
        $zprava = 'Hesla nesouhlasí.';
    else
    {
        $existuje = Db::querySingle('
            SELECT COUNT(*)
            FROM uzivatele
            WHERE jmeno=?
            LIMIT 1
        ', $_POST['jmeno']);
        if($existuje)
            $zprava = 'Uživatel s touto přezdívkou již existuje';
        else
        {
            $heslo = password_hash($_POST['heslo'], PASSWORD_DEFAULT);
            Db::query('
                INSERT INTO uzivatele (jmeno, heslo)
                VALUES (?, ?)
            ', $_POST['jmeno'], $heslo);
            $_SESSION['uzivatel_id'] = DB::getLastId();
            $_SESSION['uzivatel_jmeno'] = $_POST['jmeno'];
            $_SESSION['uzivatel_admin'] = 0;
            header('Location: administrace.php');
            exit();
        }
    }
}

?>


<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrace</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <article>
        <header>
            <h1>Registrace</h1>
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
                <label>
                    Heslo znovu<br>
                    <input type="password" name="heslo_znovu">
                </label><br>
                <label>
                    Zadej aktuální rok (antispam)<br>
                    <input type="text" name="rok">
                </label><br>
                <input type="submit" value="Registrovat">
            </form>
        </section>
    </article>
    <footer>
        Vytvořil &copy; HobBi 2023 pro <a href="https://itnetwork.cz">itnetwork.cz</a>
    </footer>
   
    
</body>
</html>