<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Kategori Layanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Kategori Layanan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Kategori Layanan
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-3" id="btn_tambah_kategori"><i class="fas fa-plus"></i> Tambah</button>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Deskripsi Singkat</th>
                            <th>Banner</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kategori as $kategories) : ?>
                            <tr>
                                <td><?= $kategories->judul ?></td>
                                <td><?= $kategories->deskripsi ?></td>
                                <td class="text-center">
                                    <?php if ($kategories->banner == null || $kategories->banner == '') : ?>
                                        <button class="btn btn-sm btn-secondary btn_upload_banner" data-id="<?= $kategories->id ?>"><i class="fas fa-image"></i> Upload</button>
                                    <?php else : ?>
                                        <img width="100px" src="<?= base_url('uploads/kategori_layanan/' . $kategories->banner) ?>" alt=""><br><br>
                                        <button class="btn btn-sm btn-danger btn_hapus_banner" data-id="<?= $kategories->id ?>" data-banner_filename="<?= $kategories->banner ?>"><i class="fas fa-trash"></i> Hapus</button>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success btn_form_ubah_layanan" data-id="<?= $kategories->id ?>" data-judul="<?= $kategories->judul ?>" data-deskripsi="<?= $kategories->deskripsi ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger btn_hapus_kategori_layanan" data-id="<?= $kategories->id ?>" data-banner_filename="<?= $kategories->banner ?>"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('admin/modal/kategori_layanan/v_modal_add') ?>
<?php $this->load->view('admin/modal/kategori_layanan/v_modal_edit') ?>
<?php $this->load->view('admin/modal/kategori_layanan/v_modal_upload_banner') ?>