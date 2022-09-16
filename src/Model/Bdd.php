<?php

abstract class Bdd
{
    private static $pdo;

    private static function setBdd()
    {

        $dbhost = 'mp46d.myd.infomaniak.com';
        $dbuser = 'mp46d_bill';
        $dbpass = 'oDB2x_HqsE7!@';
        self::$pdo = new PDO("mysql:host=$dbhost;dbname=mp46d_billandbills", $dbuser, $dbpass);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }

    protected function getBdd()
    {
        if (self::$pdo === null) {
            self::setBdd();
        }
        return self::$pdo;
    }
}