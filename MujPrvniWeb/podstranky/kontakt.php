



    <article>

        <header>
            <h1>Kontakt</h1>
        </header>

        <section>
            <?php
                if($hlaska)
                    echo('<p>' . htmlspecialchars($hlaska) . '</p>');
                $jmeno = (isset($_POST['jmeno'])) ? $_POST['jmeno'] : '';
                $email = (isset($_POST['email'])) ? $_POST['email'] : '';
                $zprava = (isset($_POST['zprava'])) ? $_POST['zprava'] : '';

            ?>
            <form method="post">
                <table>
                    <tr>
                        <td>Vaše jméno</td>
                        <td><input type="text" name="jmeno" value="<?= htmlspecialchars($jmeno) ?>"></td>
                    </tr>
                    <tr>
                        <td>Váš email</td>
                        <td><input type="email" name="email" value="<?= htmlspecialchars($email) ?>"></td>
                    </tr>
                    <tr>
                        <td>Aktuální rok</td>
                        <td><input type="number" name="rok"></td>
                    </tr>
                </table>
                <textarea name="zprava"><?= htmlspecialchars($zprava) ?></textarea><br>
                <input type="submit" value="Odeslat">
            </form>
            
        </section>

    </article>