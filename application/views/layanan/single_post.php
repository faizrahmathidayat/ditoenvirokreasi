<main>
    <?php if ($count_layanan > 0) : ?>
        <!--? Hero Start -->
        <div class="slider-area2" style="background-image: url(<?= base_url('uploads/layanan/' . $layanan->banner) ?>);">
            <div class="slider-height2 hero-overly2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap hero-cap2 text-center">
                                <h2><?= $layanan->judul ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->
        <!--? Categories Area Start -->
        <div class="categories-area section-padding30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-70">
                            <h2><?= $layanan->judul ?></h2>
                            <h6><?= $layanan->deskripsi ?></h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    <?= $layanan->layanan_body; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container section-padding30">
            <div class="alert alert-warning" role="alert">
                Data tidak ditemukan!
            </div>
        </div>
    <?php endif; ?>
    <!-- Services Area End -->
</main>