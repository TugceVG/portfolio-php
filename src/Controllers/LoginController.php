<?php

class LoginController
{
    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function show()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function authenticate()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

         $authenticated = $this->authService->authenticate(
            $email,
            $password
        );

        if ($authenticated) {
            echo "Login successful";
            return;
        }

        echo "Invalid email or password";
    }
}