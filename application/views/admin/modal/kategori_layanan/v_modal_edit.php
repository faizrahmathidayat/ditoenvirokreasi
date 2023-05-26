<!-- The Modal -->
<div class="modal fade" id="modal_ubah_kategori">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Kategori Layanan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form id="form_ubah_kategori">
                    <input type="hidden" name="id_kategori" id="id_kategori">
                    <input type="hidden" id="csrf_token_ubah" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul_ubah" id="judul_ubah" placeholder="Masukan Judul">
                        <span id="judul_ubah_error" class="text-danger"></span>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi Singkat</label>
                        <input type="text" class="form-control" name="deskripsi_ubah" id="deskripsi_ubah" placeholder="Masukan deskripsi singkat">
                        <span id="deskripsi_ubah_error" class="text-danger"></span>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="btn_ubah_kategori">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>