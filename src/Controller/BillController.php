<?php

namespace App\Controller;

use PDO;
use PDOException;
use App\Model\Bill;
use App\Model\Client;

class BillController extends DispatchController
{


    public function list(): ?array
    {
        try {
            $pdo = $this->connect();
            $req = $pdo->query("SELECT * FROM `bill` ORDER BY idBill DESC");
            return $req->fetchAll(PDO::FETCH_CLASS, Bill::class);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function check(): ?Bill // Vérifie les champs entrés dans un formulaire ont bien été saisi
    {
        if (isset($_POST['titleBill']) && isset($_POST['service']) && isset($_POST['priceHT']) && isset($_POST['vat']) && isset($_POST['idClient'])) {
            //on assigne les variables nécessaires
            $titleBill = $_POST['titleBill'];
            $service = $_POST['service'];
            $priceHT = $_POST['priceHT'];
            $vat = $_POST['vat'];
            is_numeric($_POST['idClient']) ? $idClient = $_POST['idClient'] : die("Veuillez renseigner un client ou en créer un si ce n'est pas déjà fait.");
            $priceTTC = $priceHT * $vat;
            $dateBill = date("d/m/Y");
            $i1 = rand(0, 9);
            $i2 = rand(0, 9);
            $billNumber = date("dmY") . "-" . $idClient . "-" . $i1 . $i2;

            //on instancie et on hydrate Bill
            $bill = new Bill(); // si tout est ok renvoie une instance Client
            $bill->setTitleBill($titleBill);
            $bill->setService($service);
            $bill->setDateBill($dateBill);
            $bill->setPriceHT($priceHT);
            $bill->setVat($vat);
            $bill->setPriceTTC($priceTTC);
            $bill->setBillNumber($billNumber);
            $bill->setIdClient($idClient);
            return $bill;
        } else {
            return null;
        }
    }

    public function create(): ?bool
    {
        if ($this->check() !== null) {
            $bill = $this->check();
            $titleBill = $bill->getTitleBill();
            $service = $bill->getService();
            $dateBill = $bill->getDateBill();
            $priceHT = $bill->getPriceHT();
            $vat = $bill->getVat();
            $priceTTC = $bill->getPriceTTC();
            $billNumber = $bill->getBillNumber();
            $idClient = $bill->getIdClient();
            try {
                $pdo = $this->connect();
                $req = $pdo->prepare("INSERT INTO `bill` (`idBill`, `titleBill`, `service`, `dateBill`, `priceHT`, `vat`, `priceTTC`, `billNumber`, `idClient`) VALUES (NULL, :titleBill, :serviceBill, :dateBill, :priceHT, :vat, :priceTTC, :billNumber, :idClient)");
                $req->execute(array(':titleBill' => $titleBill, ':serviceBill' => $service, ':dateBill' => $dateBill, ':priceHT' => $priceHT, ':vat' => $vat, ':priceTTC' => $priceTTC, ':billNumber' => $billNumber, ':idClient' => $idClient));
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }


    public function read(int $idBill): ?Bill
    {
        // on vérifie que l'idBill est bien un entier
        is_numeric($_POST['idBill']) ? $idBill = $_POST['idBill'] : exit("problème au niveau de l'ID de la facture");
        try {
            $pdo = $this->connect();
            $req = $pdo->prepare("SELECT * FROM `bill` WHERE `idBill` = :idBill");
            $req->bindParam(':idBill', $idBill);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS, Bill::class);
            return $req->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function update(): ?bool
    {
        if ($this->check() !== null) {
            $idBill = $_POST['idBill'];
            $bill = $this->check();
            $titleBill = $bill->getTitleBill();
            $service = $bill->getService();
            $dateBill = $bill->getDateBill();
            $priceHT = $bill->getPriceHT();
            $vat = $bill->getVat();
            $priceTTC = $bill->getPriceTTC();
            $billNumber = $bill->getBillNumber();
            $idClient = $bill->getIdClient();
            $pdo = $this->connect();
            $req = $pdo->prepare("UPDATE `bill` SET `titleBill` = :titleBill, `service` = :serviceBill, `dateBill` = :dateBill, `priceHT` = :priceHT,`vat`= :vat, `priceTTC` = :priceTTC, `billNumber` = :billNumber, `idClient` = :idClient WHERE `idBill` = :idBill");
            $req->execute(array(':titleBill' => $titleBill, ':serviceBill' => $service, ':dateBill' => $dateBill, ':priceHT' => $priceHT, ':vat' => $vat, ':priceTTC' => $priceTTC, ':billNumber' => $billNumber, ':idClient' => $idClient, ':idBill' => $idBill));
            return true;
        }
        return false;
    }
    public function delete(int $idBill): ?bool
    {
        $idBill = $_POST['idBill'];
        is_numeric($_POST['idBill']) ? $idBill = $_POST['idBill'] : exit("problème au niveau de l'ID Client");
        try {
            $pdo = $this->connect();
            $req = $pdo->prepare("DELETE FROM `bill` WHERE `idBill` = :idBill");
            $req->bindParam(':idBill', $idBill);
            $req->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}