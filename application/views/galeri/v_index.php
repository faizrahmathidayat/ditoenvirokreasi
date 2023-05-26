<main>
    <!--? Hero Start -->
    <div class="slider-area2" style="background-image: url(<?= base_url('uploads/banner/' . (!empty(get_banner()) ? get_banner()->galeri:'')) ?>)">
        <div class="slider-height2 hero-overly2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Galeri</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? Categories Area Start -->
    <div class="about-details section-padding30">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-xl-1 col-lg-10">
                    <div class="about-details-cap mb-50">
                        <h4>Galeri <?= !empty(get_perusahaan()) ? get_perusahaan()->nama_perusahaan:'' ?></h4>
                    </div>
                    <?php if (count($galeri) > 0) : ?>
                    <div class="row gallery-item">
                        
                            <?php foreach ($galeri as $galeris) : ?>
                                <div class="col-md-4">
                                    <a href="<?= base_url('uploads/galeri/' . $galeris->gambar) ?>" class="img-pop-up">
                                        <div class="single-gallery-image" style="background: url(<?= base_url('uploads/galeri/' . $galeris->gambar) ?>);"></div>
                                    </a>
                                </div>
                            <?php endforeach; ?>                        
                    </div>
                    <?php else : ?>
                        <div class="alert alert-warning" role="alert">
                            Galeri Belum tersedia!
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <!-- <?php if (count($galeri) > 0) : ?>
                            <?php foreach ($galeri as $galeris) : ?>
                                <div class="col">
                                    <img src="<?= base_url('uploads/galeri/' . $galeris->gambar) ?>" class="img-thumbnail" alt="...">
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-warning" role="alert">
                                Galeri Belum tersedia!
                            </div>
                        <?php endif; ?> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->
</main>