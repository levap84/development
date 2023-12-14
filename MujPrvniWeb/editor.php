<?php
session_start();
if(empty($_SESSION['uzivatel_admin']))
    die('Nedostatečnáá oprávnění.');

require('Db.php');
Db::connect('127.0.0.1', 'ners_db', 'root', '');

$clanek = array(
    'clanky_id' => '',
    'titulek' => '',
    'obsah' => '',
    'url' => '',
    'popisek' => '',
    'klicova_slova' => ''
);

if($_POST)
{
    if(!$_POST['clanky_id'])
    {
        Db::query('
            INSERT INTO clanky (titulek, obsah, url, popisek, klicova_slova)
            VALUES (?, ?, ?, ?, ?)
        ', $_POST['titulek'], $_POST['obsah'], $_POST['url'], $_POST['popisek'], $_POST['klicova_slova'], $_POST['clanky_id']);
    }
    header('Location: index.php?clanek=' . $_POST['url']);
    exit();
}

elseif (isset($_GET['url']))
{
    $nactenyClanek = Db::queryOne('
        SELECT *
        FROM clanky
        WHERE url=?
    ', $_GET['url']);
    if($nactenyClanek)
        $clanek = $nactenyClanek;
    else
        $zprava = 'Článek nebyl nalezen.';
}

?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Editor článků</title>
</head>
<body>
    <article>
        <header>
            <h1>Editor článků</h1>
        </header>
        <section>
            <?php
            if(isset($zprava))
                echo('<p>' . $zprava . '</p>');
            ?>

            <form method="post">
                <input type="hidden" name="clanky_id" value="<?= htmlspecialchars($clanek['clanky_id']) ?>"><br>
                <label>
                    Titulek<br>
                    <input type="text" name="titulek" value="<?=htmlspecialchars($clanek['titulek'])?>">
                </label><br>
                <label>
                    URL<br>
                    <input type="text" name="url" value="<?= htmlspecialchars($clanek['url'])?>">
                </label><br>
                <label>
                    Popisek<br>
                    <input type="text" name="popisek" value="<?= htmlspecialchars($clanek['popisek']) ?>">
                </label><br>
                <label>
                    Klíčová slova<br>
                    <input type="text" name="klicova_slova" value="<?= htmlspecialchars($clanek['klicova_slova']) ?>">
                </label><br><br>
                <label>
                    <textarea name="obsah" cols="30" rows="10"><?= htmlspecialchars($clanek['obsah']) ?></textarea>
                </label><br>
                <input type="submit" value="Odeslat">
                </form>
        </section>
    </article>
    <script src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea[name=obsah]",
            plugins: [
                "advlist", "autolink", "lists", "link", "image", "charmap", "preview", "anchor",
                "searchreplace", "visualblocks", "code", "fullscreen",
                "insertdatetime", "media", "table"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            entities: "160,nbsp",
            entity_encoding: "raw"
        });
    </script>
    <footer>
        Vytvořil &copy; HoBi 2023 pro <a href="https://itnetwork.cz">itnetwork.cz</a>
    </footer>




</body>
</html>