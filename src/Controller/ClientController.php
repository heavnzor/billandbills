<?php

namespace App\Controller;

use PDO;
use PDOException;
use App\Model\Client;
use App\Model\Bill;

class ClientController extends DispatchController
{


    public function list(): ?array
    {
        try {
            $pdo = $this->connect();
            $req = $pdo->query("SELECT * FROM `client` ORDER BY idClient DESC");
            return $req->fetchAll(PDO::FETCH_CLASS, Client::class);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function check(): ?Client // Vérifie les champs entrés dans un formulaire ont bien été saisi
    {
        if (isset($_POST['lastName']) && isset($_POST['firstName']) && isset($_POST['email'])) {
            $lastName = $_POST['lastName'];
            $firstName = $_POST['firstName'];
            isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber']) ? $phoneNumber = $_POST['phoneNumber'] : $phoneNumber = null;
            $email = $_POST['email'];
            if ($phoneNumber !== null && preg_match("/^([+]?\d{1,2}[-\s]?|)\d{3}[-\s]?\d{3}[-\s]?\d{4}$/", $phoneNumber) == 0) { {
                    echo "<p style='color: red; text-align: center;'>Numéro de téléphone incorrect</p>";
                    return null;
                }
            }
            if (!is_string($lastName) || !is_string($firstName) || preg_match("/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/", $email) == 0) {
                echo "<p style='color: red; text-align: center;'>Remplissez correctement le formulaire.</p>";
                return null;
            }
            $client = new Client(); // si tout est ok renvoie une instance Client
            $client->setFirstName($firstName);
            $client->setLastName($lastName);
            $client->setEmail($email);
            $client->setPhoneNumber($phoneNumber);
            return $client;
        } else {
            return null;
        }
    }

    public function create(): ?bool
    {
        if ($this->check() !== null) {
            $client = $this->check();
            $lastName = $client->getLastName();
            $firstName = $client->getFirstName();
            $email = $client->getEmail();
            $phoneNumber = $client->getPhoneNumber();
            try {
                $pdo = $this->connect();
                $req = $pdo->prepare("INSERT INTO `client` (`idClient`, `lastName`, `firstName`, `email`, `phoneNumber`) VALUES (NULL, :lastName, :firstName, :email, :phoneNumber)");
                $req->execute(array(':lastName' => $lastName, ':firstName' => $firstName, ':email' => $email, ':phoneNumber' => $phoneNumber));
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        } else {
            return false;
        }
    }


    public function read(int $idClient): ?Client
    {
        // on vérifie que l'idClient est bien un entier
        is_numeric($_POST['idClient']) ? $idClient = $_POST['idClient'] : exit("problème au niveau de l'ID Client");
        try {
            $pdo = $this->connect();
            $req = $pdo->prepare("SELECT * FROM `client` WHERE `idClient` = :idClient");
            $req->bindParam(':idClient', $idClient);
            $req->execute();
            $req->setFetchMode(PDO::FETCH_CLASS, Client::class);
            return $req->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    public function update(): ?bool
    {
        if ($this->check() !== null) {
            $idClient = $_POST['idClient'];
            $client = $this->check();
            $lastName = $client->getLastName();
            $firstName = $client->getFirstName();
            $email = $client->getEmail();
            $phoneNumber = $client->getPhoneNumber();
            $pdo = $this->connect();
            $req = $pdo->prepare("UPDATE `client` SET `lastName` = :lastName, `firstName` = :firstName, `email` = :email, `phoneNumber` = :phoneNumber WHERE `idClient` = :idClient");
            $req->execute(array(':lastName' => $lastName, ':firstName' => $firstName, ':email' => $email, ':phoneNumber' => $phoneNumber, ':idClient' => $idClient));
            return true;
        }
        return false;
    }
    public function delete(int $idClient): ?bool
    {
        $idClient = $_POST['idClient'];
        is_numeric($_POST['idClient']) ? $idClient = $_POST['idClient'] : exit("problème au niveau de l'ID Client");
        try {
            $pdo = $this->connect();
            $req = $pdo->prepare("DELETE FROM `client` WHERE `idClient` = :idClient");
            $req->bindParam(':idClient', $idClient);
            $req->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}