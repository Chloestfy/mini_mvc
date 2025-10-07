<?php
require_once __DIR__ . '/../model/User.php';

class UserController
{
    public $userDao;

    public function __construct($userDao)
    {
        $this->userDao = $userDao;
    }

    public function displayAllUsers()
    {
        $users = $this->userDao->getAllUsers();
        var_dump($users);
        require_once __DIR__ . '/../view/userView.php';
    }

    public function displayUserProfile(int $id)
    {
        $user = $this->userDao->getUserById($id);
        if (!$user) {
            echo "Utilisateur non trouvé";
            return;
        }
        require_once __DIR__ . '/../view/userProfileView.php';
    }
}
