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
        $user->setPassword($formData['password']);
        if (isset($formData['submit'])) {
            $firstOccurence = stripos($formData['email'], '@');
            $numberOfOccurences = substr_count($formData['email'], '@');
            //kontrolujeme ci sa nachadza v emaily len jeden zavinac
            if ($numberOfOccurences == 1) {
                //kontrolujeme ci pred zavinacom aj za nim su nejake znaky
                if ($firstOccurence != 0 && $firstOccurence != strlen($formData['email']) - 1) {
                    $users = User::getAll();
                    foreach ($users as $value) {
                        if ($user->getEmail() == $value->getEmail()) {
                            $data = ['message' => 'Používateľ s daným e-mailom už existuje'];
                            return $this->html($data, 'registration');
                        }
                    }
                    $registrated = true;
                    $user->save();
                    return $this->redirect($this->url("home.registerConfirmation"));
                } else {
                    $registrated = false;
                }
            } else {
                $registrated = false;
            }
        }
        $data = ($registrated === false ? ['message' => 'E-mail je v nesprávnom tvare!'] : []);
        return $this->html($data, 'registration');
    }
}
