<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 d-flex gap-4  flex-column">
            <h1>Úprava ubytovacej ponuky</h1>

            <?php if (!is_null(@$data['errors'])): ?>
                <?php foreach ($data['errors'] as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form method="post" action="<?= $link->url('offer.save') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= @$data['offer']?->getId() ?>">

                <label for="inputGroupFile02" class="form-label">Vložte obrázok ubytovania:</label>
                <?php if (@$data['offer']?->getPicture() != ""): ?>
                    <div>Pôvodný súbor: <?= substr($data['offer']->getPicture(), strpos($data['offer']->getPicture(), '-') + 1)  ?></div>
                <?php endif; ?>
                <div class="input-group mb-3 has-validation">
                    <!--        <input type="text" class="form-control" name="picture" id="inputGroupFile02" value="--><?php //= @$data['post']?->getPicture() ?><!--">-->
                    <input type="file" class="form-control " name="picture" id="inputGroupFile02">
                </div>
                <div class="form-label-group mb-3">
                    <label for="name" class="form-label">Názov ubytovania:</label>
                    <input name="name" type="text" value="<?= @$data['offer']?->getName() ?>" id="name" class="form-control" placeholder="Zadajte názov ubytovania"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="location" class="form-label">Názov lokácie:</label>
                    <input name="location" value="<?= @$data['offer']?->getLocation() ?>" type="text" id="location" class="form-control" placeholder="Zadajte adresu ubytovania"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="contact" class="form-label">Kontakt:</label>
                    <input name="contact" value="<?= @$data['offer']?->getContact() ?>" type="text" id="contact" class="form-control" placeholder="Zadajte kontakt na ubytovanie"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="price" class="form-label">Cena za jednu noc:</label>
                    <input name="price" value="<?= @$data['offer']?->getPrice() ?>" type="number" id="price" class="form-control" placeholder="Zadajte cenu ubytovania"
                           required autofocus>
                </div>
                <button type="submit" class="btn btn-primary">Uložiť</button>
            </form>


        </div>
    </div>
</div>
