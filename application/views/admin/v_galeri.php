<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Galeri</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Galeri</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Galeri
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-3" id="btn_tambah_galeri" data-bs-toggle="modal" data-bs-target="#modal_tambah_galeri"><i class="fas fa-plus"></i> Tambah</button>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($galeri as $galeris) : ?>
                            <tr>
                                <td class="text-justify"><?= $galeris->deskripsi ?></td>
                                <td><img src="<?= base_url('uploads/galeri/' . $galeris->gambar) ?>" alt=""></td>
                                <td class="text-center"><button class="btn btn-sm btn-danger btn_hapus_galeri" data-id="<?= $galeris->id ?>" data-filename="<?= $galeris->gambar ?>"><i class="fas fa-trash"></i></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('admin/modal/galeri/v_modal_add') ?>