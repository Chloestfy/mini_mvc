<?php

require_once __DIR__ . '/../model/User.php';


class Usercontroller
{
    public function showUser()
    {
        $user = new User("chloe");
        require_once __DIR__ . '/../view/userView.php';
    }
}
