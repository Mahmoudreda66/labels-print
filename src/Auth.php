<?php

namespace Mahmoud\Labels;

class Auth
{
    public function getLoggedUser()
    {
        mustAuth();

        $user = db()->prepare('SELECT *
        FROM users
        WHERE remember_token = ?');
        $user->execute([session('user') ?? cookie('user')]);

        return $user->fetch();
    }
}
