<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Layanan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Layanan</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Layanan
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-3" id="btn_tambah_layanan"><i class="fas fa-plus"></i> Tambah</button>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Deskripsi Singkat</th>
                            <th>Slug</th>
                            <th>Banner</th>
                            <th width="100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($layanan as $layananes) : ?>
                            <tr>
                                <td><?= $layananes->kategori ?></td>
                                <td><?= $layananes->judul ?></td>
                                <td><?= $layananes->deskripsi ?></td>
                                <td><?= $layananes->slug ?></td>
                                <td>
                                    <?php if ($layananes->banner == null || $layananes->banner == '') : ?>
                                        <button class="btn btn-sm btn-secondary btn_upload_banner" data-id="<?= $layananes->id ?>"><i class="fas fa-image"></i> Upload</button>
                                    <?php else : ?>
                                        <img width="100px" src="<?= base_url('uploads/layanan/' . $layananes->banner) ?>" alt=""><br><br>
                                        <button class="btn btn-sm btn-danger btn_hapus_banner" data-id="<?= $layananes->id ?>" data-banner_filename="<?= $layananes->banner ?>"><i class="fas fa-trash"></i> Hapus</button>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-success btn_ubah_layanan" data-id="<?= $layananes->id ?>"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger btn_hapus_layanan" data-id="<?= $layananes->id ?>" data-banner_filename="<?= $layananes->banner ?>"><i class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('admin/modal/layanan/v_modal_add') ?>
<?php $this->load->view('admin/modal/layanan/v_modal_edit') ?>
<?php $this->load->view('admin/modal/layanan/v_modal_upload_banner') ?>