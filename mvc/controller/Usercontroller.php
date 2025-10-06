<?php
require_once __DIR__ . '/../model/User.php';


class UserController
{
    public function showUser()
    {
        $user = new User("Chloe Dijoux");
        require __DIR__ . '/../view/userView.php';
    }
}
