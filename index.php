<?php

use App\Controller\DispatchController;

session_start();
require_once  'vendor/autoload.php';
if (isset($_GET['page']) && $_GET['page'] == 'read-bill') {
    $DispatchController = new DispatchController;
    $DispatchController->dispatch();
} else {
    require_once 'src/View/default.php';
}