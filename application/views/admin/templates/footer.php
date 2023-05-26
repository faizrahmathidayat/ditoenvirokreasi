<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">PT. Dito Enviro Kreasi 2021</div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- Modal Maintenance -->
<div class="modal" id="modal_maintenance" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label>Maintenance Mode</label>
                </div>
                <label class="switch">
                    <input type="hidden" id="csrf_token_maintenance" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
                    <input type="checkbox" id="togBtn">
                    <div class="slider"></div>
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="btn_simpan_maintenance">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url() ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/admin_theme/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/admin_theme/js/datatables-simple-demo.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- SUMMERNOTE JS -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<?php $js != null ? $this->load->view('admin/JS/' . $js) : '';  ?>
<script>
    $(window).on('load', function() { // makes sure the whole site is loaded 
        $('#status').fadeOut(); // will first fade out the loading animation 
        $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 
        $('body').delay(350).css({
            'overflow': 'visible'
        });
    });

    var status_maintenance = '<?= status_maintenance() == 1 ?>' ? true : false;
    $('#togBtn').attr('checked', status_maintenance);

    $('#maintenance_mode').on('click', function(e) {
        $('#modal_maintenance').modal('show');
    });

    $('#btn_simpan_maintenance').on('click', function() {
        var is_active = $('#togBtn').is(':checked') ? 1 : 0;
        var csrf_token = $('#csrf_token_maintenance').val();
        var url = '<?= base_url('admin/DashboardController/simpan_maintenance') ?>';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: {
                'status': is_active,
                "<?= $this->security->get_csrf_token_name(); ?>": csrf_token
            },
            beforeSend: function() {
                $('#btn_simpan_maintenance').html('Menyimpan...');
            },
            success: function(res) {
                console.log(res);
                $('#btn_simpan_maintenance').html('Simpan');
                $('#csrf_token_maintenance').val(res.token);
                Swal.fire({
                    icon: res.status,
                    title: res.status,
                    text: res.msg,
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = window.location.href;
                    }
                })
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Terjadi kesalahan, tidak dapat menyimpan data!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = window.location.href;
                    }
                })
            }
        })
    });
</script>
</body>

</html>