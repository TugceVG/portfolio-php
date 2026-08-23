<?php

class UserRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function findByEmail(string $email)
    {

    $stmt = $this->pdo->prepare("SELECT * FROM users where email = :email");
    $stmt->execute(['email'=>$email]);
    $user = $stmt->fetch();

        if ($user === false) {
            return null;
        }

        return $user;
    }
}