<?php

namespace App\Security;

final class TokenSecurity
{
    private $id;
    private $token;
    private $refresh_token;
    private $expire;
    private $userId;


    public function getId()
    {
        return $this->id;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function getToken()
    {
        return $this->token;
    }


    public function setToken(string $token): self
    {
        $this->token = $token;
        return $this;
    }


    public function getRefreshToken()
    {
        return $this->refresh_token;
    }


    public function setRefreshToken(string $refresh_token): self
    {
        $this->refresh_token = $refresh_token;
        return $this;
    }


    public function getExpire()
    {
        return $this->expire;
    }


    public function setExpire(string $expire): self
    {
        $this->expire = $expire;
        return $this;
    }


    public function getUserId(): int
    {
        return $this->userId;
    }


    public function setUserId(int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }

}