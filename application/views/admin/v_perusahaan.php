<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Perusahaan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Perusahaan</li>
        </ol>
        <div class="row mb-3">
            <div class="col-sm-1 col-lg-6">
                <div class="card">
                    <img src="<?= get_logo() ?>" class="card-img-top" alt="Logo PT. Dito Enviro Kreasi">
                    <div class="card-body">
                        <h5 class="card-title">Logo</h5>
                        <form id="form_logo_perusahaan">
                            <input type="hidden" id="csrf_token_logo" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="mb-3">
                                <input type="file" class="form-control" name="logo" id="logo">
                                <div class="form-text">Maksimal ukuran gambar 2MB</div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn_simpan_logo">Simpan</button>
                            <span id="logo_error" class="text-danger"></span>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-1 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Identitas
                    </div>
                    <div class="card-body">
                        <form id="form_identitas_perusahaan">
                            <input type="hidden" id="csrf_token_identitas" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="<?= !empty(get_perusahaan()) ? get_perusahaan()->nama_perusahaan:'' ?>">
                                <span id="nama_perusahaan_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Telepon</label>
                                <input type="text" class="form-control" name="telepon" id="telepon" value="<?= !empty(get_perusahaan()) ? get_perusahaan()->telepon:'' ?>">
                                <div class="form-text">Min 10 angka dan Max 13 Angka</div>
                                <span id="telepon_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= !empty(get_perusahaan()) ? get_perusahaan()->email:'' ?>">
                                <span id="email_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Kantor</label>
                                <textarea class="form-control" name="alamat_kantor" id="alamat_kantor"><?= !empty(get_perusahaan()) ? get_perusahaan()->alamat_kantor:'' ?></textarea>
                                <span id="alamat_kantor_error" class="text-danger"></span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat Workshop</label>
                                <textarea class="form-control" name="alamat_workshop" id="alamat_workshop"><?= !empty(get_perusahaan()) ? get_perusahaan()->alamat_workshop:'' ?></textarea>
                                <span id="alamat_workshop_error" class="text-danger"></span>
                            </div>
                            <button type="submit" class="btn btn-primary" id="btn_simpan_identitas">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        Profile
                    </div>
                    <div class="card-body">
                        <form id="form_profile_perusahaan">
                            <input type="hidden" id="csrf_token_profile" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label class="form-label">Tentang Perusahaan</label>
                                    <textarea name="profile" id="profile"><?= !empty(get_perusahaan()) ? get_perusahaan()->profile:'' ?></textarea>
                                    <span id="profile_error" class="text-danger"></span>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Visi & Misi</label>
                                    <textarea name="visi_misi" id="visi_misi"><?= !empty(get_perusahaan()) ? get_perusahaan()->visi_misi:'' ?></textarea>
                                    <span id="visi_misi_error" class="text-danger"></span>
                                </div>
                                <button type="submit" class="btn btn-primary" id="btn_simpan_profile">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>