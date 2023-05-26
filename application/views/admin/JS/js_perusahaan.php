<script>
    $('#visi_misi').summernote();
    $('#profile').summernote();

    // LOGO
    $('#form_logo_perusahaan').on('submit', function(e) {
        e.preventDefault();
        var url = '<?= base_url('admin/PerusahaanController/simpan_logo_perusahaan') ?>';
        var logo = $('#logo').prop('files')[0];
        var csrf_token = $('#csrf_token_logo').val();

        var formData = new FormData();

        formData.append("logo", logo);
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
                $('#btn_simpan_logo').html('Sedang Mengupload Logo ....');
                $('#btn_simpan_logo').prop('disabled', true);
            },
            success: function(res) {
                console.log(res);
                $('#btn_simpan_logo').html('Simpan');
                $('#btn_simpan_logo').prop('disabled', false);
                $('#csrf_token_logo').val(res.token);
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
                $('#btn_simpan_logo').html('Simpan');
                $('#btn_simpan_logo').prop('disabled', false);
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
    });
    // END

    // IDENTITAS
    $('#form_identitas_perusahaan').on('submit', function(e) {
        e.preventDefault();
        var url = '<?= base_url('admin/PerusahaanController/simpan_identitas_perusahaan') ?>';
        var data = $(this).serialize();
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                $('#btn_simpan_identitas').html('Sedang Menyimpan ....');
                $('#btn_simpan_identitas').prop('disabled', true);
            },
            success: function(res) {
                $('#btn_simpan_identitas').html('Simpan');
                $('#btn_simpan_identitas').prop('disabled', false);
                $('#csrf_token_identitas').val(res.token);
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');
                if (res.validate.success) {
                    $.each(res.validate, (key, val) => {
                        var is_invalid = key.replace('_error', '');
                        var id_invalid_form = el = $('[id="' + is_invalid + '"]');
                        id_invalid_form.addClass(val.length > 0 ? 'is-invalid' : '');
                        el = $('[id="' + key + '"]');
                        el.html(val);
                    });
                    return false;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil disimpan!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = window.location.href;
                    }
                })
            },
            error: function() {
                $('#btn_simpan_identitas').html('Simpan');
                $('#btn_simpan_identitas').prop('disabled', false);
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
    });
    // END

    // PROFILE
    $('#form_profile_perusahaan').on('submit', function(e) {
        e.preventDefault();
        var url = '<?= base_url('admin/PerusahaanController/simpan_profile_perusahaan') ?>';
        var data = $(this).serialize();
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            beforeSend: function() {
                $('#btn_simpan_profile').html('Sedang Menyimpan ....');
                $('#btn_simpan_profile').prop('disabled', true);
            },
            success: function(res) {
                $('#btn_simpan_profile').html('Simpan');
                $('#btn_simpan_profile').prop('disabled', false);
                $('#csrf_token_profile').val(res.token);
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');
                if (res.validate.success) {
                    $.each(res.validate, (key, val) => {
                        var is_invalid = key.replace('_error', '');
                        var id_invalid_form = el = $('[id="' + is_invalid + '"]');
                        id_invalid_form.addClass(val.length > 0 ? 'is-invalid' : '');
                        el = $('[id="' + key + '"]');
                        el.html(val);
                    });
                    return false;
                }

                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil disimpan!',
                    allowOutsideClick: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = window.location.href;
                    }
                })
            },
            error: function() {
                $('#btn_simpan_profile').html('Simpan');
                $('#btn_simpan_profile').prop('disabled', false);
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
    });
    // END
</script>