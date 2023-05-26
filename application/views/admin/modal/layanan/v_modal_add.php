<!-- The Modal -->
<div class="modal fade" id="modal_add_layanan">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Tambah Layanan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_tambah_layanan">
                    <input type="hidden" id="csrf_token" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="kategori" id="kategori">
                            <?php if (count($kategori) > 0) : ?>
                                <?php foreach ($kategori as $kategories) : ?>
                                    <option value="<?= $kategories->id ?>"><?= $kategories->judul ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <span id="kategori_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Masukan Judul">
                        <span id="judul_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Singkat</label>
                        <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukan deskripsi singkat">
                        <span id="deskripsi_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <textarea name="layanan_body" id="layanan_body"></textarea>
                        <span id="layanan_body_error" class="text-danger"></span>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_simpan_layanan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>