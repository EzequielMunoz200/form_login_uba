<?php

namespace App\Utils;

use PDO;

// How to use => Database::getPDO()
// Design Pattern : Singleton
class Database
{
    /**
     * @var PDO
     */
    private $dbh;

    /**
     * @var Database
     */
    private static $_instance;


    private function __construct()
    {
        /** @var Array */
        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    /**
     * @return PDO
     */
    public static function getPDO()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new Database();
        }

        return self::$_instance->dbh;
    }
}