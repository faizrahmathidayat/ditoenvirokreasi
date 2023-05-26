<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="col-sm-3">
            <div class="card">
                <div class="card-header">
                    Main Popup
                </div>
                <img src="<?= $main_popup ?>" class="card-img-top" alt="Logo PT. Dito Enviro Kreasi">
                <div class="card-body">
                    <form id="form_main_popup">
                        <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                        <div class="mb-3">
                            <input type="file" class="form-control" name="gambar" id="gambar">
                            <div class="form-text">Maksimal ukuran gambar 2MB</div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" <?= $is_active_popup ?> id="is_active" name="is_active">
                                <label class="form-check-label">
                                    Tampilkan Popup pada halaman utama
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="btn_simpan_main_popup">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>