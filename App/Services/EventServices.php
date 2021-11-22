<?php

namespace App\Services;


use App\Database\Connect;
use PDO;

class EventServices extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findEventAll(): array
    {
        return $this->pdo->query("SELECT * FROM tb_events")->fetchAll(PDO::FETCH_ASSOC);
    }
}
