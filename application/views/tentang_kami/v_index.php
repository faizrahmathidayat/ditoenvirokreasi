<main>
    <!--? Hero Start -->
    <div class="slider-area2" style="background-image: url(<?= base_url('uploads/banner/' . (!empty(get_banner()) ? get_banner()->tentang_kami:'')) ?>)">
        <div class="slider-height2 hero-overly2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Tentang Kami</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? Categories Area Start -->
    <div class="about-details section-padding30">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-lg-10">
                    <div class="about-details-cap mb-50">
                        <h4>Profile Company</h4>
                        <?= !empty(get_perusahaan()) ? get_perusahaan()->profile:'' ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-1 col-lg-10">
                    <div class="about-details-cap mb-50">
                        <h4>Visi & Misi</h4>
                        <?= !empty(get_perusahaan()) ? get_perusahaan()->visi_misi:'' ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="offset-xl-1 col-lg-10">
                    <div class="about-details-cap mb-10">
                        <h4>Mengapa harus kami ?</h4>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h6 style="color: red;">PUSAT PENGURUSAN IZIN PEMBANGUNAN DI INDONESIA</h6>
                            <p>
                                Kami memberikan semua jenis izin yang anda butuhkan, untuk kenyamanan anda dalam berbisnis
                            </p>
                        </div>
                        <div class="col">
                            <h6 style="color: red;">BIAYA TERJANGKAU KUALITAS TERBAIK</h6>
                            <p>
                                Tertunya dengan kalitas terbaik karena didukung oleh tenaga ahli Profesional & harga terbaik dari yang lain.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->
</main>