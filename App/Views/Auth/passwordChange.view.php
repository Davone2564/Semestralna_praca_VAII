<?php

/** @var Array $data */
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
?>
<header>
    <script src="public/js/registrationValidation.js" defer></script>
</header>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Zmena hesla</h5>
                    <div id="text" class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= $link->url("savePassword") ?>">
                        <input name="id" id="id" type="hidden" value="<?= $auth->getLoggedUserId()?>">

                        <label for="password"><b>Staré heslo:</b></label>
                        <div class="form-label-group mb-3">
                            <input name="oldPassword" type="password" id="oldPassword" class="form-control"
                                   placeholder="Zadajte staré heslo" required autofocus>
                        </div>

                        <label for="password"><b>Nové heslo:</b></label>
                        <div class="form-label-group mb-3">
                            <input name="password" oninput="passwordValidation()" type="password" id="password" class="form-control"
                                   placeholder="Zadajte nové heslo" required autofocus>
                        </div>

                        <label for="password"><b>Nové heslo znova:</b></label>
                        <div class="form-label-group mb-3">
                            <input name="password-again" oninput="passwordValidation()" type="password" id="password-again" class="form-control"
                                   placeholder="Zadajte nové heslo znova" required autofocus>
                            <p class="my-error-message" id="error-msg-password">Heslá sa nezhodujú</p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit" id="button">Uložiť</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
