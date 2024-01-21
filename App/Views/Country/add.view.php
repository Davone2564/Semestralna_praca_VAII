<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-7 col-lg-5 d-flex gap-4  flex-column">
            <h1>Pridanie novej krajiny kontinentu <?= @$data['continent']?></h1>

            <?php if (!is_null(@$data['errors'])): ?>
                <?php foreach ($data['errors'] as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form method="post" action="<?= $link->url('country.save') ?>" enctype="multipart/form-data">

                <input type="hidden" name="continent" value="<?= @$data['continent'] ?>">

                <div class="form-label-group mb-3">
                    <label for="name" class="form-label">Názov krajiny:</label>
                    <input name="name" type="text" id="name" class="form-control" placeholder="Zadajte názov krajiny"
                           required autofocus>
                </div>

                <label for="inputGroupFile02" class="form-label">Vložte obrázok vlajky danej krajiny:</label>
                <div class="input-group mb-3 has-validation">
                    <!--        <input type="text" class="form-control" name="picture" id="inputGroupFile02" value="--><?php //= @$data['post']?->getPicture() ?><!--">-->
                    <input type="file" class="form-control " name="flag" id="inputGroupFile02" required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="capital_city" class="form-label">Hlavné mesto:</label>
                    <input name="capital_city" type="text" id="capital_city" class="form-control" placeholder="Zadajte názov hlavného mesta krajiny"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="population" class="form-label">Počet obyvateľov:</label>
                    <input name="population" type="number" id="population" class="form-control" placeholder="Zadajte počet obyvateľov krajiny"
                           required autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="area" class="form-label">Rozloha:</label>
                    <input name="area" type="number" id="area" class="form-control" placeholder="Zadajte rozlohu krajiny" required autofocus>
                </div>
                <div class="my-justify-center">
                    <button type="submit" class="btn btn-primary">Uložiť</button>
                </div>
            </form>


        </div>
    </div>
</div>
