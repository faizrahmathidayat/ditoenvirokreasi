<main>
    <!--? Hero Start -->
    <div class="slider-area2" style="background-image: url(<?= base_url('uploads/kategori_layanan/' . $banner) ?>)">
        <div class="slider-height2 hero-overly2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2><?= $judul_kategori ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? Categories Area Start -->
    <!--? Categories Area Start -->
    <div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-70">
                        <span><?= $judul_kategori ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (count($layanan) > 0) : ?>

                    <?php foreach ($layanan as $pelayanan) : ?>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-cat text-center mb-50">
                                <div class="cat-icon">
                                    <span class="flaticon-development"></span>
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="<?= base_url('layanan/' . $pelayanan->slug) ?>"><?= $pelayanan->judul ?> </a></h5>
                                    <p><?= $pelayanan->deskripsi ?></p>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="container">
                        <div class="alert alert-warning" role="alert">
                            Data tidak ditemukan!
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Services Area End -->
</main>