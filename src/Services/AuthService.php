<?php

class AuthService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(string $email, string $password): bool
    {
        $user = $this->userRepository->findByEmail($email);

        if ($user === null) {
            return false;
        }

        if ($user['password'] !== $password) {
            return false;
        }

        return true;
    }
}