<?php

namespace App\Entities;

final class Users
{
    private $id;
    private $email;
    private $pass;
    private $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Users
    {
        $this->id = $id;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): Users
    {
        $this->email = $email;
        return $this;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function setPass(string $pass): Users
    {
        $this->pass = $pass;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Users
    {
        $this->name = $name;
        return $this;
    }
}
