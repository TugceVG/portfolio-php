<?php

require_once __DIR__ . '/../Repositories/UserRepository.php';

class HomeController
{
    private UserRepository $userRepository;
    private ?array $user = null;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function home()
    {
        if(isset($_SESSION['user_id'])){
            $this->user = $this->userRepository->findById($_SESSION['user_id']);
        }
        echo "Home Page";
        
        if ($this->user !== null) {
            echo $this->user['email'];
        }
    }
}