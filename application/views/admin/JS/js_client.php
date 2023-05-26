<script>
    $('#form_tambah_client').on('submit', function(e) {
        e.preventDefault();
        var url = '<?= base_url('admin/ClientController/simpan_client') ?>';
        var gambar = $('#gambar').prop('files')[0];
        var csrf_token = $('#csrf_token').val();
        var deskripsi = $('#deskripsi').val();

        var formData = new FormData();

        formData.append("deskripsi", deskripsi);
        formData.append("gambar", gambar);
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
                $('#btn_simpan_client').html('Sedang Menyimpan ....');
                $('#btn_simpan_client').prop('disabled', true);
            },
            success: function(res) {
                console.log(res);
                $('#btn_simpan_client').html('Simpan');
                $('#btn_simpan_client').prop('disabled', false);
                $('#csrf_token').val(res.token);
                $('.form-control').removeClass('is-invalid');
                $('.text-danger').html('');

                if (!res.status) {
                    $('#gambar').addClass('is-invalid');
                    $('#gambar_error').html(res.msg);
                } else {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: res.msg,
                        allowOutsideClick: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.href = window.location.href;
                        }
                    })
                }

            },
            error: function() {
                $('#btn_simpan_client').html('Simpan');
                $('#btn_simpan_client').prop('disabled', false);
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

    $('#datatablesSimple').on('click', '.btn_hapus_client', function(e) {
        var id = $(this).data('id');
        var filename = $(this).data('filename');
        var csrf_token = "<?= $this->security->get_csrf_hash(); ?>";
        var data = {
            'id': id,
            'filename': filename,
            "<?= $this->security->get_csrf_token_name(); ?>": csrf_token
        }
        var url = '<?= base_url('admin/ClientController/hapus_client') ?>';
        Swal.fire({
            title: 'Apa anda ingin menghapus data ini ?',
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
                        console.log(res);
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
</script>