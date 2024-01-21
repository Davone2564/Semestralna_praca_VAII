<?php

/** @var \App\Models\Review $review */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */

?>

<div class="container">
    <h1 class="my-main-page-title">Recenzie pre ubytovaciu ponuku <?= $data['name'] ?></h1>
</div>

<div class="container-fluid">
    <?php if ($auth->isLogged()) { ?>
        <div class="my-justify-center my-margin-bottom my-margin-top">
            <a href="<?= $link->url('review.add', ['offerID' => $data['offerID']]) ?>"  class="btn btn-primary">Pridať hodnotenie</a>
        </div>
    <?php } ?>

    <?php foreach ($data['reviews'] as $review): ?>
    <div class="my-reviews-row">
            <div class="my-reviews-item d-flex my-justify-space-between">
                <div class="my-f-grow">
                    <strong><?= $review->getAuthorName() ?></strong>
                    <?php if (!empty($review->getPluses())) { ?>
                        <div class="my-rating-text">
                            <i style="color: green" class="bi bi-plus"></i>
                            <?= $review->getPluses() ?>
                        </div>
                    <?php } ?>
                    <?php if (!empty($review->getMinuses())) { ?>
                        <div class="my-rating-text">
                            <i style="color: red" class="bi bi-dash"></i>
                            <?= $review->getMinuses() ?>
                        </div>
                    <?php } ?>
                    <div class="m-2 d-flex my-justify-space-between gap-2">
                        <?php if ($auth->isLogged() && $auth->getLoggedUserName() == $review->getAuthorName()) { ?>
                            <div>
                                <a href="<?= $link->url('review.edit', [
                                        'id' => $review->getId(),
                                        'offerName' => $data['name']]) ?>" class="btn btn-primary">Upraviť</a>
                                <a href="<?= $link->url('review.delete', ['id' => $review->getId()]) ?>"  class="btn btn-danger">Zmazať</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="my-review-stars">
                    <i class="bi bi-star"></i>
                    &nbsp;<?= $review->getStars() ?>
                </div>
            </div>
    </div>
    <?php endforeach; ?>
</div>
