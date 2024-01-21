<?php

/** @var \App\Core\LinkGenerator $link */
/** @var Array $data */

?>

<!-- script sa aktivuje keď určíme počet hviezd(mozeme submitnut hodnotenie)-->
<script>
    function checked() {
        document.getElementById("submit").disabled = false;
    }

    var numberOfStars = "<?php echo $data['review']->getStars() ?>";
    if (numberOfStars == "1") {
        document.getElementById("star-1").checked = true;
    } else if (numberOfStars == "2") {
        document.getElementById("star-2").checked = true;
    } else if (numberOfStars == "3") {
        document.getElementById("star-3").checked = true;
    } else if (numberOfStars == "4") {
        document.getElementById("star-4").checked = true;
    } else {
        document.getElementById("star-5").checked = true;
    }
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9 col-md-7 col-lg-5 d-flex gap-4  flex-column">
            <h1>Upravenie recenzie pre ponuku <?= $data['offerName'] ?></h1>

            <?php if (!is_null(@$data['errors'])): ?>
                <?php foreach ($data['errors'] as $error): ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <form method="post" action="<?= $link->url('review.save') ?>" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= @$data['review']?->getId() ?>">
                <!-- tu bude ulozene id ponuky, ku ktorej chceme napisat recenziu -->
                <input type="hidden" name="offerID" value="<?= @$data['review']->getOfferID() ?>">

                <div class="form-label-group mb-3">
                    <label class="form-label"><strong>Určte počet hviezd:</strong></label>
                    <div class="container d-flex justify-content-center mt-200">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" name="star" value="5">
                                    <label class="star star-5" for="star-5" onclick="checked()"></label>

                                    <input class="star star-4" id="star-4" type="radio" name="star" value="4">
                                    <label class="star star-4" for="star-4" onclick="checked()"></label>

                                    <input class="star star-3" id="star-3" type="radio" name="star" value="3">
                                    <label class="star star-3" for="star-3" onclick="checked()"></label>

                                    <input class="star star-2" id="star-2" type="radio" name="star" value="2">
                                    <label class="star star-2" for="star-2" onclick="checked()"></label>

                                    <input class="star star-1" id="star-1" type="radio" name="star" value="1">
                                    <label class="star star-1" for="star-1" onclick="checked()"></label>

                                    <!-- v skripte oznacime tolko hviezd, kolko sme dali predtym hodnotenie -->
                                    <script>
                                        var numberOfStars = "<?php echo $data['review']->getStars() ?>";
                                        if (numberOfStars == "1") {
                                            document.getElementById("star-1").checked = true;
                                        } else if (numberOfStars == "2") {
                                            document.getElementById("star-2").checked = true;
                                        } else if (numberOfStars == "3") {
                                            document.getElementById("star-3").checked = true;
                                        } else if (numberOfStars == "4") {
                                            document.getElementById("star-4").checked = true;
                                        } else {
                                            document.getElementById("star-5").checked = true;
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-label-group mb-3">
                    <label for="pluses" class="form-label"><strong>Čo sa vám na ubytovaní páčilo?:</strong></label>
                    <input name="pluses" type="text" value="<?= @$data['review']?->getPluses() ?>" id="pluses" class="form-control" placeholder="Zadajte plusy"
                           autofocus>
                </div>

                <div class="form-label-group mb-3">
                    <label for="minuses" class="form-label"><strong>Čo sa vám na ubytovaní nepáčilo?:</strong></label>
                    <input name="minuses" type="text" value="<?= @$data['review']?->getMinuses() ?>" id="minuses" class="form-control" placeholder="Zadajte mínusy"
                           autofocus>
                </div>
                <div class="my-justify-center">
                    <button name="submit" id="submit" type="submit" class="btn btn-primary">Uložiť</button>
                </div>
            </form>


        </div>
    </div>
</div>