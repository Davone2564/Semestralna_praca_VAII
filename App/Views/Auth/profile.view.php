<?php

/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Informácie o profile</h5>
                    <div id="text" class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= $link->url("passwordChange", ['id' =>  @$data['user']->getId()]) ?>">
                        <label for="email"><b>E-mail</b></label>
                        <div class="form-label-group mb-3">
                            <input name="email" value="<?= @$data['user']->getEmail() ?>" type="text" id="email" class="form-control" placeholder="Zadajte email"
                                   disabled required autofocus>
                            <p class="my-error-message" id="error-msg">Zadajte prosím správny tvar e-mailovej adresy</p>
                        </div>

                        <label for="login"><b>Prihlasovacie meno</b></label>
                        <div class="form-label-group mb-3">
                            <input name="login" value="<?= @$data['user']->getUsername() ?>" type="text" id="login" class="form-control" placeholder="Zadajte login"
                                   disabled required autofocus>
                            <p class="my-error-message" id="error-msg-login">Prihlasovacie meno musí obsahovať aspoň tri písmená a len povolené znaky</p>
                        </div>

                        <label for="password"><b>Heslo</b></label>
                        <div class="form-label-group mb-3">
                            <input name="password" value="<?= @$data['user']->getPassword() ?>" type="password" id="password" class="form-control"
                                   placeholder="Zadajte heslo" disabled required autofocus>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit" id="button">Zmena hesla</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
