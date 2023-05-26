<!-- The Modal -->
<div class="modal fade" id="modal_edit_layanan">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Layanan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_ubah_layanan">
                    <input type="hidden" id="csrf_token_edit" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <input type="hidden" name="id_layanan" id="id_layanan">
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select class="form-select" name="ubah_kategori" id="ubah_kategori">
                            <?php if (count($kategori) > 0) : ?>
                                <?php foreach ($kategori as $kategories) : ?>
                                    <option value="<?= $kategories->id ?>"><?= $kategories->judul ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <span id="ubah_kategori_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="ubah_judul" id="ubah_judul" placeholder="Masukan Judul">
                        <span id="ubah_judul_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Singkat</label>
                        <input type="text" class="form-control" name="ubah_deskripsi" id="ubah_deskripsi" placeholder="Masukan deskripsi singkat">
                        <span id="ubah_deskripsi_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Body</label>
                        <textarea name="ubah_layanan_body" id="ubah_layanan_body">
                        </textarea>
                        <span id="ubah_layanan_body_error" class="text-danger"></span>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_ubah_layanan">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>