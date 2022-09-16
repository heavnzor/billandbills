<?php

use App\Controller\DispatchController;

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="description" content="Bill's app to bill everyone he wants." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Bill's bills</title>
        <link href="/src/View/assets/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <header>
            <a href='https://coinbronx.com'><img class='logo' src="/src/View/assets/logo.png" height="auto"
                    title="Bill's bills" /></a>

        </header>
        <hr />
        <nav role='navigation'>
            <?php if (isset($_SESSION['bill']) && $_SESSION['bill'] === 'Bill') {
            require_once 'menu.php';
        }
        ?>
        </nav>
        <hr />
        <main>

            <?php
        if (!isset($_SESSION['bill']) || $_SESSION['bill'] !== "Bill") {
            require_once 'auth.php';
        } else {
            $DispatchController = new DispatchController;
            $DispatchController->dispatch();
        }
        ?>
        </main>
        <footer style="margin-top: 5rem; text-align: center;">test by heavnz0r pour lebocal.academy</footer>
    </body>

</html>