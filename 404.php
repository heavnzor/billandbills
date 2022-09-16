<?php session_start(); ?>
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
            <hr />
        </header>
        <div class="container">
            <nav role='navigation'>
                <?php if (isset($_SESSION['bill']) && $_SESSION['bill'] === 'Bill') {
                require_once './src/View/menu.php';
            }
            ?>
            </nav>
            <main>

                <h2>404 : Page non trouvée</h2>

            </main>
        </div>
        <footer style="text-align: center;">dev by heavnz0r pour lebocal.academy</footer>
    </body>

</html>