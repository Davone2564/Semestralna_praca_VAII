<?php

/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registrácia</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                    <form class="form-signin" method="post" action="<?= $link->url("saveUser") ?>">
                        <label for="email"><b>E-mail</b></label>
                        <div class="form-label-group mb-3">
                            <input name="email" type="text" id="email" class="form-control" placeholder="Zadajte email"
                                   required autofocus>
                        </div>

                        <label for="login"><b>Prihlasovacie meno</b></label>
                        <div class="form-label-group mb-3">
                            <input name="login" type="text" id="login" class="form-control" placeholder="Zadajte login"
                                   required autofocus>
                        </div>

                        <div class="form-label-group mb-3">
                            <label for="password"><b>Heslo</b></label>
                            <input name="password" type="password" id="password" class="form-control"
                                   placeholder="Zadajte heslo" required>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" name="submit">Registrovať
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
