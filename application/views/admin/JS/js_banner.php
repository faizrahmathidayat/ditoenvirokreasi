<script>
    $('#form_banner_halaman_utama').on('submit', function(e) {
        e.preventDefault();
        var basefilename = 'HALAMAN_UTAMA';
        var paramsName = 'halaman_utama';
        var bannerexisting = '<?= !empty(get_banner()) ? get_banner()->halaman_utama:'' ?>';

        var halaman_utama = $('#halaman_utama').prop('files')[0];
        var csrf_token = $('#csrf_token_halaman_utama').val();

        var formData = new FormData();

        formData.append('bannerexisting', bannerexisting);
        formData.append('basefilename', basefilename);
        formData.append('paramsName', paramsName);
        formData.append('gambar', halaman_utama);
        formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        simpan_banner(formData);
    });

    $('#form_banner_galeri').on('submit', function(e) {
        e.preventDefault();
        var basefilename = 'GALERI';
        var paramsName = 'galeri';
        var bannerexisting = '<?= !empty(get_banner()) ? get_banner()->galeri:'' ?>';

        var galeri = $('#galeri').prop('files')[0];
        var csrf_token = $('#csrf_token_galeri').val();

        var formData = new FormData();

        formData.append('bannerexisting', bannerexisting);
        formData.append('basefilename', basefilename);
        formData.append('paramsName', paramsName);
        formData.append('gambar', galeri);
        formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        simpan_banner(formData);
    });

    $('#form_tentang_kami').on('submit', function(e) {
        e.preventDefault();
        var basefilename = 'TENTANG_KAMI';
        var paramsName = 'tentang_kami';
        var bannerexisting = '<?= !empty(get_banner()) ? get_banner()->tentang_kami:'' ?>';

        var tentang_kami = $('#tentang_kami').prop('files')[0];
        var csrf_token = $('#csrf_token_tentang_kami').val();

        var formData = new FormData();

        formData.append('bannerexisting', bannerexisting);
        formData.append('basefilename', basefilename);
        formData.append('paramsName', paramsName);
        formData.append('gambar', tentang_kami);
        formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        simpan_banner(formData);
    });

    $('#form_kontak').on('submit', function(e) {
        e.preventDefault();
        var basefilename = 'KONTAK';
        var paramsName = 'kontak';
        var bannerexisting = '<?= !empty(get_banner()) ? get_banner()->kontak:'' ?>';

        var kontak = $('#kontak').prop('files')[0];
        var csrf_token = $('#csrf_token_kontak').val();

        var formData = new FormData();

        formData.append('bannerexisting', bannerexisting);
        formData.append('basefilename', basefilename);
        formData.append('paramsName', paramsName);
        formData.append('gambar', kontak);
        formData.append("<?= $this->security->get_csrf_token_name(); ?>", csrf_token);
        simpan_banner(formData);
    });

    function simpan_banner(data) {
        var url = '<?= base_url('admin/BannerController/simpan_banner') ?>';
        $.ajax({
            url: url,
            type: 'post',
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            data: data,
            success: function(res) {
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
    }
</script>