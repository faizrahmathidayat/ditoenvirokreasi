<script>
    $('#btn_tambah_kategori').on('click', function(e) {
        $('#modal_add_kategori').modal('show');
    });

    $('#form_tambah_kategori').on('submit', function(e) {
        e.preventDefault();
        // var data = $(this).serialize();
        var banner = $('#banner').prop('files')[0];
        var judul = $('#judul').val();
        var deskripsi = $('#deskripsi').val();
        var csrf_token = $('#csrf_token').val();

        var formData = new FormData();

        formData.append("banner", banner);
        formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        formData.append("judul", judul);
        formData.append("deskripsi", deskripsi);

        var url = '<?= base_url('dek-admin-login/simpan-kategori-layanan') ?>';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            data: formData,
            success: function(res) {
                $('#csrf_token').val(res.token);
                console.log(res);
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

                if (res.status_image) {
                    $('#banner_error').html(res.messages);
                    $('#banner').addClass('is-invalid');
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'terjadi kesalahan, Gagal menyimpan data!',
                    allowOutsideClick: false
                })
            }
        })
    });

    $('#datatablesSimple').on('click', '.btn_hapus_banner', function(e) {
        var id = $(this).data('id');
        var banner_filename = $(this).data('banner_filename');
        var csrf_token = "<?= $this->security->get_csrf_hash(); ?>";
        var data = {
            'id': id,
            'banner_filename': banner_filename,
        }
        var url = '<?= base_url('dek-admin-login/hapus-banner-kategori') ?>';
        Swal.fire({
            title: 'Apa anda ingin menghapus banner ini ?',
            showCancelButton: true,
            confirmButtonText: 'OK',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: data,
                    success: function(res) {
                        if (res.status_code == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: res.messages,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = window.location.href;
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'oops....',
                                text: res.messages,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = window.location.href;
                                }
                            })
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan, gagal menghapus data!',
                            allowOutsideClick: false
                        })
                    }
                })
            }
        })
    });

    $('#datatablesSimple').on('click', '.btn_hapus_kategori_layanan', function(e) {
        var id = $(this).data('id');
        var banner_filename = $(this).data('banner_filename');
        var csrf_token = "<?= $this->security->get_csrf_hash(); ?>";
        var data = {
            'id': id,
            'banner_filename': banner_filename,
        }
        var url = '<?= base_url('dek-admin-login/hapus-kategori-layanan') ?>';
        Swal.fire({
            title: 'Apa anda ingin menghapus kategori ini ?',
            showCancelButton: true,
            confirmButtonText: 'OK',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: "post",
                    dataType: "json",
                    data: data,
                    success: function(res) {
                        if (res.status_code == 200) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: res.messages,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = window.location.href;
                                }
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'oops....',
                                text: res.messages,
                                allowOutsideClick: false
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.href = window.location.href;
                                }
                            })
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Terjadi kesalahan, gagal menghapus data!',
                            allowOutsideClick: false
                        })
                    }
                })
            }
        })
    });

    $('#datatablesSimple').on('click', '.btn_upload_banner', function() {
        var id = $(this).data('id');
        $('#btn_simpan_banner').attr('onclick', 'btn_simpan_banner(' + id + ')')
        $('#modal_upload_banner').modal('show');
    });

    function btn_simpan_banner(id) {
        if (id) {
            var url = '<?= base_url('dek-admin-login/upload-banner-kategori') ?>';
            var csrf_token = $('#csrf_token_upload').val();
            var banner = $('#banner_upload').prop('files')[0];

            var formData = new FormData();

            formData.append("id", id);
            formData.append("banner", banner);
            formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);

            $.ajax({
                url: url,
                type: "post",
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
                success: function(res) {
                    $('#csrf_token_upload').val(res.token)
                    if (res.status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Banner berhasil di upload',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.href = window.location.href;
                            }
                        })
                    } else {
                        $('#banner_upload_error').html(res.msg);
                        $('#banner_upload').addClass('is-invalid');
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan, Gagal upload banner!',
                        allowOutsideClick: false
                    });
                }
            })
        }
    }

    $('#datatablesSimple').on('click', '.btn_form_ubah_layanan', function(e) {
        var id = $(this).data('id');
        var judul = $(this).data('judul');
        var deskripsi = $(this).data('deskripsi');

        $('#judul_ubah').val(judul);
        $('#deskripsi_ubah').val(deskripsi);
        $('#id_kategori').val(id);

        $('#modal_ubah_kategori').modal('show');
    });

    $('#form_ubah_kategori').on('submit', function(e) {
        e.preventDefault();

        var data = $(this).serialize();
        var url = '<?= base_url('dek-admin-login/ubah-kategori') ?>';

        console.log(data)

        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            data: data,
            success: function(res) {
                $('#csrf_token_ubah').val(res.token);
                console.log(res);
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
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'terjadi kesalahan, Gagal menyimpan data!'
                })
            }
        })
    })
</script>