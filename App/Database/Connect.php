<?php

namespace App\Database;

use PDO;

abstract class Connect

{
    /**
     * @var \PDO
     */
    protected $pdo;

    public function __construct()
    {
        $host = getenv('MYSQL_HOST');
        $db = getenv('MYSQL_DB');
        $user = getenv('MYSQL_USER');
        $pass = getenv('MYSQL_PASS');
        $port = getenv('MYSQL_PORT');

        $dsn = "mysql:host={$host};dbname={$db};port={$port}";
        $this->pdo = new PDO($dsn, $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
