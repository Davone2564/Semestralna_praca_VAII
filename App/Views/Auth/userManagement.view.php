<?php

/** @var \App\Models\User $user */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */

?>

<div class="container">
    <h1 class="my-main-page-title">Správa používateľov</h1>
</div>

<div class="container-fluid">
    <?php foreach ($data['users'] as $user):
        if ($user->getAdmin() === 0) { ?>
        <div class="my-reviews-row">
            <div class="my-reviews-item d-flex my-justify-space-between">
                <div class="my-f-grow">
                    <div class="my-rating-text"><strong>Login: </strong><?= $user->getUsername() ?></div>
                    <div class="my-rating-text"><strong>Email: </strong><?= $user->getEmail() ?></div>
                    <div class="m-2 d-flex my-justify-space-between gap-2">
                        <div>
                            <a href="<?= $link->url('auth.deleteUser', ['id' => $user->getId()]) ?>"  class="btn btn-danger">Zmazať používateľa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } endforeach; ?>
</div>
