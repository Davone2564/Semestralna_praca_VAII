<div class="container">
    <h1 class="my-main-page-title">Zaujímavosti</h1>
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="carousel-button"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class="carousel-button" aria-current="true"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <img src="public/images/taj_mahal.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-start">
                        <h1 class="my-carousel-heading"><a class="my-link" href="<?=$link->url("page.tajMahal")?>">Tádž Mahal</a></h1>
                        <p class="opacity-100">Výraz lásky a symbol Indie.</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <img src="public/images/golden%20gate.webp" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-start">
                        <h1 class="my-carousel-heading"><a class="my-link" href="<?=$link->url("page.goldenGate")?>">Golden Gate</a></h1>
                        <p class="opacity-100">Jeden zo siedmych divov sveta</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <img src="public/images/socha_krista_spasitela.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption text-start">
                        <h1 class="my-carousel-heading">Socha Krista Spasiteľa</h1>
                        <p>Najvyššia socha v štýle Art Deco na svete</p>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <hr class="featurette-divider">
    <h1 class="my-main-page-title">Hry</h1>
    <div class="row">
        <div class="col-lg-4">
            <img src="public/images/Flags.png" alt="Flags" width="140">
            <h2>Vlajky</h2>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img src="public/images/Country.jpg" alt="Country" width="140">
            <h2>Krajiny</h2>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img src="public/images/capital_city.jpg" alt="Country" width="140">
            <h2>Hlavné mestá</h2>
            <p><a class="btn btn-secondary" href="#">View details »</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1"><strong>Stiahnite si našu mobilnú appku:</strong></h2>
            <img src="public/images/QR_code_GooglePlay.png" alt="google_play_QR_Code" width="300" class="d-none d-lg-inline-block">
            <a href="https://play.google.com/store/games?device=windows" class="btn btn-primary d-lg-none">Google play</a>
            <a href="https://www.apple.com/app-store/" class="btn btn-primary d-lg-none">App store</a>
        </div>
        <div class="col-md-5">
            <img src="public/images/mobile.jpg" alt="mobile" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto">
        </div>
    </div>

    <!-- /END THE FEATURETTES -->

</div>