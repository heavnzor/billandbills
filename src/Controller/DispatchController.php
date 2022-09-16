<?php

namespace App\Controller;

use Exception;
use App\Controller\BddController;
use App\Controller\BillController;
use App\Controller\ClientController;

class DispatchController extends BddController
{

    public function dispatch()
    {
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            define('__ROOT__', dirname(dirname(__FILE__)));
            $ClientController = new ClientController;
            $BillController = new BillController;
            switch ($page) {
                case 'create-client':
                    if ($ClientController->create() === true) {
                        echo "Client ajouté.";
                        $clients = $ClientController->list();
                        require_once __ROOT__ . '/View/list-clients.php';
                    } else {
                        require_once __ROOT__  . '/View/create-client.php';
                    }
                    break;
                case 'list-clients':
                    $clients = $ClientController->list();
                    require_once __ROOT__ . '/View/list-clients.php';
                    break;
                case 'update-client':
                    if ($ClientController->update() === true) {
                        $client = $ClientController->read($_POST['idClient']);
                        echo "Client " . $client->getLastName() . " " . $client->getFirstName() . " modifié.";
                        $clients = $ClientController->list();
                        require_once __ROOT__ . '/View/list-clients.php';
                    } else {
                        $client = $ClientController->read($_POST['idClient']);
                        require_once __ROOT__  . '/View/update-client.php';
                    }
                    break;
                case 'delete-client':
                    if (isset($_POST['idClient']) && !empty($_POST['idClient'])) {
                        $client = $ClientController->read($_POST['idClient']);
                        $fullName = $client->getLastName() . " " . $client->getFirstName();
                        try {
                            $ClientController->delete($_POST['idClient']);
                            echo $fullName . " a bien été supprimé de la base de donnée.";
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    }
                    break;
                case 'create-bill':
                    if ($BillController->create() === true) {
                        echo "Facture créée.";
                        $bills = $BillController->list();
                        require_once __ROOT__ . '/View/list-bills.php';
                    } else {
                        $clients = $ClientController->list();
                        require_once __ROOT__  . '/View/create-bill.php';
                    }
                    break;
                case 'list-bills':
                    $bills = $BillController->list();
                    require_once __ROOT__ . '/View/list-bills.php';
                    break;
                case 'update-bill':
                    if ($BillController->update() === true) {
                        $bill = $BillController->read($_POST['idBill']);
                        echo "Facture " . $bill->getTitleBill() . " - numéro : " . $bill->getBillNumber() . " modifiée.";
                        $bills = $BillController->list();
                        require_once __ROOT__ . '/View/list-bills.php';
                    } else {
                        $bill = $BillController->read($_POST['idBill']);
                        $defaultClient = $ClientController->read($_POST['idClient']);
                        $clients = $ClientController->list();
                        require_once __ROOT__  . '/View/update-bill.php';
                    }
                    break;
                case 'read-bill':
                    $bill = $BillController->read($_POST['idBill']);
                    $client = $ClientController->read($_POST['idClient']);
                    require_once __ROOT__ . '/View/read-bill.php';
                    break;
                case 'delete-bill':
                    if (isset($_POST['idClient']) && !empty($_POST['idClient'])) {
                        $bill = $BillController->read($_POST['idBill']);
                        $billName = "La facture " .  $bill->getTitleBill() . " - numéro : " . $bill->getBillNumber();
                        try {
                            $BillController->delete($_POST['idBill']);
                            echo $billName . " a bien été supprimé de la base de donnée.";
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    }
                    break;
                case 'log-out':
                    session_destroy();
                    header('Location: https://coinbronx.com');
                    exit();
            }
        }
    }
}