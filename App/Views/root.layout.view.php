<?php

/** @var string $contentHTML */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<!DOCTYPE html>
<html lang="sk">
<head>
    <title><?= \App\Config\Configuration::APP_NAME ?></title>
    <link rel="icon" type="image/png" href="public/images/earth_icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light" aria-label="Third navbar example">

    <div class="container-fluid">
        <a class="navbar-brand" href="<?=$link->url("home.index")?>">
            <img src="public/images/earth_icon.png" alt="Bootstrap" width="27" height="24">
            <b>Geomania&nbsp;&nbsp;</b>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
            <ul class="navbar-nav me-auto mb-2 mb-sm-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Zaujímavosti</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Afrika</a></li>
                        <li><a class="dropdown-item" href="#">Amerika</a></li>
                        <li><a class="dropdown-item" href="#">Austrália</a></li>
                        <li><a class="dropdown-item" href="#">Ázia</a></li>
                        <li><a class="dropdown-item" href="#">Európa</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Hry</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Vlajky</a></li>
                        <li><a class="dropdown-item" href="#">Krajiny</a></li>
                        <li><a class="dropdown-item" href="#">Hlavné mestá</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Pomoc</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Kontakt</a></li>
                        <li><a class="dropdown-item" href="#">Napíšte nám</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= $link->url("home.offers") ?>">Ubytovacie ponuky</a>
                </li>
            </ul>

            <!-- odstranili sme me-auto potom nam to zarovna doprava -->
            <ul class="navbar-nav mb-2 mb-sm-0">
                <?php if ($auth->isLogged()) { ?>
                    <span class="navbar-text my-small-right-margin">Prihlásený používateľ: <b><?= $auth->getLoggedUserName() ?></b></span>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item my-border">
                            <a class="nav-link" href="<?= $link->url("auth.logout") ?>">Odhlásiť</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item my-border">
                            <a class="nav-link" href="<?= \App\Config\Configuration::LOGIN_URL ?>">Prihlásiť</a>
                        </li>

                        <li class="nav-item my-border">
                            <a class="nav-link" href="<?= \App\Config\Configuration::REGISTRATION_URL?>">Registrovať</a>
                        </li>
                    </ul>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="web-content">
        <?= $contentHTML ?>
    </div>
</div>

<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top my-footer">
    <p class="col-md-4 mb-0 text-body-secondary footer">© 2023 Geomania, s.r.o</p>

    <a href="<?=$link->url("home.index")?>" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img src="public/images/earth_icon.png" alt="Geomania" width="25" height="24">
    </a>

    <ul class="nav col-md-4 justify-content-end">
        <li class="nav-item"><a href="<?=$link->url("home.index")?>" class="nav-link px-2 text-body-secondary">Domov</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Informácie</a></li>
    </ul>
</footer>
</body>
</html>
