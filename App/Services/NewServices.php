<?php

namespace App\Services;

use App\Database\Connect;
use PDO;
class NewServices extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findAllNews(): array
    {
        return $this->pdo->query("SELECT * FROM tb_news")->fetchAll(PDO::FETCH_ASSOC);
    }

}
