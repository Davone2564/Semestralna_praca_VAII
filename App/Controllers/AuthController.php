<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("home.index"));
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }

    public function registration(): Response
    {
        return $this->html();
    }

    public function saveUser(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $registrated = null;
        $user = new User();
        $user->setEmail($formData['email']);
        $user->setUsername($formData['login']);
        //zadane heslo zahesujeme a ulozime
        $hash = password_hash($formData['password'], PASSWORD_BCRYPT);
        $user->setPassword($hash);
        if (isset($formData['submit'])) {
            $users = User::getAll();
            foreach ($users as $value) {
                if ($user->getEmail() == $value->getEmail()) {
                    $data = ['message' => 'Používateľ s daným e-mailom už existuje'];
                    return $this->html($data, 'registration');
                }
                if ($user->getUsername() == $value->getUsername()) {
                    $data = ['message' => 'Používateľ s daným loginom už existuje'];
                    return $this->html($data, 'registration');
                }
            }
            $registrated = true;
            $user->save();
            return $this->redirect($this->url("auth.registerConfirmation"));
        }
    }

    public function registerConfirmation(): Response
    {
        return $this->html();
    }

    public function profile(): Response
    {
        $id = (int) $this->request()->getValue('id');

        $user = User::getOne($id);

        return $this->html(
            [
                'user' => $user
            ]
        );
    }

    public function passwordChange(): Response
    {
        return $this->html();
    }

    public function savePassword(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $user = User::getOne($formData['id']);

        if (!password_verify($formData['oldPassword'], $user->getPassword())) {
            $data = ['message' => 'Zadali ste nesprávne heslo'];
            return $this->html($data, 'passwordChange');
        }
        $hash = password_hash($formData['password'], PASSWORD_BCRYPT);
        $user->setPassword($hash);
        $user->save();
        return $this->redirect($this->url("auth.passwordChangeConfirmation"));
    }

    public function passwordChangeConfirmation(): Response
    {
        return $this->html();
    }

    public function userManagement(): Response
    {
        return $this->html(
            [
                'users' => User::getAll()
            ]
        );
    }

    public function deleteUser(): Response
    {
        $id = (int) $this->request()->getValue('id');
        $user = User::getOne($id);
        $user->delete();
        return $this->redirect($this->url("auth.userManagement"));
    }
}
