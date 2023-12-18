<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;

class PageController extends AControllerBase
{
    public function index(): Response
    {
        return $this->html();
    }

    public function goldenGate(): Response
    {
        return $this->html();
    }

    public function tajMahal(): Response
    {
        return $this->html();
    }
}