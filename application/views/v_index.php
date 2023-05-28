<main>
    <!-- slider Area Start-->
    <div class="slider-area" style="background-image: url(<?= base_url('uploads/banner/' . (!empty(get_banner()) ? get_banner()->halaman_utama: '')) ?>)">
        <div class="slider-active slider-height2 d-flex align-items-center">
            <!-- Single Slider -->
            <?php if (count($kategori) > 0) : ?>
                <?php foreach ($kategori as $kategories) : ?>
                    <div class="single-slider slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-7 col-md-8">
                                    <div class="hero__caption">
                                        <span data-animation="fadeInLeft" data-delay=".1s">Komitmen untuk sukses</span>
                                        <h3 data-animation="fadeInLeft" data-delay=".5s"><?= $kategories->deskripsi ?></h3>
                                        <!-- Hero-btn -->
                                        <div class="hero__btn" data-animation="fadeInLeft" data-delay="1.1s">
                                            <a href="<?= base_url('layanan/' . $kategories->id) ?>" class="btn hero-btn">Selengkapnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- slider Area End-->
    <!--? Categories Area Start -->
    <div class="categories-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mb-70">
                        <span>Pelayanan</span>
                        <h2>Pelayanan Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php if (count($kategori) > 0) : ?>
                    <?php foreach ($kategori as $kategories) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-cat text-center mb-50">
                                <div class="cat-icon">
                                    <span class="flaticon-development"></span>
                                </div>
                                <div class="cat-cap">
                                    <h5><a href="<?= base_url('layanan/' . $kategories->id) ?>"><?= $kategories->judul ?> </a></h5>
                                    <p><?= $kategories->deskripsi ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Services Area End -->

    <!--? Testimonial Start -->
    <?php if (count($testimoni) > 0) : ?>
        <div class="testimonial-area testimonial-padding" data-background="<?= base_url() ?>assets/img/gallery/section_bg04.jpg">
            <div class="container ">
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-10 col-lg-10 col-md-9">
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                            <?php foreach ($testimoni as $testimonis) : ?>
                                <div class="single-testimonial text-center">
                                    <!-- Testimonial Content -->
                                    <div class="testimonial-caption ">
                                        <div class="testimonial-top-cap">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="67px" height="49px">
                                                <path fill-rule="evenodd" fill="rgb(240, 78, 60)" d="M57.053,48.209 L42.790,48.209 L52.299,29.242 L38.036,29.242 L38.036,0.790 L66.562,0.790 L66.562,29.242 L57.053,48.209 ZM4.755,48.209 L14.263,29.242 L0.000,29.242 L0.000,0.790 L28.527,0.790 L28.527,29.242 L19.018,48.209 L4.755,48.209 Z" />
                                            </svg>
                                            <p><?= $testimonis->deskripsi ?></p>
                                        </div>
                                        <!-- founder -->
                                        <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                            <div class="founder-img">
                                                <img width="100px" src="<?= base_url('uploads/testimoni/' . $testimonis->avatar) ?>" alt="avatar">
                                            </div>
                                            <div class="founder-text">
                                                <span><?= $testimonis->nama ?></span>
                                                <p><?= $testimonis->jabatan ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Testimonial End -->


    <!-- Want To work -->
    <section class="wantToWork-area w-padding2 section-bg" data-background="<?= base_url() ?>assets/img/gallery/section_bg03.jpg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-7 col-lg-9 col-md-8">
                    <div class="wantToWork-caption wantToWork-caption2">
                        <h2>Apakah Anda Mencari Konsultan?</h2>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4">
                    <a href="<?= base_url('kontak-kami') ?>" class="btn btn-black f-right">Kontak Kami</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Want To work End -->
    <!-- Brand Area Start -->
    <?php if (count($client) > 0) : ?>
        <div class="brand-area pb-140 section-padding30">
            <div class="container">
                <div class="brand-active brand-border pb-40">
                    <?php foreach ($client as $clients) : ?>
                        <div class="single-brand">
                            <img width="200px" src="<?= base_url('uploads/client/' . $clients->gambar) ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- Brand Area End -->
</main>

<div class="modal show" id="modal_home" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <img src="<?= $main_popup ?>" alt="">
        </div>
    </div>
</div>