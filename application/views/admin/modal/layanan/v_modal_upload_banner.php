<!-- The Modal -->
<div class="modal fade" id="modal_upload_banner">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Banner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_upload_banner">
                    <input type="hidden" id="csrf_token_upload" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <div class="mb-3">
                        <div class="mb-3">
                            <label class="form-label">Banner</label>
                            <input type="file" class="form-control" name="banner" id="banner" placeholder="Masukan Banner">
                            <span id="banner_error" class="text-danger"></span>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn_simpan_banner">Simpan</button>
            </div>
        </div>
    </div>
</div>