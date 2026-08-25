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

         $authenticatedUser = $this->authService->authenticate(
            $email,
            $password
        );

        if ($authenticatedUser) {
            $_SESSION['user_id'] = $authenticatedUser['id'];
            header('Location: /portfolio-php/public/');
            exit;
        }

        echo "Invalid email or password";
    }

    public function logout()
    {
        session_start();

        unset($_SESSION['user_id']);

        header('Location: /portfolio-php/public/login');
        exit;
    }
}