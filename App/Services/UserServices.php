<?php

namespace App\Services;

use App\Database\Connect;
use App\Entities\Users;
use PDO;

class UserServices extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail(string $email): ?Users
    {
        $stmt = $this->pdo->prepare("SELECT" . " * FROM tb_users ");
        $stmt->bindParam('email', $email);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($users) === 0) {
            return null;
        }
        $user = new Users();
        $user->setId($users[0]['id'])
            ->setEmail($users[0]['email'])
            ->setPass($users[0]['pass'])
            ->setName($users[0]['name']);
        return $user;
    }

    public function create(Users $user): void
    {
        $stmt = $this->pdo->prepare("INSERT" . " INTO " . "tb_users" . " " . "VALUES" . "(null,:email,:" . "pass" . ",:name)");
        $stmt->execute(['name' => $user->getEmail(), 'email' => $user->getName(), 'pass' => $user->getPass()]);
    }
}
