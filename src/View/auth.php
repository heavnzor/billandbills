<?php
if (isset($_POST['password']) && $_POST['password'] === "@b!llYtH3k?dz") {
    $_SESSION['bill'] = "Bill";
    header('Location: https://coinbronx.com');
    exit();
} else {
    echo "<form action='index.php' method='post' style='text-align: center;'>
    Password please ? <input type='password' name='password' />
    <input type='submit' value='Connexion' />
    </form> 
    ";
}