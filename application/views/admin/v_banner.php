<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Banner</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Banner</li>
        </ol>
        <div class="row mb-3">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Halaman Utama
                    </div>
                    <img src="<?= $banner_halaman_utama ?>" class="card-img-top" alt="Logo PT. Dito Enviro Kreasi">
                    <div class="card-body">
                        <form id="form_banner_halaman_utama">
                            <input type="hidden" id="csrf_token_halaman_utama" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="halaman_utama" id="halaman_utama">
                                <div class="form-text">Maksimal ukuran gambar 2MB</div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn_simpan_halaman_utama">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Galeri
                    </div>
                    <img src="<?= $banner_galeri ?>" class="card-img-top" alt="Logo PT. Dito Enviro Kreasi">
                    <div class="card-body">
                        <form id="form_banner_galeri">
                            <input type="hidden" id="csrf_token_galeri" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="galeri" id="galeri">
                                <div class="form-text">Maksimal ukuran gambar 2MB</div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn_simpan_galeri">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Tentang Kami
                    </div>
                    <img src="<?= $banner_tentang_kami ?>" class="card-img-top" alt="Logo PT. Dito Enviro Kreasi">
                    <div class="card-body">
                        <form id="form_tentang_kami">
                            <input type="hidden" id="csrf_token_tentang_kami" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="tentang_kami" id="tentang_kami">
                                <div class="form-text">Maksimal ukuran gambar 2MB</div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn_simpan_tentang_kami">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Kontak
                    </div>
                    <img src="<?= $banner_kontak ?>" class="card-img-top" alt="Logo PT. Dito Enviro Kreasi">
                    <div class="card-body">
                        <form id="form_kontak">
                            <input type="hidden" id="csrf_token_kontak" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="kontak" id="kontak">
                                <div class="form-text">Maksimal ukuran gambar 2MB</div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn_simpan_kontak">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>