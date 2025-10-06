<?php
class dataBase
{
    private static ?PDO $pdo = null;

    public static function getConnection()
    {
        if (self::$pdo === null) {
            self::$pdo = new PDO("mysql:host=localhost;dbname=exo_mvc;", username: "root", password: "");
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$pdo;
    }
}
