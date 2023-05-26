<script>
    $('#form_main_popup').on('submit', function(e) {
        e.preventDefault();
        var url = '<?= base_url('admin/DashboardController/simpan_popup') ?>';

        var gambar = $('#gambar').prop('files')[0];
        var is_active = $('#is_active').is(':checked') ? 1 : 0;
        var csrf_token = $('#csrf_token').val();

        var formData = new FormData();

        formData.append("gambar", gambar);
        formData.append("is_active", is_active);
        formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            beforeSend: function() {
                $('#btn_simpan_main_popup').html('Sedang Menyimpan ....');
                $('#btn_simpan_main_popup').prop('disabled', true);
            },
            success: function(res) {
                console.log(res);
                $('#btn_simpan_main_popup').html('Simpan');
                $('#btn_simpan_main_popup').prop('disabled', false);
                $('#csrf_token').val(res.token);
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');

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
                $('#btn_simpan_main_popup').html('Simpan');
                $('#btn_simpan_main_popup').prop('disabled', false);
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR!',
                    text: 'Terjadi kesalahan, Data gagal disimpan!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = window.location.href;
                    }
                })
            }
        });
    })
</script>