<?php

/** @var \App\Models\Country $country */
/** @var \App\Core\LinkGenerator $link */
/** @var \App\Core\IAuthenticator $auth */
/** @var Array $data */

?>

<div class="container">
    <h1 class="my-main-page-title">Zaujímavosti o krajinách kontinentu <?= $data['continent'] ?></h1>
</div>

<div class="container-fluid">
    <?php if ($auth->getIfLoggedUserIsAdmin()) { ?>
        <div class="my-justify-center my-margin-bottom my-margin-top">
            <a href="<?= $link->url('country.add', ['continent' => $data['continent']]) ?>"  class="btn btn-primary">Pridať krajinu</a>
        </div>
    <?php } ?>

    <?php foreach ($data['countries'] as $country): ?>
    <div class="my-countries-row my-justify-center my-margin-bottom">
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="<?= \App\Helpers\FileStorage::UPLOAD_DIR . '/' . $country->getFlag()?>" alt="Flag" style="width:350px;height:200px;">
                </div>
                <div class="flip-card-back">
                    <h1><?= $country->getName()?></h1>
                    <p class="my-country-label"><strong>Hlavné mesto: </strong><?= $country->getCapitalCity()?></p>
                    <p class="my-country-label"><strong>Počet obyvateľov: </strong><?= number_format($country->getPopulation(), 0, '.', ' ')?></p>
                    <p class="my-country-label"><strong>Rozloha: </strong><?= number_format($country->getArea(), 0, '.', ' ') ?> km²</p>
                </div>
            </div>
        </div>
    </div>
        <div class="m-2 d-flex my-justify-center gap-2">
            <?php if ($auth->getIfLoggedUserIsAdmin()) { ?>
                <div>
                    <a href="<?= $link->url('country.edit', ['id' => $country->getId()]) ?>" class="btn btn-primary">Upraviť</a>
                    <a href="<?= $link->url('country.delete', ['id' => $country->getId()]) ?>"  class="btn btn-danger">Zmazať</a>
                </div>
            <?php } ?>
        </div>
    <?php endforeach; ?>
</div>