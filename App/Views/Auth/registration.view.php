<?php

/** @var Array $data */
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
                    <h5 class="card-title text-center">Registrácia</h5>
                    <div id="text" class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= $link->url("saveUser") ?>">
                        <label for="email"><b>E-mail</b></label>
                        <div class="form-label-group mb-3">
                            <input name="email" oninput="checkEmail()" type="text" id="email" class="form-control" placeholder="Zadajte email"
                                   required autofocus>
                            <p class="my-error-message" id="error-msg">Zadajte prosím správny tvar e-mailovej adresy</p>
                        </div>

                        <label for="login"><b>Prihlasovacie meno</b></label>
                        <div class="form-label-group mb-3">
                            <input name="login" oninput="checkUsername()" type="text" id="login" class="form-control" placeholder="Zadajte login"
                                   required autofocus>
                            <p class="my-error-message" id="error-msg-login">Prihlasovacie meno musí obsahovať aspoň tri písmená a len povolené znaky</p>
                        </div>

                        <div class="form-label-group mb-3">
                            <label for="password"><b>Heslo</b></label>
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Zadajte heslo" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit" id="button">Registrovať
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
