<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-7 col-lg-5 d-flex gap-4  flex-column">
            <h1>Pridanie novej ubytovacej ponuky</h1>

            <?php if (!is_null(@$data['errors'])): ?>
                <?php foreach ($data['errors'] as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form method="post" action="<?= $link->url('offer.save') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= @$data['offer']?->getId() ?>">

                <label for="inputGroupFile02" class="form-label"><strong>Vložte obrázok ubytovania:</strong></label>
                <div class="input-group mb-3 has-validation">
                    <!--        <input type="text" class="form-control" name="picture" id="inputGroupFile02" value="--><?php //= @$data['post']?->getPicture() ?><!--">-->
                    <input type="file" class="form-control " name="picture" id="inputGroupFile02" required autofocus>
                </div>
                <div class="form-label-group mb-3">
                    <label for="name" class="form-label"><strong>Názov ubytovania:</strong></label>
                    <input name="name" type="text" id="name" class="form-control" placeholder="Zadajte názov ubytovania"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="location" class="form-label"><strong>Adresa:</strong></label>
                    <input name="location" type="text" id="location" class="form-control" placeholder="Zadajte adresu ubytovania"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="contact" class="form-label"><strong>Kontakt:</strong></label>
                    <input name="contact" type="text" id="contact" class="form-control" placeholder="Zadajte kontakt na ubytovanie"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="price" class="form-label"><strong>Cena za jednu noc:</strong></label>
                    <input name="price" type="number" id="price" class="form-control" placeholder="Zadajte cenu ubytovania" required autofocus>
                </div>
                <div class="my-justify-center">
                    <button type="submit" class="btn btn-primary">Uložiť</button>
                </div>
            </form>


        </div>
    </div>
</div>
