<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Testimoni</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="<?= base_url('dek-admin-login/dashboard') ?>">Dashboard</a></li>
            <li class="breadcrumb-item active">Testimoni</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Testimoni
            </div>
            <div class="card-body">
                <button class="btn btn-primary btn-sm mb-3" id="btn_tambah_testimoni" data-bs-toggle="modal" data-bs-target="#modal_tambah_testimoni"><i class="fas fa-plus"></i> Tambah</button>
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Deskripsi</th>
                            <th>Jabatan</th>
                            <th>Avatar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($testimoni as $testimonis) : ?>
                            <tr>
                                <td class="text-justify"><?= $testimonis->nama ?></td>
                                <td class="text-justify"><?= $testimonis->deskripsi ?></td>
                                <td class="text-justify"><?= $testimonis->jabatan ?></td>
                                <td><img width="100px" src="<?= base_url('uploads/testimoni/' . $testimonis->avatar) ?>" alt=""></td>
                                <td class="text-center"><button class="btn btn-sm btn-danger btn_hapus_testimoni" data-id="<?= $testimonis->id ?>" data-filename="<?= $testimonis->avatar ?>"><i class="fas fa-trash"></i></button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php $this->load->view('admin/modal/testimoni/v_modal_add') ?>