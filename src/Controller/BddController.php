<?php

namespace App\Controller;

use PDO;
use PDOException;



abstract class BddController
{
    public function connect()
    {
        try {
            $dbhost = 'host';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'dbname';
            $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
            return $dbh;
        } catch (PDOException $e) {
            echo "Error! " . $e->getMessage() . "<br/>";
            die();
        }
    }
}