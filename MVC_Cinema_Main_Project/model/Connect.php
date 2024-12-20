<?php

namespace Model;

abstract class Connect {

    const HOST = "localhost";
    // const DB = "cinema";
    const DB = "cinema_theo";
    const USER = "root";
    const PASS = "";

    public static function seConnecter() {
        try {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS); 
        } catch(\PDOException $ex) {
            // return $ex->getMessage();
            var_dump($ex->getMessage()); die;
        }
    }
}