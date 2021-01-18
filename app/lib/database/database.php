<?php


namespace PHPMVC\Lib\Database;


class Database
{
    private static $_instance;
    CONST OPTIONS = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ];

    private function __construct()
    {
        try
        {
            self::$_instance = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';', DB_USER, DB_PASS, self::OPTIONS);
        }
        catch (\PDOException $e)
        {
            die('connection failed: ' . $e->getMessage());
        }
    }

    public static function connect()
    {
        if(self::$_instance == NULL)
        {
            new self();
        }
        return self::$_instance;
    }
     public static function query($stmt, $params = [], $mode = 'assoc')
     {
         $statement = self::connect()->prepare($stmt);
         $statement->execute($params);
         if ($mode == 'assoc'){
             return $statement->fetchAll();
         } elseif ($mode == 'count') {
             return $statement->rowCount();
         }
     }
}