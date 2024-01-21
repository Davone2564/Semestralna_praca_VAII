<?php

$layout = 'offer';
/** @var \App\Core\IAuthenticator $auth */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Models\Offer $offer */
/** @var Array $data */

?>
<div class="container">
    <h1 class="my-main-page-title">Ubytovacie ponuky pre turistov</h1>
</div>

<div class="container-fluid my-marketing-container">
    <div class="row">
        <?php foreach ($data['offers'] as $offer): ?>
            <div class="col-lg-3 col-md-6 col-xs-12 d-flex gap-4 flex-column">
                <div class="border post d-flex flex-column">
                    <div>
                        <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $offer->getPicture()?>" class="my-marketing-img">
                    </div>
                    <div class="m-2">
                        <strong><?= $offer->getName() ?></strong>
                    </div>
                    <div class="m-2">
                        <strong>Poloha: </strong><?= $offer->getLocation() ?>
                    </div>
                    <div class="m-2">
                        <strong>Kontakt: </strong><?= $offer->getContact() ?>
                    </div>
                    <div class="m-2">
                        <strong>Cena za jednu noc: </strong><?= $offer->getPrice() . " eur" ?>
                    </div>
                    <div class="m-2 d-flex my-justify-space-between gap-2">
                            <a href="<?= $link->url('review.index', ['id' => $offer->getId()]) ?>" class="btn btn-success">Recenzie</a>
                        <?php if ($auth->isLogged() && $auth->getLoggedUserId() == $offer->getAuthorID()) { ?>
                            <div>
                                <a href="<?= $link->url('offer.edit', ['id' => $offer->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                                <a href="<?= $link->url('offer.delete', ['id' => $offer->getId()]) ?>"  class="btn btn-danger">Zmazať</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>