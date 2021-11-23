<?php

namespace App\Security;

use App\Database\Connect;

class TokenGenerated extends Connect
{
    public function __construct()
    {
        parent::__construct();
    }

    public function generatedToken(TokenSecurity $token): void
    {
        $stmt = $this
            ->pdo
            ->prepare("INSERT" . " INTO tb_tokens (token,refresh,expired,userId) VALUES(:token,:refreshToken,:expire,:userId)");


        $stmt->execute([
            'token' => $token->getToken(),
            'refreshToken' => $token->getRefreshToken(),
            'expire' => $token->getExpire(),
            'userId' => $token->getUserId()
        ]);
    }
}