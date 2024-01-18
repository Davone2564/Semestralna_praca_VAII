<?php

namespace App\Auth;

use App\Models\User;

/**
 * Class Smart
 * Smarter implementation of user authentication
 * @package App\Auth
 */
class SmartAuthenticator extends DummyAuthenticator
{
    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    public function login($login, $password): bool
    {
        $users = User::getAll();
        foreach ($users as $user) {
            if ($user->getUsername() == $login && password_verify($password, $user->getPassword())) {
                $_SESSION['user'] = $login;
                $_SESSION['userID'] = $user->getId();
                return true;
            }
        }
        return false;
    }
}
